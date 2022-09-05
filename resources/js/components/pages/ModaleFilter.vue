<template>
  <div class="modal-container debug">
    <div class="m-modal h-100 debug pt-5">
        <!-- x -->
        <i @click=" hideModal() " class="fa-solid fa-x"></i>
        <div class="filter debug container-fluid pt-2">

            <h5 class="my-3">Tipologia di alloggio</h5>
            <!-- tipo di stanza -->
            <div class="row debug d-flex justify-content-around py-3 px-lg-5 mb-3">
                <div @click="getRoomType(roomT, i)"
                v-for="(roomT, i) in roomTypeCollection" :key="`room${i}`"
                class="col-3 room-cad debug mx-xl-4 d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-capitalize">{{ roomT }}</p>
                    <div class="check-b d-flex align-items-center justify-content-center">
                        <i v-if="indexSelectedRoom === i"
                        class="fa-solid fa-square-check"></i>
                    </div>
                </div>
            </div>
            <!-- stanze e letti -->
            <h5>Stanze e letti</h5>
            <div class="row buttton-row debug d-flex p-3">
                <!-- camere -->
                <p class=" my-2">Camere</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center">
                    <div @click="getSheetNumber(room, i, 'rooms')"
                    v-for="(room, i) in numberOfSheet" :key="`room${i}`"
                    class="_btn rounded-pill p-3 debug" :class="{'black': i === roomIndex}" >{{room}}</div>

                </div>
                <!-- letti -->
                <p class="mt-4 mb-2">Letti</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center">
                    <div @click="getSheetNumber(bed, i, 'beds')"
                    v-for="(bed, i) in numberOfSheet" :key="`bed${i}`"
                    class="_btn rounded-pill p-3 debug" :class="{'black': i === bedsIndex}">{{bed}}</div>
                </div>
                <!-- bagni -->
                <p class="mt-4 mb-2">Bagni</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center mb-3">
                    <div @click="getSheetNumber(bathrom, i, 'bathroms')"
                    v-for="(bathrom, i) in numberOfSheet" :key="`bath${i}`"
                    class="_btn rounded-pill p-3 debug" :class="{'black': i === bathromsIndex}">{{bathrom}}</div>

                </div>
            </div>
            <!-- categoria alloggio -->
            <div class="row cat-service-row debug d-flex justify-content-around py-3 mb-3">
                <!-- servizi -->
                <div class="col-12 col-md-6 debug">
                    <h5 class="my-3 ml-3">Servizi</h5>
                    <div class="container-fluid">
                        <div v-for="(service, i) in services" :key="`s${i}`"
                        class="d-flex justify-content-between debug py-2 px-3">
                            <p class="mb-0">{{ service.name }}</p>
                            <div @click="getCheckedService(service.name)"
                            class="check-b d-flex align-items-center justify-content-center">
                                <i v-if="checkedServices.includes(service.name)"
                                class="fa-solid fa-square-check"></i>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- categorie -->
                <div class="col-12 col-md-6 category-col debug d-flex flex-column justify-content-between">
                    <h5 class="my-3 ml-3">Tipologia di alloggio</h5>
                    <div class="container-fluid debug py-4">
                        <div class="row debug">

                            <div  v-for="(category, i) in catCollection" :key="`cat-${i}`"
                             class="col-4 col-md-3 mb-3 cat-card p-2 position-relative">
                                <div @click="checkedCat(category)"
                                 class="cat-box debug h-100 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fa-brands fa-fort-awesome mb-1 p-1"></i>
                                    <p class="mb-0">{{ category }}</p>
                                </div>
                                <i v-if="checkedCategory.includes(category)"
                                class="fa-solid fa-circle-check position-absolute"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- button row -->
            <div class="row action-row  debug d-flex justify-content-between py-3 px-5 align-items-center">
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
            services: 'all',
            checkedServices: [],
            checkedCategory: [],
            selectedRoomType: 'all',
            indexSelectedRoom: -1,
            roomTypeCollection: ['stanza singola', 'stanza condivisa', 'intero alloggio'],
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
            this.selectedRoomType = 'all';
            this.indexSelectedRoom = -1;
        },
        getFilteredAnnounce(){
             this.data = 
                {
                    rooms: this.selectedRooms,
                    beds: this.selectedBeds,
                    bathrooms: this.selectedBathroms,
                    roomType: this.selectedRoomType,
                    services: this.checkedServices,
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
    position: absolute;
    z-index: 999;
    border-radius: 10px;
    width: 60%;
    //@keyframe da fare
    top: 500px;
    left: 50%;
    transform: translate(-50%);
    p{
        font-weight: bold;
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
        .room-cad{
            height: 50px;
            border-radius: 5px;
        }
        .buttton-row{
            ._btn{
                width: 120px;
                text-align: center;
                margin: 0 20px 0 0;
                cursor: pointer;
                &.black{
                    background-color: rgb(31, 30, 30);
                    color: rgb(219, 219, 219);
                }
            }
        }
        .cat-service-row{
            .cat-card{
                height: 91px;
                border-radius: 15px;
                flex-shrink: 0;
                .cat-box{
                    border-radius: 15px;
                    cursor: pointer;
                    p{
                        text-transform: capitalize;
                    }
                }
            }
            label{
                font-size: 1rem;
            }
            i{
                font-size: 1.3rem;
            }

            .category-col{
                .fa-circle-check{
                    top: 8px;
                    right: 7px;
                }
            }
        }
        .action-row{
            border-top: 1px solid gray;
            .delete-all{
                text-decoration: underline;
                font-weight: bold;
                font-size: 1rem;
                cursor: pointer;
            }
            .show-location{
                background-color: rgb(36, 36, 36);
                color: white;
                width: 172px;
                flex-shrink: 0;
                cursor: pointer;
            }
        }

    }

}

</style>
