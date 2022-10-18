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
    watch:{
        lat(oldLat, newLat){
            if(newLat != oldLat){
                this.$_getApartment();
            }
        

        }
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

            console.log(this.lat + '-' + this.lon)
        },

        $_getApartment(){
            axios.get('http://127.0.0.1:8000/api/apartments/filtered/' + this.lat + '/' + this.lon + '/' + '1')
            .then((response)=>{
           
                console.warn(response.data)
            })
        }
    },
    

}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>