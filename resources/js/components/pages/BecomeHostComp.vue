<template>

<div class="pt-5 container">

    <div class="d-flex justify-content-center">
        <img src="https://fontmeme.com/permalink/220909/b9eb29d5a1b9109f77870b2bb7860631.png" class="mt-5 mb-0 img-fluid ">
    </div>

    <div class=" stat-container container d-flex justify-content-around my-5">

        <div class="stat">
            <h5>gli host guadagnano in media</h5>
            <span class="text-danger">1600 &euro; al mese</span>
        </div>
        <div class="stat">
            <h5>Una media di </h5>
            <span>85 &euro; a notte</span>
        </div>
        <div class="stat">
            <h5>I loro alloggi sono prenotati</h5>
            <span>20 notti al mese</span>
        </div>

    </div>


     <div id="carouselExampleIndicators" class="carousel slide d-none  d-xl-block d-md-block  container   m-auto b-round " data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner b-round b-shadow">
           <div class="carousel-item active">
             <img class="d-block w-100 " src="https://www.smilingischic.com/wp-content/uploads/2017/01/smilingischic-travel-homeaway-francia-altasavoia-9439.jpg" alt="First slide">
             <div class="carousel-caption ">
                 <h3>Bool BnB mi ha permesso di fare il lavoro che amo: prendermi cura degli ospiti nella nostra casa.</h3>
                 <p>Michela Mai</p>
             </div>
           </div>
           <div class="carousel-item b-round b-shadow">
             <img class="d-block w-100 " src="https://jeve.it/wp-content/uploads/2021/03/PAS.05.21.Brunello_Cucinelli-featured-2240x1493.jpg" alt="Second slide">
             <div class="carousel-caption ">
                 <h3>Affittare la mia casa mi ha permesso di intraprendere un'attività imprenditoriale, aprendomi la strada verso la libertà finanziaria.</h3>
                 <p>- Mario Rossi</p>
             </div>
           </div>
           <div class="carousel-item">
             <img class="d-block w-100 " src="https://www.inattraction.com/wp-content/uploads/2021/03/Come-far-impazzire-una-ragazza-o-una-donna.jpg" alt="Third slide">
             <div class="carousel-caption ">
                 <h3>Affittare il mio monolocale mi ha cambiato la vita e mi ha regalato esperienze memorabili con persone fantastiche.</h3>
                 <p>- Claudia Rossi</p>

             </div>
           </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
     </div>

     <!-- NUOVO -->
    <div class="container col-xxl-8 py-3">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-3">

            <div class="col-10 col-sm-8 col-lg-6 d-none d-xxl-block d-xl-block d-xxl-none d-lg-block d-xl-none">
                <img src="https://i.ibb.co/dLPRxbJ/ezgif-com-gif-maker-2.gif"
                    class="b-round b-shadow img-fluid "/>
            </div>

            <div class="col-lg-6 b-round b-shadow p-3">
                <h3 class="text-center">Prova ad ospitare su</h3>

                <div class="d-flex justify-content-center my-2">
                    <img src="https://i.ibb.co/12xdr7G/Logo-Bool-Bn-B-bnw.png" class="image-fluid py-3" width="50%"/>
                </div>

                <h5 class="text-center">Unisciti a noi, saremo al tuo fianco in ogni momento!</h5>

                <div class="d-flex justify-content-center my-2">
                    <a @click="getRoute('admin/announcements')"
                        class="btn-rounded-plus  text-center my-1" href="#">
                        Crea un nuovo annuncio
                    </a>
                </div>
            </div>
        </div>
    </div>




     <!-- VECCHIO -->
    <!-- <div class="container-fluid bg-light mt-5 ">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 p-0 m-0"> -->
                <!-- <img class="d-block w-100" src="../../../../public/images/ezgif.com-gif-maker (2).gif" alt="Third slide"> -->
            <!-- </div>
            <div class="col-12 col-md-12 col-lg-6 bg-dark p-0 m-0 d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center">
                    <div class="text-cont p-sm-5 ">
                        <h2 class="text-center">Prova ad ospitare su Bool BnB</h2>
                        <img src="https://i.ibb.co/J286Vhh/Logo-Bool-Bn-B.png" class="image-fluid" width="430px" height="180px"/>
                        <h4 class="text-center">Unisciti a noi, saremo al tuo fianco in ogni momento!</h4>
                        <a @click="getRoute('admin/announcements')"
                        class="btn-create  text-center"
                            href="#">
                            Crea un nuovo annuncio
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div> -->

</div>
</template>

<script>

export default{
  name: 'BecomeHostComp',
  methods:{
    getRoute(page){
        window.location.href = '/'+page;
        //ROTTA PER LOG OUT????
    },
  }
}
</script>


<style lang="scss" scoped>

.stat {
    border-radius: 15px;
    width: calc(100%/3 - 20px);
    margin: 0 20px;
    box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
    background-color: #f7f7f7;
    padding: 20px;

    span {
        font-size: 30px;
    }
}

.text-cont {
    background: white;
    border-radius: 15px;
    color: black;
    box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);


    // h2 {
    //     font-size: 60px;
    //     color: white;
    //     margin-bottom: 40px;
    // }

    // h4 {
    //     color: white;
    //     font-size: 30px;
    // }

    .btn-create {
        border-radius: 30px;
        padding: 10px 15px;
        width: 500px;
        font-size: 25px;
        display: block;
        margin-top: 5px;
        text-decoration: none;
        transition: ease-out 0.5s;
        background: linear-gradient(to right, #EF6351, #F38375, #F7A399);
        color: white;

        &:hover {
            box-shadow: inset 500px 0 0 0 #EF6351;
            color: white;
        }
    }
}


.box {


    h1 {
        font-size: 60px;
        text-transform: uppercase;

    }

    img {
        filter: contrast(0.75);

    }
}


@media screen and (max-width: 800px) {

    .box {
        h1 {
            font-size: 1.5rem;
            text-align: justify;
        }
    }

    .stat-container {
        flex-direction: column;
    }


    .stat {
        border-radius: 15px;
        display: block;
        width: 100%;
        box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
        background-color: #f7f7f7;
        margin: 20px 0;
        text-align: center;
        padding: 40px;

        span {
            font-size: 20px;
        }
    }

    .text-cont {
        padding: 20px;

        h2 {
            font-size: 30px;
            color: white;
            margin-bottom: 40px;
        }

        h4 {
            color: white;
            font-size: 20px;
            text-align: center;
        }


        .btn-create {
            border-radius: 15px;
            padding: 15px;
            font-size: 15px;
            background-color: red;
            display: block;
            width: 50%;
            margin: auto;
            color: white;
            margin-top: 25px;
        }
    }


    .box {
        h1 {
            font-size: 60px;
            text-transform: uppercase;

        }

        img {
            filter: contrast(0.75);
        }
    }
}

 .b-round {
    border-radius: 15px;
    }

.b-shadow {
    box-shadow: 0px 0px 50px 1px rgb(201, 200, 200);
}

.btn-rounded-plus {
    border-radius: 30px;
    padding: 10px 15px;
    width: 200px;
    transition: ease-out 0.5s;
    background: linear-gradient(to right, #EF6351, #F38375, #F7A399);
    color: white;

    &:hover {
        box-shadow: inset 200px 0 0 0 #EF6351;
        color: white;
    }
}

a{
    text-decoration: none;
}



</style>

