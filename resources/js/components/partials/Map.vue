<template>
  <div id="map" ref="mapRef"></div>
</template>

<script>
import { onMounted, ref, toRefs, toRef } from "vue";
export default {
  name: "Map",
  props:{
    announcmentsCollection: Array
  },
  data(){
    return{
      announcements: [],
    }
  },
  methods:{
    getMap(ann){
      var map = tt.map({
      key: 'ieE6bIkIjKCULYNaPIeiocY8WifbHuDb',
      container: 'map',
      center: [ann[0].longitude, ann[0].latitude],
      zoom: 10,
      });
      map.addControl(new tt.FullscreenControl());
      map.addControl(new tt.NavigationControl());

      ann.forEach(element => {
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
        .setLngLat({lon: element.longitude, lat: element.latitude})
        .setHTML(`<p>${element.address}</p>`)
        .addTo(map);



        var marker = new tt.Marker()
        .setLngLat([element.longitude, element.latitude])
        .addTo(map);
      });
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
</style>