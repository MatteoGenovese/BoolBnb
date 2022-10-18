<template>
    <section class="container-fluid">
        <Jumbotron @jumboSearch="$_getLatAndLon"/>
    </section>
</template>

<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import axios from 'axios';

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

<style>

</style>