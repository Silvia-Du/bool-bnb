<template>
  <div class="modal-container debug">
    <div class="m-modal h-100 debug pt-5">
        <!-- x -->
        <i @click=" hideModal() " class="fa-solid fa-x"></i>
        <div class="filter debug container-fluid pt-2">

            <h5 class="my-3">Tipologia di alloggio</h5>
            <div class="row debug d-flex justify-content-around py-3 px-lg-5 mb-3">
                <div class="col-3 room-cad debug mx-xl-4"></div>
                <div class="col-3 room-cad debug mx-xl-4"></div>
                <div class="col-3 room-cad debug mx-xl-4"></div>
            </div>
            <!-- stanze e letti -->
            <h5>Stanze e letti</h5>
            <div class="row buttton-row debug d-flex p-3">
                <p class=" my-2">Camere</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center">
                    <div class="_btn black rounded-pill p-3 debug">Qualsiasi</div>
                    <div class="_btn 1 rounded-pill p-3 debug">1</div>
                    <div class="_btn 2 rounded-pill p-3 debug">2</div>
                    <div class="_btn 3 rounded-pill p-3 debug">3+</div>
                </div>
                <p class="mt-4 mb-2">Letti</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center">
                    <div class="_btn black rounded-pill p-3 debug">Qualsiasi</div>
                    <div class="_btn 1 rounded-pill p-3 debug">1</div>
                    <div class="_btn 2 rounded-pill p-3 debug">2</div>
                    <div class="_btn 3 rounded-pill p-3 debug">3+</div>
                </div>
                <p class="mt-4 mb-2">Bagni</p>
                <div class="col-12 debug d-flex justify-content-lg-start align-items-center mb-3">
                    <div class="_btn black rounded-pill p-3 debug">Qualsiasi</div>
                    <div class="_btn 1 rounded-pill p-3 debug">1</div>
                    <div class="_btn 2 rounded-pill p-3 debug">2</div>
                    <div class="_btn 3 rounded-pill p-3 debug">3+</div>
                </div>
            </div>
            <!-- categoria alloggio -->
            <h5 class="my-3">Tipologia di alloggio</h5>
            <div class="row cat-row debug d-flex justify-content-around py-3 px-lg-5 mb-3">
                <div class="col-6 col-lg-3 cat-card p-3">
                    <div class="cat-box debug h-100"></div>
                </div>
                <div class="col-6 col-xl-3 cat-card p-3">
                    <div class="cat-box debug h-100"></div>
                </div>
                <div class="col-6 col-xl-3 cat-card p-3">
                    <div class="cat-box debug h-100"></div>
                </div>
                <div class="col-6 col-xl-3 cat-card p-3">
                    <div class="cat-box debug h-100"></div>
                </div>
            </div>

        </div>

    </div>
  </div>
</template>

<script>
export default {
    name:'ModaleFilter',
    isShow: true,


    props:{
        showFilters: Boolean,
    },

    methods: {
        hideModal(){
            this.isShow = false;
            this.$emit('isHide', this.isShow);
        }
    },
}
</script>

<style lang="scss" scoped>


.modal-container{
    p{
        font-weight: bold;
    }
    position: absolute;
    z-index: 999;
    border-radius: 10px;
    width: 60%;
    //@keyframe da fare
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    .m-modal{
        position: relative;
        border-radius: 10px;
    }
    i{
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
                &.black{
                    background-color: rgb(31, 30, 30);
                    color: rgb(219, 219, 219);
                }
            }
        }
        .cat-row{
            .cat-card{
                height: 164px;
                border-radius: 15px;
                flex-shrink: 0;
                .cat-box{
                    border-radius: 15px;

                }
            }
        }
    }
}

</style>
