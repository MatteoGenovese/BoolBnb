<template>
    <section class="container">
        <Jumbotron />

        <SearchBar @sentDataFromDownLevel="$_getLatAndLon" />


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
        $_getLatAndLon(params){

            let { lat, lon } = params;

            this.lat = lat;
            this.lon = lon;

            console.log(this.lat + '-' + this.lon)
            this.$_getApartment()
        },

        $_getApartment(){
            axios.get('http://127.0.0.1:8000/api/apartments/search/' + this.lat + '&' + this.lon ,
            {params: {
                "range": this.searchRange,
                "bedNo": this.bedNo,
                "roomNo": this.roomNo,
                "services": this.services,
            }}
            // '&range=' +this.searchRange + '&meters=' + this.squareMeters
            // + '&bedNo=' + this.bedNo + '&roomNo=' + this.roomNo + '&bathNo=' + this.bathNo
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


}
</script>

<style scoped>

</style>
