<template>
    <section class="container">
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
            // '&range=' +this.searchRange + '&meters=' + this.squareMeters
            // + '&bedNo=' + this.bedNo + '&roomNo=' + this.roomNo + '&bathNo=' + this.bathNo
            )
            .then((response)=>{
                console.warn(response.data.results)
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

<style scoped>

</style>
