<template>
    <section class="container-fluid p-0 position-relative">

        <Jumbotron />

        <CitiesSuggestions />

        <DbCountSection />

    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import CitiesSuggestions from '../components/Home-Components/CitiesSuggestions.vue';
import DbCountSection from '../components/Home-Components/DbCountSection.vue';

export default {
    name:"HomePage",
    components:{
    Jumbotron,
    CitiesSuggestions,
    DbCountSection,
},
    watch:{

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
