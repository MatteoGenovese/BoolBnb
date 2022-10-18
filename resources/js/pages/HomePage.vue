<template>
    <section class="container-fluid">
        <Jumbotron @jumboSearch="$_getPosWithTomTom"/>
        <!-- <Jumbotron /> -->
    </section>
</template>

<script>
import Jumbotron from '../components/Home-Components/Jumbotron.vue';
// import axios from 'axios';

export default {
    name:"HomePage",
    components:{
        Jumbotron
    },
    data(){
        return{
            
        }
    },
    methods:{
        $_getPosWithTomTom(params){
            console.log(params)
        }
    }

}
</script>

<style>

</style>