<template>
    <div id="advancedSearch" class="container">
        <h1>Ricerca avanzata</h1>
        <SearchBar @sentDataFromDownLevel="$_getLatAndLon" />

        <FiltersComponent class="m-3" @sendFilters="$_getApartment" />


        <div v-if="isResearchDone==false">
            <h2>
                Comincia la tua ricerca!
            </h2>
        </div>

        <div v-else-if="isResearchDone==true && noApartmentFound === true">
            <h2>
                Nessun risultato.
            </h2>
        </div>

        <div class="row py-5" v-else-if="areCardLoaded == false">
            <PostCardLoader v-for="index in 4" :key="index"/>
        </div>

        <div class="row py-5" v-else>

            <PostCard v-for="apartment in apartmentsWithSponsor" :key="apartment.id" @click="scrollToTop()" :apartment="apartment" :sponsor="true" />

            <PostCard v-for="apartment in apartmentsWithoutSponsor" :key="apartment.id" @click="scrollToTop()" :apartment="apartment" :sponsor="false"/>
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

                this.$_getApartment({});
            }
        }
    },
    data(){
        return{
            lat: 0,
            lon: 0,
            apartmentsWithoutSponsor: [],
            apartmentsWithSponsor: [],
            isFilterPanelVisible: false,
            bedNo: 0,
            roomNo: 0,
            bedNo: 0,
            squareMeters: 0,
            searchRange: 20,
            services: [],
            noApartmentFound: false,
            areCardLoaded: null,
            isResearchDone: false,
        }
    },
    methods:{
        $_passLocation(){

            if(typeof(this.$route.params.addressSelected) != "undefined") {
                this.lat = this.addressSelected.position.lat;
                this.lon = this.addressSelected.position.lon;
                this.areCardLoaded= false,
                this.$_getApartment({})
            }

        },

        $_getLatAndLon(params){

            let { lat, lon } = params.position;

            this.lat = lat;
            this.lon = lon;

        },

        $_getApartment(params){
            this.areCardLoaded = false;



            axios.get('http://127.0.0.1:8000/api/apartments/search/' ,
                    {
                        params:{
                            lat: this.$route.query.lat,
                            lon: this.$route.query.lon,
                            services: this.$route.query.services,
                            bedNo:  this.$route.query.bedNo,
                            range: this.$route.query.range,
                            roomNo: this.$route.query.roomNo,
                        }
                    }
            ).then((response)=>{

                console.log(response.data.results);
                if(response.data.results.length == 0){

                    this.noApartmentFound = true;
                    this.apartmentsWithoutSponsor == [];
                    this.apartmentsWithSponsor == [];
                    this.areCardLoaded = true;
                }
                if(response.data.results == undefined){

                    this.noApartmentFound = true;
                    this.apartmentsWithoutSponsor == [];
                    this.apartmentsWithSponsor == [];
                    this.areCardLoaded = true;
                }
                else if(response.data.results.length > 0){
                    this.selectApartmentBySponsorship(response.data.results);
                    this.noApartmentFound = false;
                    this.areCardLoaded = true;

                }
                this.isResearchDone = true;
            })
        },
        scrollToTop() {
            window.scrollTo(0,0);
        },
        getFilterParams(params) {
            this.bathNo = params.bathNo;
            this.roomNo = params.roomNo;
            this.bedNo = params.bedNo,
            this.squareMeters = params.squareMeters;
            this.searchRange = params.searchRange;
            this.services = params.apartmentServices;
        },
        selectApartmentBySponsorship(apartments) {


            this.apartmentsWithSponsor=[]
            this.apartmentsWithoutSponsor=[]



            apartments.forEach(apartment => {

                if(apartment.sponsorships.length>0)
                {
                    if(new Date(apartment.sponsorships[apartment.sponsorships.length-1].pivot.expiration_date) > new Date)
                    {
                        this.apartmentsWithSponsor.push(apartment);
                    }
                    else{
                        this.apartmentsWithoutSponsor.push(apartment);
                    }
                }
                else
                {
                    this.apartmentsWithoutSponsor.push(apartment);
                }
            });
            console.warn(this.apartmentsWithSponsor);
            console.warn(this.apartmentsWithoutSponsor);

        },

        $_callWithUrl(){

            if(this.$route.params.query != undefined){



                console.log('dentro')

                axios.get('http://127.0.0.1:8000/api/apartments/search/' ,
                    {
                        params:{
                            lat: this.$route.query.lat,
                            lon: this.$route.query.lon,
                            services: this.$route.query.services,
                            bedNo:  this.$route.query.bedNo,
                            range: this.$route.query.range,
                            roomNo: this.$route.query.roomNo,
                        }
                    }
                )
                .then((response) =>{
                    console.log(response.data.results, 'response with url')

                })
                .catch((error)=>{
                    console.error(error)
                })

            }
        }
    },
    created(){
        this.$_passLocation();
        this.scrollToTop();

        this.$_callWithUrl();

    }

}
</script>

<style lang="scss" scoped>

    @import '../../sass/partials/_brandVariables.scss';

    #advancedSearch{
        font-family: $brandTxtFam-1;

        h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-block: 6rem;
        }
    }


</style>
