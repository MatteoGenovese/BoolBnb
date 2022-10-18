<template>
    <section class="container-fluid">
        <Jumbotron @jumboSearch="$_getLatAndLon"/>
    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import axios from 'axios';


import PostCard from '../components/Home-Components/PostCard.vue';

export default {
    name:"HomePage",
    components:{
        Jumbotron
    },
    data(){
        return{
            lat: '',
            lon: '',
        }
    },
    methods:{
        $_getLatAndLon(params){

            let { lat, lon } = params;

            this.lat = lat;
            this.lon = lon;
        },
        
    }

}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>