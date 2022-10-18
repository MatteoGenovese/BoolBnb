<template>
    <section class="container">
        <FiltersComponent v-if="isFilterPanelVisible" @openFilterPanel="showFilterPanel"/>
        <Jumbotron @jumboSearch="$_getLatAndLon" @openFilterPanel="showFilterPanel"/>

        <div class="row mt-5">
            <PostCard v-for="(house, index) in houses" :key="index"
                :house="house"
            />
        </div>
    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import FiltersComponent from "../components/FiltersComponent.vue"

import axios from 'axios';


import PostCard from '../components/Home-Components/PostCard.vue';

export default {
    name:"HomePage",
    components:{
        Jumbotron,
        FiltersComponent,
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
            isFilterPanelVisible: false,
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
        },

        showFilterPanel(value) {
            this.isFilterPanelVisible = value;
        }
    },
    

}
</script>

<style scoped>

</style>