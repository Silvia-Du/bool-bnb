<template>
  <div class="container-fluid px-lg-5 research-adv">
    
    <div class="row px-lg-5 flex-md-wrap-reverse">
      <!-- card col -->
      <div class="col-12 col-xl-6">
        <!-- filter row xl-->
        <div
          class="
            d-flex d-md-none d-xl-flex
            container-fluid
            filter
            py-3
            justify-content-between
            align-items-center
          "
        >
          <p class="num-result mb-0">Tot risultati</p>
          <div class="advanced-filter">
            <div
              @click="showDropD = !showDropD"
              class="
                box
                debug
                d-flex
                align-items-center
                justify-content-between
                px-2
                py-2
              "
            >
              <p class="mb-0">Filtri</p>
              <div
                class="i-box d-flex justify-content-center align-items-center"
              >
                <i class="fa-solid fa-sliders"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- card-row -->
        <div
        v-for="(announcement, index) in announcmentsFilteredLocation" :key="`announcement:${index}`"
        class="container-fluid">
          <div class="row pt-2">
            <!-- card -->
            <!-- QUESTA è TUTTA LA CARD DA CICLARE -->
            <div
              class="
                col-12
                d-flex
                py-md-33
                justify-content-center
                mb-3
                p-3
                card-col
              "
            >
              <!-- img -->
              <div class="img mr-3">
                <img
                  src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/space-of-mind-studio-puisto-architects-archmospheres-14-1605277273.jpg?resize=480:*"
                  alt="#"
                />
              </div>
              <!-- text -->
              <div class="d-none d-sm-block box-text w-100 pl-2">
                <p>{{ announcement.address }}</p>
                <h2>{{ announcement.title }}</h2>
                <div class="riga"></div>
                <p>
                  2 guests - Entire Home - 1 Bads - 1 Bath <br />
                  Wifi - Kitchen - Free Parking
                </p>
                <div class="riga"></div>
                <i class="fa-solid fa-star"></i>
              </div>
              <!-- hart -->
              <div class="box-heart position-absolute d-none d-sm-block">
                <i class="fa-solid fa-heart"></i>
                <!-- <i class="fa-regular fa-heart"></i> -->
              </div>
              <p class="price d-none d-sm-block position-absolute mb-0">
                360€/notte
              </p>
            </div>
            <!-- /card -->
          </div>
        </div>
      </div>
      <!-- map-col -->
      <div class="d-none d-md-block col-12 col-xl-6 debug">
        <!-- filter sm-lg -->
        <div
          class="
            d-flex d-xl-none
            container-fluid
            filter
            debug
            py-3
            justify-content-between
            align-items-center
          "
        >
          <p class="num-result mb-0">Tot risultati</p>
          <div class="advanced-filter">
            <div
              @click="showDropD = !showDropD"
              class="
                box
                debug
                d-flex
                align-items-center
                justify-content-between
                px-2
                py-2
              "
            >
              <p class="mb-0">Filtri</p>
              <div
                class="i-box d-flex justify-content-center align-items-center"
              >
                <i class="fa-solid fa-sliders"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="map map-div debug d-flex justify-content-center align-items-center" id="map" ref="mapRef">
            <Map :announcmentsCollection="announcmentsFilteredLocation" />
        </div>

      </div>
    </div>
    <ModaleFilter
      v-if="showDropD"
      @isHide="hideModal"
      :catCollection="categories"
      @filterData="getFilteredAnnounce"
    />
  </div>
</template>

<script>

import ModaleFilter from "../pages/ModaleFilter.vue";
import Map from "../partials/Map.vue";
export default {
  name: "AdvancedComp",
  components: {
    ModaleFilter,
    Map
  },
  props: {
    location: String,
    input: String
  },
 
  data() {
    return {
      // devono avere l'icona (stringe) e l'active (true/false)
      categories: [
        "baite",
        "campagna",
        "wow",
        "minicase",
        "camper",
        "design",
        "b&b",
        "luxe",
        "ville",
        "spazi creativi",
        "co-working",
        "co-leaving",
      ],
      announcApiUrl: "api/announcements",
      announcments: null,
      announcementFilteredCategory: null,
      announcementFilteredModal: null,
      showDropD: false,
      isActive: -1,
      selectedCat: "",
      announcmentsFilteredLocation: null,
    };
  },
  methods: {
    getCategory(index, category) {
      this.isActive = index;
      this.selectedCat = category;
      axios
        .get(this.announcApiUrl + "/category/" + this.selectedCat)
        .then((response) => {
          this.announcments = response.data;
        });
    },
    hideModal(isShow) {
      this.showDropD = isShow;
    },

    getFilteredAnnounce(data) {
      this.showDropD = false;
      axios
        .get(this.announcApiUrl + "/advanced/", {
          beds: data.beds,
        })
        .then((response) => {
          this.announcments = response.data;
        });
    },

    getAnnouncementFromLocation(newData){
        axios.get(this.announcApiUrl + "/location/" + newData)
        .then(response => {
            this.announcmentsFilteredLocation = response.data;
            
        })
    },

  },
  watch:{
    input(newData, oldData){
      if(newData){
        this.getAnnouncementFromLocation(newData);
      }
    }
  },

  mounted(){
    this.getAnnouncementFromLocation(this.input);
  }
};
</script>

<style lang='scss' scoped>
.research-adv {
  background-color: #ede6e3;
  .col-6 {
    flex-shrink: 0;
  }
  .card-col {
    position: relative;
    border-radius: 5px;
    background-color: #f8f3f1;
    box-shadow: 0px 0px 10px 1px rgb(172, 172, 172);
    .box-text {
      width: 100%;
      padding-top: 20px;
      .riga {
        border-top: 1px solid gray;
        width: 50px;
        margin: 20px 0;
      }
      p {
        color: gray;
      }
      .fa-star {
        color: rgb(255, 187, 0);
      }
    }
    .box-heart {
      top: 12px;
      right: 12px;
      font-size: 1.3em;
      color: rgb(250, 106, 106);
    }
    .price {
      bottom: 12px;
      right: 12px;
    }
    .img {
      flex-shrink: 0;
      height: 260px;
      width: 280px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0px 5px 15px rgb(66, 66, 66);
      cursor: pointer;
      img {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
      }
    }
  }

  .filter {
    .num-result {
      font-weight: bold;
    }
    .box {
      width: 100px;
      flex-shrink: 0;
      border-radius: 10px;
      .i-box {
        border-radius: 50%;
        width: 28px;
        height: 28px;
        background-color: rgb(182, 86, 51);
        color: white;
        font-size: 0.8rem;
      }
    }
  }
  .map{
    height: 500px;
    width: 847px; 
  }

}
</style>
