<template>
  <header class="">
    <div class="container-fluid debug px-lg-5 py-3">
        <div class="row px-xl-5">
            <!-- logo col -->
            <div class="col-3 d-none d-sm-block debug pl-lg-5">
                <div class="logo debug"></div>
            </div>
            <!-- nav-map col -->
            <div class="col col-sm-6 debug d-flex justify-content-center align-items-center">
                <div class="nav-map debug mx-5 rounded-pill d-flex align-items-center justify-content-between px-2 py-1">

                    <div class="d-flex debug justify-content-between align-items-center">
                        <i class="fa-solid fa-magnifying-glass debug search-i"></i>
                        <div class="nav-text ml-2 d-none d-md-block">
                            <p class="question mb-0 debug">Dove si va?</p>
                            <p class="answer mb-0 debug">Ovunque!</p>
                        </div>
                    </div>
                    <div class="slider-box d-flex justify-content-center align-items-center debug">
                        <i class="fa-solid fa-sliders"></i>
                    </div>

                </div>
            </div>
            <!-- link col -->
            <div class="col-3 d-none d-sm-flex debug link-col align-items-center justify-content-end pr-lg-5">
                <router-link to="">Diventa un host</router-link>
                    <i class="fa-solid fa-igloo mx-3"></i>
                <!-- user button -->
                <div @click="showNavDropD = ! showNavDropD"
                class="user-box debug rounded-pill px-3 align-items-center d-flex">
                    <i class="fa-solid fa-bars mr-4 debug"></i>
                    <i class="fa-solid fa-circle-user ml-1"></i>
                    <div v-if="showNavDropD"
                    class="drop-d position-absolute">
                    <div class="dd-row py-3 pl-3">
                        <p class="mb-0">Login</p>
                    </div>
                    <div class="dd-row py-3 pl-3">
                        <p class="mb-0">Registrati</p>
                    </div>
                    <div class="dd-row py-3 pl-3">
                        <p class="mb-0">Log out</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </header>
</template>

<script>
export default {
 name: 'HeaderComp',

 data() {
    return {
        showNavDropD: false,
    }
 },
}
</script>

<style lang="scss" scoped>

header{
    color: rgba(36, 36, 36, 0.884);
    .logo{
        height: 50px;
        width: 90px;
    }

    .nav-map{
        width: 80%;
        height: 45px;
        .search-i{
            font-size: 1.2rem;
        }
        .nav-text{
            .question{
                font-size: 0.7rem;
                font-weight: bolder;
            }
            .answer{
                font-size: 0.6rem;
            }
        }

        .slider-box{
            border-radius: 50%;
            height: 27px;
            width: 27px;
        }
    }

    .link-col{
        a{
            color: rgba(0, 0, 0, 0.884);
            font-size: 0.8rem;
            font-weight: bold;
        }
        i{
            font-size: 1.2rem;
        }
        .user-box{
            position: relative;
            height: 45px;
            i{
                font-size: 1rem;
            }
            .fa-circle-user{
                font-size: 1.5rem;
            }
            .drop-d{
                top: 46px;
                left: 50%;
                border: 1px solid rgb(138, 135, 135);
                background-color: #ffe3e0;
                border-radius: 5px;
                transform: translate(-50%);
                width: 200%;
                min-height: 100px;
                .dd-row{
                    border-bottom: 1px solid rgb(138, 135, 135);
                }
            }
        }
    }
}

</style>
