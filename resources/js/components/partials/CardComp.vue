<template>

    <div class="box">
                <router-link

                :to="{
                    name: 'app-details',
                    params: { ann: ann.id }
                }">
        <div

        @click="getIp(announcementItem.id)"
        class="card mb-4 p-1 border-0">
            <div class="card-img mb-1 hover-shine">
                <!-- <figure> -->
                    <img v-if="announcementItem.image" :src="getImage(announcementItem.image)" :alt="announcementItem.title">
                    <!-- <img src="http://sun-surfer.com/photos/2012/03/Glass-house-Vilnius-Lithuania-400x400.jpg" alt="casa"> -->
                <!-- </figure> -->
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
            </router-link>
    </div>
</template>
<script>
export default {
    name: 'CardComp',
    data(){
        return {
      ipUser: null,
      apiUrl: 'http://127.0.0.1:8000/api/announcements/visualization'
    };
    },
    props:{
        announcementItem:Object,
    },
    methods:{

        shortifyContent(text){
            return text.substring(1, 30)+ '...';
        },

        getIp(data){

            axios.get('https://ipgeolocation.abstractapi.com/v1/?api_key=e30e687407b64f74a8fa7d83dfa28bc4')
                .then(res => {
                    this.ipUser = res.data.ip_address;
                    // console.log(res.data.ip_address);
                    axios.post(this.apiUrl,{
                                    params:{
                                        'ip_address': this.ipUser,
                                        'ann_id': this.announcementItem.id,
                                    }
                    })
                    .then(response =>{
                        // console.log(response, 'response');
                    })
            });


        },

        getImage(img){
            return  /storage/ + img
        }

},
    watch:{
        announcementItem: {
            immediate: true,
            handler(newVal, oldVal){
                this.ann = newVal;
            }
        }
    },
    mounted() {
        console.log(this.announcementItem);
    },
}
</script>
<style lang="scss" scoped >
.box{
    a{
                color: rgb(65, 64, 64);
                    &:hover{
                        text-decoration: none;
                    }
            }
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

    /* Hover Shine Effect */
    .hover-shine figure {
        position: relative;
    }

    .hover-shine figure::before {
        position: absolute;
        top: 0;
        left: -75%;
        z-index: 2;
        display: block;
        content: '';
        width: 50%;
        height: 100%;
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
        -webkit-transform: skewX(-25deg);
        transform: skewX(-25deg);
    }

    .hover-shine figure:hover::before {
        -webkit-animation: shine 1.2s;
        animation: shine 1.2s;
    }

    @-webkit-keyframes shine {
        100% {
            left: 125%;
        }
    }

    @keyframes shine {
        100% {
            left: 125%;
        }
    }

}

</style>
