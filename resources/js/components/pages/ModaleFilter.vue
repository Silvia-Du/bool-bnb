<template>
    <div class="modal-container">
        <div class="m-modal h-100 pt-5 container">
            <!-- x -->
            <i @click=" hideModal() " class="fa-solid fa-x"></i>
            <h5 class="title mb-3">Filtri di ricerca avanzata</h5>
            <div class="filter container-fluid py-3">
                <!-- tipo di stanza -->

                <!-- <h5 class="my-3">Tipologia di alloggio</h5>
                <div class="row d-flex  py-3 px-lg-5 mb-3">
                    <div @click="getRoomType(roomT, i)"
                    v-for="(roomT, i) in roomTypeCollection" :key="`room${i}`"
                    class="col-3 room-cad mx-xl-4 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-capitalize">{{ roomT }}</p>
                        <div class="check-b d-flex align-items-center justify-content-center">
                            <i v-if="indexSelectedRoom === i"
                            class="fa-solid fa-square-check"></i>
                        </div>
                    </div>
                </div> -->

                <!-- stanze e letti -->
                <h5>Stanze e letti</h5>
                <div class="row buttton-row d-flex p-3 ">
                    <!-- camere -->
                    <p class=" my-2">Camere</p>
                    <div class="col-12 d-flex justify-content-lg-start align-items-center info">
                        <div @click="getSheetNumber(room, i, 'rooms')"
                        v-for="(room, i) in numberOfSheet" :key="`room${i}`"
                        class="_btn rounded-pill p-3" :class="{'black': i === roomIndex}" >{{room}}</div>
                    </div>
                    <!-- letti -->
                    <p class="mt-4 mb-2">Letti</p>
                    <div class="col-12 d-flex justify-content-lg-start align-items-center info">
                        <div @click="getSheetNumber(bed, i, 'beds')"
                        v-for="(bed, i) in numberOfSheet" :key="`bed${i}`"
                        class="_btn rounded-pill p-3" :class="{'black': i === bedsIndex}">{{bed}}</div>
                    </div>
                    <!-- bagni -->
                    <p class="mt-4 mb-2">Bagni</p>
                    <div class="col-12 d-flex justify-content-lg-start align-items-center mb-3 info">
                        <div @click="getSheetNumber(bathrom, i, 'bathroms')"
                        v-for="(bathrom, i) in numberOfSheet" :key="`bath${i}`"
                        class="_btn rounded-pill p-3" :class="{'black': i === bathromsIndex}">{{bathrom}}</div>
                    </div>
                </div>

                <!-- Tipologia di alloggio (NUOVO)-->
                <div class="row buttton-row d-flex cat-service-row">
                    <div class="col-12 d-flex justify-content-lg-start align-items-center info category-col ">
                        <h5 class="my-3">Tipologia di alloggio</h5>
                        <div class="container my-2 p-3">
                            <div class="row px-1">
                                <div  v-for="(category, i) in catCollection" :key="`cat-${i}`"
                                    class="col-4 col-md-3 mb-3 cat-card p-2 position-relative">
                                        <div @click="checkedCat(category)"
                                            class="cat-box h-100 d-flex flex-column align-items-center justify-content-center">
                                            <i class="fa-solid fa-house mb-1 p-1"></i>
                                            <p class="mb-0">{{ category }}</p>
                                        </div>
                                    <i v-if="checkedCategory.includes(category)"
                                    class="fa-solid fa-circle-check position-absolute"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- categoria alloggio -->
                <!-- <div class="row cat-service-row d-flex justify-content-around py-3 mb-3 px-2"> -->
                    <!-- servizi -->
                    <!-- <div class="col-12 col-md-6 services-col">
                        <h5 class="my-3 ml-3">Servizi</h5>
                        <div class="container-fluid">
                            <div v-for="(service, i) in services" :key="`s${i}`"
                            class="d-flex justify-content-between py-2 px-3">
                                <p class="mb-0">{{ service.name }}</p>
                                <div @click="getCheckedService(service.name)"
                                class="check-b d-flex align-items-center justify-content-center">
                                    <i v-if="checkedServices.includes(service.name)"
                                    class="fa-solid fa-square-check"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- categorie -->
                    <!-- <div class="col-12 col-md-6 category-col d-flex flex-column justify-content-between">
                        <h5 class="my-3 ml-3">Tipologia di alloggio</h5>
                        <div class="container-fluid py-4">
                            <div class="row px-1">
                                <div  v-for="(category, i) in catCollection" :key="`cat-${i}`"
                                class="col-4 col-md-3 mb-3 cat-card p-2 position-relative">
                                    <div @click="checkedCat(category)"
                                    class="cat-box h-100 d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa-solid fa-house mb-1 p-1"></i>
                                        <p class="mb-0">{{ category }}</p>
                                    </div>
                                    <i v-if="checkedCategory.includes(category)"
                                    class="fa-solid fa-circle-check position-absolute"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- button row -->
                <div class="row action-row  d-flex justify-content-between py-3 px-5 align-items-center">
                    <p @click="deleteAll()"
                    class="delete-all mb-0 mx-lg-2">Cancella tutto</p>
                    <div @click="getFilteredAnnounce()"
                    class="show-location py-3 px-4 rounded-pill text-center mx-lg-2">
                        <p class=" mb-0">Mostra annunci</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name:'ModaleFilter',
        props:{
            showFilters: Boolean,
            catCollection: Array
        },
        data(){
            return{
                isShow: true,
                servicesApi: 'api/announcements/get-services',
                // services: 'all',
                // checkedServices: [],
                checkedCategory: [],
                // selectedRoomType: 'all',
                // indexSelectedRoom: -1,
                // roomTypeCollection: ['stanza singola', 'stanza condivisa', 'intero alloggio'],
                numberOfSheet: [ 'Qualsiasi', '1', '2', '3+'],
                selectedRooms:'all',
                roomIndex:0,
                selectedBeds: 'all',
                bedsIndex:0,
                selectedBathroms: 'all',
                bathromsIndex:0,
                data:null
            }
        },
        methods: {
            hideModal(){
                this.isShow = false;
                this.$emit('isHide', this.isShow);
            },
            getServices(){
                axios.get(this.servicesApi)
                .then(response =>{
                    this.services = response.data;
                    // console.log(response.data);
                })
            },
            checkedCat(category){
                if(!this.checkedCategory.includes(category)){
                    this.checkedCategory.push(category);
                }else{
                    this.checkedCategory.forEach((cat, i) => {
                        if(cat === category){
                            this.checkedCategory.splice(i,1);
                        }
                    });
                }
            },
            getCheckedService(service){
                if(!this.checkedServices.includes(service)){
                    this.checkedServices.push(service);
                }else{
                    this.checkedServices.forEach((checked, i)=> {
                        if(checked === service)
                        this.checkedServices.splice(i, 1);
                    })
                }
            },
            getRoomType(roomT, index){
                // console.log(index);
                this.selectedRoomType = roomT;
                this.indexSelectedRoom = index;
            },
            getSheetNumber(data, index, type){
                if(type === 'rooms'){
                    this.selectedRooms = data;
                    this.roomIndex = index;
                }else if(type === 'beds'){
                    this.selectedBeds = data;
                    this.bedsIndex = index;
                }else if(type === 'bathroms'){
                    this.selectedBathroms = data;
                    this.bathromsIndex = index;
                }
            },
            deleteAll(){
                this.selectedRooms = 'all';
                this.roomIndex = 0;
                this.selectedBeds = 'all';
                this.bedsIndex = 0;
                this.selectedBathroms = 'all';
                this.bathromsIndex = 0;
                this.checkedCategory = [];
                // this.selectedRoomType = 'all';
                this.indexSelectedRoom = -1;
            },
            getFilteredAnnounce(){
                this.data =
                    {
                        rooms: this.selectedRooms,
                        beds: this.selectedBeds,
                        bathrooms: this.selectedBathroms,
                        // roomType: this.selectedRoomType,
                        // services: this.checkedServices,
                        houseType: this.checkedCategory
                    },
                this.$emit('filterData', this.data);
                // console.log(this.data);
            }
        },
        mounted() {
            this.getServices();
        },
    }
</script>
<style lang="scss" scoped>
    .modal-container{
        background-color: #ede6e3;
        box-shadow: 0px 0px 10px 1px rgb(172, 172, 172) ;
        position: absolute;
        z-index: 999;
        border-radius: 10px;
        width: 60%;
        //@keyframe da fare
        top: 100px;
        left: 50%;
        transform: translate(-50%);
        p{
            font-weight: bold;
        }
        .info{
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .check-b{
            border: 1px solid rgb(51, 51, 51);
            border-radius: 5px;
            width: 20px;
            height: 20px;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .m-modal{
            position: relative;
            border-radius: 10px;
        }
        .fa-x{
            position: absolute;
            font-size: 1.2rem;
            right: 18px;
            top: 13px;
        }
        .filter{
            border-top: 1px solid gray;
            overflow-y: scroll;
            height: calc(100vh - 250px);
            &::-webkit-scrollbar {
                width: 5px;
            }
            &::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
                border-radius: 10px;
            }
            &::-webkit-scrollbar-thumb {
                background: linear-gradient(to top,#EF6351, #F38375,#F7A399 );
                border-radius: 10px;
            }
            .room-cad{
                height: 50px;
                display: flex;
                flex-wrap: wrap;
            }
            .buttton-row{
                ._btn{
                    background-color: #f0f0f0;
                    width: 120px;
                    text-align: center;
                    margin: 20px 20px 10px 0;
                    cursor: pointer;
                    &.black{
                        background: linear-gradient(to right,#EF6351, #F38375,#F7A399 );
                        color: rgb(219, 219, 219);
                    }
                }
            }
          .cat-service-row{
              .container-fluid{
                  box-shadow: 0px 0px 10px 1px rgb(204, 202, 202) ;
                  border-radius: 15px;
              }
              .cat-card{
                    height: 100px;
                    border-radius: 15px;
                    flex-shrink: 0;
                    text-align: center;
                    .cat-box{
                        border-radius: 15px;
                        background-color: #ede6e3;
                        border: 1px solid #f06449;
                        transition: ease-out 0.5s;
                        outline: none;
                        &:hover{
                            cursor: pointer;
                            box-shadow: inset 0 172px 0 0 #EF6351;
                        }
                        p{
                            text-transform: capitalize;
                        }
                    }
                }
                label{
                  font-size: 1rem;
                }
              i{
                  font-size: 1.4rem;
                  color: #36382e;
                }
                .category-col{
                    border-top: 1px solid  rgb(172, 172, 172);
                    .fa-circle-check{
                        top: 8px;
                        right: 7px;
                        color: #36382e;
                    }
                }
                services-col{
                    border-top: 1px solid  rgb(172, 172, 172);
                    border-radius: 5px;
                    .fa-square-check{
                        color: #ef6351;
                        font-size: 1.4rem;
                    }
                }
            }
            .action-row{
                border-top: 1px solid gray;
                overflow: hidden;
                .delete-all{
                    text-decoration: underline;
                    font-weight: bold;
                    font-size: 1rem;
                    transition: 0.5s;
                    cursor: pointer;
                    &:hover{
                        color: #EF6351;
                    }
                }
                .show-location{
                    background: linear-gradient(to right,#EF6351, #F38375,#F7A399 );
                    color: white;
                    width: 172px;
                    flex-shrink: 0;
                    transition: ease-out 0.5s;
                    outline: none;
                    cursor: pointer;
                    &:hover{
                        box-shadow: inset 172px 0 0 0 #EF6351;
                    }
                }
            }
        }
    }
</style>
