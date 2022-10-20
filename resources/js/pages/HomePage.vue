<template>
    <section class="container">
        <Jumbotron />

        <SearchBar/>


        <div class="row mt-5">
            <PostCard v-for="(apartment, index) in apartments" :key="index"
                :apartment="apartment"
            />
        </div>
    </section>
</template>


<script>



import axios from 'axios';


import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import PostCard from '../components/Home-Components/PostCard.vue';
import SearchBar from '../components/Home-Components/SearchBar.vue';

export default {
    name:"HomePage",
    components:{
    PostCard,
    SearchBar,
    Jumbotron
},
    watch:{

    },
    data(){
        return{
            lat: '',
            lon: '',
            apartments: [],
            isFilterPanelVisible: false,
            bedNo: 0,
            roomNo: 0,
            bedNo: 0,
            squareMeters: 0,
            searchRange: 20,
            services: [],
        }
    },
    methods:{

    },


}
</script>

<style scoped>

</style>
