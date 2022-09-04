
<template>
  <div class="px-lg-5">
    <div class="box d-flex">
      <div class="col-cards px-lg-5">
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
            <p class="prezzo">360€/notte</p>
          </div>
        </div>

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
            <!-- <i class="fa-solid fa-heart"></i> -->
            <i class="fa-regular fa-heart"></i>
            <p>360€/notte</p>
          </div>
        </div>

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
            <!-- <i class="fa-solid fa-heart"></i> -->
            <i class="fa-regular fa-heart"></i>
            <p>360€/notte</p>
          </div>
        </div>
      </div>

      <div class="col-map debug">
        <div class="map"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdvancedComp",
};
</script>

<style lang='scss' scoped>
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