<template>
    <div class="col-12 col-sm-6 col-lg-4 col-xl-2 mx-sm-0 mx-xl-3 card mb-4 p-2">

        <div class="card-img mb-1">
            <i class="fa-regular fa-heart"></i>
            <!-- <i class="fa-solid fa-heart"></i> -->
        </div>
        <div class="text">
            <p class="mb-0 type">{{ announcementItem.house_type }} - {{ announcementItem.beds }} letti - {{ announcementItem.bathrooms }} bagni</p>
            <p class="mb-0 title">{{ announcementItem.title }}</p>
            <p class="mb-1 street">{{ shortifyContent(announcementItem.address) }}</p>
            <p class="mb-0 price">{{ announcementItem.price }} &euro;/ notte</p>
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

    methods:{
        shortifyContent(text){
            return text.substring(1, 30)+ '...';
        }
    }
}
</script>

<style lang="scss" scoped >

.card{
    background-color: #ede6e3;
    width: 350px;
    margin: 20px;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    .card-img{
        height: 250px;
        width: 318px;
        margin: 15px;
        border-radius: 10px;
        background-image: url(http://sun-surfer.com/photos/2012/03/Glass-house-Vilnius-Lithuania-400x400.jpg);
        .fa-regular{
            position: absolute;
            font-size: 1.1rem;
            right: 25px;
            top: 25px;
        }
    }
    .text{
        text-align: left;
        position: relative;
        margin: 15px;
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
