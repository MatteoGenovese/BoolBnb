<template>
    <div id="advancedSearch" class="container">
        <h1>Ricerca avanzata</h1>
        <SearchBar @sentDataFromDownLevel="$_getLatAndLon" />

        <FiltersComponent class="m-3" @sendFilters="$_getApartment" />


        <div v-if="apartments === ''">
            <h5>
                Comincia la tua ricerca!
            </h5>
        </div>
        <div v-else-if="apartments === undefined || noApartmentFound === true">
            <h5>
                Nessun risultato.
            </h5>
        </div>
        <div class="row py-5" v-else-if="areCardLoaded === true">
            <PostCardLoader v-for="index in 4" :key="index"/>
        </div>
        <div class="row py-5" v-else>
            <PostCard v-for="apartment in apartments" :key="apartment.id" :apartment="apartment" />
        </div>
        
    </div>
</template>

<script>

import axios from 'axios';


import SearchBar from '../components/Home-Components/SearchBar.vue';
import PostCard from '../components/advancedSearch-components/PostCard.vue';
import PostCardLoader from '../components/advancedSearch-components/PostCardLoader.vue';
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
        PostCardLoader,
    },
    watch:{
        lat(oldLat, newLat){
            if(newLat != oldLat){
                this.areCardLoaded = true;
                this.$_getApartment({});
            }
        }
    },
    data(){
        return{
            lat: 0,
            lon: 0,
            apartments: '',
            isFilterPanelVisible: false,
            bedNo: 0,
            roomNo: 0,
            bedNo: 0,
            squareMeters: 0,
            searchRange: 20,
            services: [],
            noApartmentFound: false,
            areCardLoaded: null,
        }
    },
    methods:{
        $_passLocation(){

            if(typeof(this.$route.params.addressSelected) != "undefined") {
                this.lat = this.addressSelected.position.lat;
                this.lon = this.addressSelected.position.lon;
                this.$_getApartment({})
            }

        },

        $_getLatAndLon(params){

            let { lat, lon } = params.position;

            this.lat = lat;
            this.lon = lon;

        },

        $_getApartment(params){

            axios.get('http://127.0.0.1:8000/api/apartments/search/' + this.lat + '&' + this.lon , { params: {
                range: params.range,
                bedNo: params.bedNo,
                roomNo: params.roomNo,
                services: params.services,
            }}
            ).then((response)=>{
                console.warn(response.data.results, 'results')
                this.apartments = response.data.results;

                if(response.data.results.length === 0){
                    this.noApartmentFound = true;
                }else{
                    this.noApartmentFound = false;
                }

                this.areCardLoaded = false;
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

<style lang="scss" scoped>

    @import '../../sass/partials/_brandVariables.scss';

    #advancedSearch{
        font-family: $brandTxtFam-1;
    }

</style>
