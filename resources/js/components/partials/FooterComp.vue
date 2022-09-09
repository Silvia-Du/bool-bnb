<template>
  <footer class="d-flex px-lg-5">
        <div class="foot-left  px-lg-5 col-6">
            <p><i class="fa-regular fa-copyright"></i> 2022 BoolBnB made with <i class="fa-solid fa-heart"></i> (and a bit of pain) by Team-6.</p>
        </div>
        <div class="foot-right px-lg-5 col-6">
            <p class="eur">
                <i class="fa-solid fa-earth-europe"></i>
                Italiano(IT)
                <span> <i class="fa-solid fa-euro-sign"></i>
                EUR </span>
            </p>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterComp'
}
</script>

<style lang="scss" scoped>
    footer{
        justify-content: space-between;
        align-content: center;
        margin-top: 25px ;
        overflow: hidden ;
        color: gray;
        .foot-right{
            display: flex;
            flex-direction: row-reverse;
            p{
                font-size: 0.8em;
                span{
                    margin-left: 20px;
                }
            }
        }
        .foot-left{
            p{
                font-size: 0.8em;
            }
        }
    }
    </style>
