<template>
    <section class="container">
        <Jumbotron />

        <SearchBar/>



    </section>
</template>


<script>






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
