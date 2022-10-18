<template>
    <section class="container">
        <Jumbotron @jumboSearch="$_getLatAndLon"/>

        <div class="row mt-5">
            <PostCard v-for="(house, index) in houses" :key="index"
                :house="house"
            />
        </div>
    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import axios from 'axios';


import PostCard from '../components/Home-Components/PostCard.vue';

export default {
    name:"HomePage",
    components:{
        Jumbotron,
        PostCard,
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
            houses: [],
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
            axios.get('http://127.0.0.1:8000/api/apartments/search/' + this.lat + '&' + this.lon )
            .then((response)=>{
                console.warn(response.data.results)
                this.houses = response.data.results;
            })
        }
    },
    

}
</script>

<style scoped>

</style>