<template>
    <section class="container position-relative">

        <Jumbotron />

        <CitiesSuggestions />

    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import CitiesSuggestions from '../components/Home-Components/CitiesSuggestions.vue';

export default {
    name:"HomePage",
    components:{
    Jumbotron,
    CitiesSuggestions,
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
