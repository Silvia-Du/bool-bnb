<template>
    <div id="map" ref="mapRef" class="b-round b-shadow"></div>
  </template>

  <script>
  export default {
    name: "Map",
    props:{
      announcmentsCollection: Object
    },
    data(){
      return{
        announcements: null,
      }
    },
    methods:{
      getMap(ann){
        var map = tt.map({
        key: 'ieE6bIkIjKCULYNaPIeiocY8WifbHuDb',
        container: 'map',
        zoom: 8,
        center: [this.announcements.longitude, this.announcements.latitude]
        });
        map.addControl(new tt.FullscreenControl());
        map.addControl(new tt.NavigationControl());


          var markerHeight = 50, markerRadius = 10, linearOffset = 25;
          var popupOffsets = {
          'top': [0, 0],
            'top-left': [0,0],
            'top-right': [0,0],
            'bottom': [0, -markerHeight],
            'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
            'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
            'left': [markerRadius, (markerHeight - markerRadius) * -1],
            'right': [-markerRadius, (markerHeight - markerRadius) * -1]
            };
          var popup = new tt.Popup({offset: popupOffsets, className: 'my-class'})
          .setLngLat({lon: this.announcements.longitude, lat: this.announcements.latitude})
          .setHTML(`<p>${this.announcements.address}</p>`)
          .addTo(map);



          var marker = new tt.Marker()
          .setLngLat([this.announcements.longitude, this.announcements.latitude])
          .addTo(map);

      }
    },

    watch: {
      announcmentsCollection(newData, oldData){
          this.announcements = this.announcmentsCollection;
          if(newData){
            this.getMap(this.announcements);
          }

        },
      }
    }

  </script>

  <style>
  #map {
    min-height: 100%;
    min-width: 100%;
  }

  .b-round{
      border-radius: 15px;
  }

  .b-shadow {
      box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
  }
  </style>
