<template>
    <section class="container">
        <div id="jumbotron" class="row my-3 position-relative">

            <div class="title-wrapper col-12 col-lg-6 py-5">
                <h1 class="w-75">Scopri il posto in cui ti piacerà vivere</h1>
                <p>Cerca tra migliaia di inserzioni</p>
                <SearchBar/>
            </div>

            <div class="img-wrapper col-12 col-lg-6">
                <img :src="'/storage/asset/img/jumbophoto.avif'" alt="" class="img-fluid d-block d-lg-none">
            </div>
        </div>
    </section>
</template>

<script>
import SearchBar from './SearchBar.vue';
export default {
    name: "Jumbotron",
    components:{
        SearchBar,
    },
    data: function () {
        return {
        };
    },

    methods: {
}
};
</script>

<style lang='scss' scoped>
    #jumbotron {
        background-repeat: no-repeat;
        background-position: right;
        background-size: contain;

        .title-wrapper{
            z-index: 1;
        }

        .search-bar-container {
            position: absolute;
            width: 100%;
            top: 12rem;
            left: 3rem;
            z-index: 2;
        }

        .img-wrapper{
            @media screen and (min-width: 992px) {
                // background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');
                background-size: cover;
                background-image: url('/storage/asset/img/jumbophoto.avif');
                background-position: center;
            }
        }
    }
</style>
