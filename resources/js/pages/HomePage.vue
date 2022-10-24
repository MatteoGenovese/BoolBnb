<template>
    <section class="container position-relative">
        <Jumbotron />

        <div class="search-bar-container">
            <SearchBar/>
        </div>

        <CitiesSuggestions />

    </section>
</template>


<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
import SearchBar from '../components/Home-Components/SearchBar.vue';
import CitiesSuggestions from '../components/Home-Components/CitiesSuggestions.vue';

export default {
    name:"HomePage",
    components:{
    SearchBar,
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
    methods:{

    },


}
</script>

<style lang="scss" scoped>

.search-bar-container {
    position: absolute;
    width: 60%;
    top: 15rem;
    left: 0;
    z-index: 10;
}

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
