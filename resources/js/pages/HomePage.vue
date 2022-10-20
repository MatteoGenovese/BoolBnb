<template>
    <section class="container">
        <FiltersComponent v-if="isFilterPanelVisible" @openFilterPanel="showFilterPanel" @sendFilters="getFilterParams" />
        <Jumbotron @jumboSearch="$_getLatAndLon" @openFilterPanel="showFilterPanel"/>

        <div class="row mt-5">

            <router-link class=" apartment-card p-3 col-12 col-md-4 col-lg-4" v-for="(house, index) in houses" :key="index" :to="{ name: 'SingleHome', params: { id: house.id } }">
                <PostCard
                :house="house"
            />
            </router-link>

<!-- 
            <PostCard v-for="(house, index) in houses" :key="index"
                :house="house"
            /> -->
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
            bedNo: 0,
            roomNo: 0,
            bedNo: 0,
            squareMeters: 0,
            searchRange: 20,
            services: [],
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
            axios.get('http://127.0.0.1:8000/api/apartments/search/' + this.lat + '&' + this.lon ,
            {params: {
                "range": this.searchRange,
                "bedNo": this.bedNo,
                "roomNo": this.roomNo,
                "services": this.services,
            }}
            )
            .then((response)=>{
                console.log(response);
                console.warn(response.data.results);
                this.houses = response.data.results;
            })
        },

        showFilterPanel(value) {
            this.isFilterPanelVisible = value;
        },

        getFilterParams(params) {
            this.bathNo = params.bathNo;
            this.roomNo = params.roomNo;
            this.bedNo = params.bedNo,
            this.squareMeters = params.squareMeters;
            this.searchRange = params.searchRange;
            this.services = params.apartmentServices;
        }
    },


}
</script>

<style lang="scss" scoped>

.apartment-card {
    transition: all .3s;
    text-decoration: none;
    color: black;
    &:hover {
        transform: scale(1.1);
    }
    &:active {
        transform:scale(.95);
    }
}
</style>
