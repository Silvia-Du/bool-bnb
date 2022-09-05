<template>
  <div class="container-fluid px-lg-5 research-adv">
    <div class="row px-lg-5 flex-md-wrap-reverse ">
        <!-- card col -->
        <div class="col-12 col-xl-6">
            <!-- filter row xl-->
            <div class="d-flex d-md-none d-xl-flex container-fluid filter py-3 justify-content-between align-items-center">
                <p class="num-result mb-0">Tot risultati</p>
                <div class="advanced-filter">
                    <div class="box debug d-flex align-items-center justify-content-between px-2 py-2">
                        <p class="mb-0">Filtri</p>
                        <div class="i-box d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card-row -->
           <div class="container-fluid debug">
               <div class="row pt-2">
                <!-- card -->
                <div class="col-12 d-flex py-md-33 justify-content-center mb-3  p-2 card-col">
                    <!-- img -->
                    <div class="img mr-3">
                        <img
                        src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/space-of-mind-studio-puisto-architects-archmospheres-14-1605277273.jpg?resize=480:*"
                        alt="#"
                    />
                    </div>
                    <!-- text -->
                    <div class="d-none d-sm-block box-text w-100 pl-2">
                        <p>Entire home in Bordeaux</p>
                        <h2>Bordeaux Getaway</h2>
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
                    <p class="price d-none d-sm-block position-absolute mb-0">360€/notte</p>

                </div>
                <!-- /card -->
                <div class="col-12 debug">eccomi</div>
                <div class="col-12 debug">eccomi</div>
            </div>
           </div>


        </div>
        <!-- map-col -->
        <div class="d-none d-md-block col-12 col-xl-6 debug ">
            <!-- filter sm-lg -->
            <div class="d-flex d-xl-none container-fluid filter debug py-3 justify-content-between align-items-center">
                <p class="num-result mb-0">Tot risultati</p>
                <div class="advanced-filter">
                    <div class="box debug d-flex align-items-center justify-content-between px-2 py-2">
                        <p class="mb-0">Filtri</p>
                        <div class="i-box d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map debug d-flex justify-content-center align-items-center">
                mappa
            </div>
        </div>
    </div>
  </div>
</template>




<template>
    <div class="px-lg-5 container-fluid">
      <div class="box d-flex">
        <div class="col-cards px-lg-5">

          <!-- Card di prova da cancellare -->

              <div class="cards d-flex">
                  <div class="box-img">
                      <div class="image">
                      <img
                          src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/space-of-mind-studio-puisto-architects-archmospheres-14-1605277273.jpg?resize=480:*"
                          alt="#"
                      />
                      </div>
                  </div>
                  <div class="box-text">
                      <p>Entire home in Bordeaux</p>
                      <h2>Bordeaux Getaway</h2>
                      <div class="riga"></div>
                      <p>
                      2 guests - Entire Home - 1 Bads - 1 Bath <br />
                      Wifi - Kitchen - Free Parking
                      </p>
                      <div class="riga"></div>
                      <i class="fa-solid fa-star"></i>
                  </div>
                  <div class="box-heart">
                      <i class="fa-solid fa-heart"></i>
                      <!-- <i class="fa-regular fa-heart"></i> -->
                      <p>360€/notte</p>
                  </div>
              </div>
        </div>

        <div class="col-map debug p-2 ">
          <div class="map debug h-100"></div>
        </div>
      </div>
    </div>
  </template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

    .research-adv{
        background-color: #ede6e3;
        .col-6{
            flex-shrink: 0;
        }
        .card-col{
            position: relative;
        border-radius: 5px;
        background-color: #f8f3f1;
        box-shadow: 0px 0px 10px 1px rgb(82, 82, 82) ;
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
        .box-heart{
          top: 12px;
          right: 12px;
          font-size: 1.3em;
          color: rgb(250, 106, 106);
        }
        .price{
            bottom: 12px;
            right: 12px;
        }
        .img{
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

      .filter{
        .num-result{
            font-weight: bold;
        }
        .box{
            width: 100px;
            flex-shrink: 0;
            border-radius: 10px;
            .i-box{
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
        min-height: 500px;
      }
    }





    .box {
  height: calc(100vh - 166px);
  justify-content: space-between;
  .col-cards {
    padding-top: 30px;
    margin-right: 20px;
    height: calc(100vh - 166px);
    width: 60%;
    overflow-y: scroll;
    overflow-x: hidden;
    &::-webkit-scrollbar {
      display: none;
    }

    .cards {
      height: 300px;
      border-bottom: 1px solid gray;

      .box-img {
        .image {
          height: 260px;
          width: 280px;
          margin-right: 25px;
          margin-top: 20px;
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
          color: yellow;
        }
      }
      .box-heart {
        text-align: center;
        display: flex;
        padding-top: 20px;
        flex-direction: column;
        justify-content: space-between;
        .fa-heart {
          font-size: 1.5em;
          color: rgb(255, 145, 145);
        }
      }
    }
  }
  .col-map {
    width: 40%;
    height: calc(100vh - 166px);
  }
}

@media screen and (min-width: 270px) and (max-width: 1325px) {
  .box {
    flex-direction: column-reverse;
    .col-map {
      width: 100%;
      height: calc(100vh - 166px);
    }
    .col-cards {
      width: 100%;
    }
    .col-heart {
      margin: 0 20px;
    }
  }
}

@media screen and (min-width: 270px) and (max-width: 991px) {
  .box {
    flex-direction: column-reverse;
    .col-map {
      width: 100%;
      height: calc(100vh - 166px);
    }
    .col-cards {
      width: 100%;
      margin: 0 20px;
    }
    .box-heart {
      margin-right: 35px;
    }
  }
}

@media screen and (min-width: 450px) and (max-width: 654px) {
  .box {
    flex-direction: column-reverse;
    .col-map {
      width: 100%;
      height: calc(100vh - 166px);
    }
    .col-cards {
      width: 100%;
      margin: 0 20px;
      .box-img {
        width: 50%;
        height: 50px;
        margin: 0 30px;
      }
      .box-text {
        display: none;
      }
      .box-heart {
        width: 50%;
      }
    }
  }
}

@media screen and (min-width: 270px) and (max-width: 449px) {
  .box {
    flex-direction: column-reverse;
    .col-map {
      width: 100%;
      height: calc(100vh - 166px);
    }
    .col-cards {
      width: 100%;
      .box-img {
        width: 100%;
        margin: 0 30px;
      }
      .box-text {
        display: none;
      }
      .box-heart {
        display: none;

        .fa-heart {
          display: none;
        }
        p {
          display: none;
        }
      }
    }
  }
}


</style>
