<template>
    <div class="col-12 col-sm-6 col-lg-4 col-xl-2 card debug mx-xl-1 mb-4 p-2">
        <div class="img debug mb-1">
            <i class="fa-regular fa-heart"></i>
            <!-- <i class="fa-solid fa-heart"></i> -->
        </div>
        <div class="text">
            <p class="mb-0 type">House Type - tot letti</p>
            <p class="mb-0 title">Titolo dell'annuncio</p>
            <p class="mb-0 street">Street name, country</p>
            <p class="mb-0 price">Price &euro;/ notte</p>
            <i class="fa-solid fa-star"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CardComp',
    data(){
        return{

        }
    },

    props:{
        announcementItem:Object,
    },
}
</script>

<style lang="scss" scoped >
.card{
    z-index: 56;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    .img{
        height: 240px;
        border-radius: 10px;
        .fa-regular{
            position: absolute;
            font-size: 1.1rem;
            right: 18px;
            top: 18px;
        }
    }
    .text{
        position: relative;
        .type,
        .title{
            font-size: 0.85rem;
            font-weight: bold;
        }
        .street{
            font-size: 0.7rem;
            color: rgb(65, 64, 64);
        }
        .price{
            font-size: 0.95rem;
            font-weight: bold;
        }
        .fa-star{
            position: absolute;
            right: 5px;
            top: 1px;
        }
    }
}

</style>
