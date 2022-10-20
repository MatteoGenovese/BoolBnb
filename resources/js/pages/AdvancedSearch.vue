<template>
    <div class="container">
        <h1>Ricerca avanzata</h1>
        <FiltersComponent @sendFilters="$_getApartment" />

        <SearchBar @sentDataFromDownLevel="$_getLatAndLon"
        />

        <!-- <div class="row mt-5">
            <PostCard v-for="(apartment, index) in apartments" :key="index" :apartment="apartment" />
        </div> -->

        <div class="row mt-5">

        <router-link
        class=" apartment-card p-3 col-12 col-md-4 col-lg-4"
        v-for="(apartment, index) in apartments"
        :key="index"
        :to="{ name: 'SingleHome', params: { id: apartment.id } }">
            <PostCard
            :apartment="apartment"
        />
        </router-link>

</div>
    </div>
</template>

<script>

import axios from 'axios';


import SearchBar from '../components/Home-Components/SearchBar.vue';
import PostCard from '../components/Home-Components/PostCard.vue';
import FiltersComponent from "../components/FiltersComponent.vue"
export default {
    name: "AdvancedSearch",
    props: {
        addressSelected:{
            type:Object,
        }
    },
    components: {
        FiltersComponent,
        PostCard,
        SearchBar,
    },
    watch:{
        lat(oldLat, newLat){
            if(newLat != oldLat){
                this.$_getApartment({});
            }

        }
    },
    data(){
        return{
            lat: 0,
            lon: 0,
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
        $_passLocation(){

            console.log(this.$route.params.addressSelected)

        if(typeof(this.$route.params.addressSelected) != "undefined") {
            this.lat = this.addressSelected.position.lat;
            this.lon = this.addressSelected.position.lon;}
            // this.lat = 41.892631654408675;
            // this.lon = 12.4920935864514;
        // } else {
        // }
        // if(this.lat != 0 && this.lon != 0)
        console.log(this.lat, this.lon)

        this.$_getApartment({})



        },
        $_getLatAndLon(params){

            let { lat, lon } = params.position;

            this.lat = lat;
            this.lon = lon;

        },

        $_getApartment(params){

            console.log(params.bedNo, 'letti')

            axios.get('http://127.0.0.1:8000/api/apartments/search/' + this.lat + '&' + this.lon , { params: {
                range: params.range,
                bedNo: params.bedNo,
                roomNo: params.roomNo,
                services: params.services,
            }
            }
            )
            .then((response)=>{
                console.warn(response.data.results)
                this.apartments = response.data.results;
            })
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
    created(){
        this.$_passLocation()
    }

}
</script>

<style lang="scss">

</style>
