<template>
    <div class="box">
        <div class="card mb-4 p-1 border-0">
            <router-link
            :to="{
                name: 'app-details',
                params: { ann: ann.id } }">
            <div class="card-img mb-1">
                <img src="http://sun-surfer.com/photos/2012/03/Glass-house-Vilnius-Lithuania-400x400.jpg" alt="casa">
                <i class="fa-regular fa-heart"></i>
                <!-- <i class="fa-solid fa-heart"></i> -->
            </div>
            </router-link>
            <div class="text">
                <p class="mb-0 type">{{ announcementItem.house_type }} - {{ announcementItem.beds }} letti - {{ announcementItem.bathrooms }} bagni</p>
                <p class="mb-0 title">{{ announcementItem.title }}</p>
                <p class="mb-1 street">{{ shortifyContent(announcementItem.address) }}</p>
                <p class="mb-0 price">{{ announcementItem.price }} &euro;/ notte</p>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CardComp',
    data(){
        return{
            ann: null
        }
    },
    props:{
        announcementItem:Object,
    },
    methods:{
        shortifyContent(text){
            return text.substring(1, 30)+ '...';
        }
    },
    watch:{
        announcementItem: {
            immediate: true,
            handler(newVal, oldVal){
                this.ann = newVal;
            }
        }
    }
}
</script>
<style lang="scss" scoped >
.box{
    display: flex;
    flex-wrap: wrap;
    width: 320px;
    .card{
        background-color: whitesmoke;
        flex-shrink: 0;
        margin: 10px;
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        .card-img{
            padding: 15px 15px 0px 15px;
            img{
                height: 250px;
                max-width: 100% ;
                border-radius: 10px;
                box-shadow: 0px 5px 15px rgb(66, 66, 66);

            }
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
                color: rgb(255, 187, 0)
            }
        }
    }
}
</style>
