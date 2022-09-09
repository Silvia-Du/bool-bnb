<template>
  <header>
    <div class="container-fluid  px-lg-5 py-3">
        <div class="row px-xl-5">
            <!-- logo col -->
            <div class="col-3 d-none d-sm-block pl-lg-5">
                <div class="logo">
                    <a href="/"><img src="images\logo.png" class="logo" /></a>
                </div>
            </div>
            <!-- nav-map col -->
            <div class="col col-sm-6 d-flex justify-content-center align-items-center">
                <div class="nav-map mx-5 rounded-pill d-flex align-items-center justify-content-between px-2 py-1">

                    <div class="d-flex justify-content-between align-items-center">
                        <i class="fa-solid fa-magnifying-glass  search-i"></i>
                        <div class="nav-text ml-3 d-none d-md-block">
                            <p class="question mb-0">Dove si va?</p>
                        </div>
                    </div>
                    <div class="bar text-center">
                        <input
                        @keyup.enter="sendInput"
                        v-model="whereInput"
                        type="text"
                        id="title"
                        name="title"
                        class="bar-head rounded-pill text-center">
                    </div>
                    <div class="slider-box d-flex justify-content-center align-items-center">
                        <router-link :to="{name: 'advanced', params: {location: whereInput} }">
                            <p @click="sendInput" class="mb-0">
                                <i class="fa-solid fa-location-dot"></i>
                            </p>
                        </router-link>
                    </div>

                </div>
            </div>
            <!-- link col -->
            <div class="col-3 d-none d-sm-flex link-col align-items-center justify-content-end pr-lg-5">
                <router-link to="">Diventa un host</router-link>
                    <i class="fa-solid fa-globe mx-3"></i>
                <!-- user button -->
                <div @click="showNavDropD = ! showNavDropD"
                class="user-box rounded-pill px-3 align-items-center d-flex">
                    <i class="fa-solid fa-bars mr-4"></i>
                    <i class="fa-solid fa-circle-user ml-1"></i>
                    <div v-if="showNavDropD"
                    class="drop-d position-absolute">
                    <div @click="getRoute('login')"
                    class="dd-row py-3 pl-3">
                            <p class="mb-0">Login</p>
                    </div>
                    <div @click="getRoute('register')"
                    class="dd-row py-3 pl-3">
                        <p class="mb-0">Registrati</p>
                    </div>
                    <div @click="getRoute('logout')"
                    class="dd-row py-3 pl-3">
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

 props:{

 },

 data() {
    return {
        showNavDropD: false,
        whereInput: ''
    }
 },

 methods: {
    getRoute(page){
        window.location.href = '/'+page;
        //ROTTA PER LOG OUT????
    },
    sendInput(){
        this.$emit('mandoInput', this.whereInput);
    }
 },
}
</script>

<style lang="scss" scoped>

header{
    top: 0;
    background-color: rgba(50, 50, 50, 0.432);
    width: 100%;
    position: fixed;
    z-index: 999;
    color: rgba(36, 36, 36,0.8);
    // backdrop-filter: blur(10px);
    .logo{
        width: 130px;
        height: 50px;
    }

    .nav-map{
        cursor: pointer;
        width: 82%;
        height: 45px;
        background-color: #ede6e3;
        border: 1px solid rgb(138, 135, 135);
        .bar{
            width: 80%;
            height: 40px;
            input{
                width: 100%;
                height: 35px;
                margin-top: 3px;
                background-color: #ffffff;
                border: none;

            }
        }

        .search-i{
            font-size: 1.2rem;
            color: #EF6351;
        }

        .nav-text{
        color: rgba(36, 36, 36, 0.884);

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
            height: 30px;
            width: 30px;
            font-size: 0.8rem;
            background-color: #EF6351;
            a{
                color: #ede6e3;
                margin-bottom: 0;
            }
        }
    }

    .box-host{
        text-align: center;
        color: #EF6351;
    }
    .link-host{
        color: #EF6351;
        transition: 0.5s;
        text-decoration: none;
        font-size: 1.2rem;
        &:hover{
            color: #ede6e3 ;
        }
    }

   .user-box{
        cursor: pointer;
        background-color: #ede6e3;
        border: 1px solid rgb(138, 135, 135);
        position: relative;
        height: 45px;
        i{
            font-size: 1rem;
            color: #EF6351;
         }
        .fa-circle-user{
            font-size: 1.5rem;
            color: rgba(0, 0, 0, 0.884);

         }
        .drop-d{
            top: 46px;
            left: 50%;
            border: 1px solid rgb(138, 135, 135);
            background-color: #ede6e3;
            border-radius: 5px;
            transform: translate(-50%);
            width: 200%;
            min-height: 100px;
            .dd-row{
                border-bottom: 1px solid rgb(138, 135, 135);
            }
        }
    }
    .link-col{
        .fa-globe{
            font-size: 1rem;
            color: white;
        }
        a{
            color: white;
            &:hover{
                text-decoration: none;
                color: #FFE3E0;
            }
        }
    }
}

</style>
