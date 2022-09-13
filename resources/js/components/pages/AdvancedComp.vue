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
            <p class="num-result mb-0">{{ announcmentsFilteredLocation.length+' ' }}Risultati</p>
            <div class="advanced-filter">
              <div
                @click="showDropD = !showDropD"
                class="
                  box
                  d-flex
                  align-items-center
                  justify-content-between
                  px-2
                  py-2
                "
              >
                <p class="mb-0 text-white">Filtri</p>
                <div
                  class="i-box d-flex justify-content-center align-items-center"
                >
                  <i class="fa-solid fa-sliders coral-text"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- card-row -->
          <div class="container-fluid box-card">
            <div class="row pt-2">
              <!-- card -->
              <!-- Risultati Presenti -->
              <div v-if="announcmentsFilteredLocation.length > 0"></div>
              <!-- Nessun Risultato -->
              <div v-else>
                <div class="px-4 text-center">
                    <h1 class="display-5 fw-bold">Ops sembra che non ci siano risultati</h1>
                        <p class="lead mb-4">Prova a controllare che l'indirizzo e la località siano corretti</p>
                    <div class="col-lg-6 mx-auto">
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <img src="https://i.ibb.co/WHnt9P4/doggo.png" alt="doggo" class="d-block mx-auto mb-4 image-fluid">
                        </div>
                    </div>
                </div>
              </div>
              <!-- QUESTA è TUTTA LA CARD DA CICLARE -->
              <div
              v-for="(announcement, index) in announcmentsFilteredLocation" :key="`announcement:${index}`"
                class="
                  col-12
                  d-flex
                  py-md-33
                  mb-3
                  p-3
                  card-col
                "
              >
                <!-- img -->
                <div class="box-img">
                  <div class="image mr-3">
                    <router-link
                    :to="{
                      name: 'app-details',
                      params: { ann: announcement.id } }">
                    <img  :src="getImage(announcement.image)" :alt="announcement.title">
                      <!-- <img
                      src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/space-of-mind-studio-puisto-architects-archmospheres-14-1605277273.jpg?resize=480:*"
                      alt="#"
                      /> -->
                    </router-link>
                  </div>

                </div>
                <!-- text -->
                <div class="d-none d-sm-block box-text w-100 pl-2">
                  <p>{{ announcement.address }}</p>
                  <h2>{{ announcement.title }}</h2>
                  <div class="riga"></div>
                  <p>
                    {{ announcement.room_type }} - {{ announcement.beds }} letti - {{ announcement.bathrooms }} bagni <br />
                    <span v-for="(service, index) in announcement.services" :key="`service:${index}`">{{ service.name }}
                      <span v-if="announcement.services.length > index + 1 "> - </span>
                      <!-- <span v-else-if="announcement.services.length < index">  </span> -->
                    </span>
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
              <!-- /Qui finisce la card originale -->
            </div>
          </div>
        </div>
        <!-- map-col -->
        <div class="d-none d-md-block col-12 col-xl-6">
          <!-- filter sm-lg -->
          <div
            class="
              d-flex d-xl-none
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
          <div class="map debug d-flex justify-content-center align-items-center">
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
        props:{
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

        getImage(img){
            return  /storage/ + img
        }


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
        overflow: hidden ;
        padding-top: 101px;
        .col-6 {
        flex-shrink: 0;
        }
        .box-card{
            overflow-y: scroll;
            position: relative;
            height: calc(100vh - 249px);
            z-index: 1;
                &::-webkit-scrollbar {
                display: none;
            }
            .card-col {
                border-radius: 10px;
                background-color: whitesmoke;
                .title{
                    margin: 20px 85px;
                    text-align: left;
                }
                .title h4,
                .title h6{
                    font-weight: bold;
                    display: inline-block;
                    margin-right: 50px;
                }
                .title p{
                    color: gray;
                    font-size: 0.8em;
                    margin-bottom: -2px;
                    margin-top: -3px;
                }
                .title .fa-star{
                    color: rgb(255, 187, 0);
                }
                .title .fa-heart{
                    color: rgb(250, 106, 106);
                    font-size: 1.3em;
                }
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
                .box-img{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    .image {
                    flex-shrink: 0;
                    height: 260px;
                    width: 280px;
                    margin-left: 20px;
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
            background: linear-gradient(to bottom,#EF6351, #F38375,#F7A399 );
            p{
            font-weight: bold;
            }
            .i-box {
            border-radius: 50%;
            width: 28px;
            height: 28px;
            background-color: whitesmoke;
            font-size: 0.8rem;
            }
        }
        }
        .map {
        min-height: 300px;
        height: calc(100vh - 169px);
        }
    }
.coral-text {
color: #EF6351;
}
</style>
