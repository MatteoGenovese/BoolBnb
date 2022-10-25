<template>
    <div>
        <HeaderComponent />
        <!-- <MainComponent /> -->
        
        <router-view >

            <!-- :key="$route.fullPath" -->



        </router-view>
        <FooterComponent />
    </div>

</template>

<script>
import FooterComponent from '../components/FooterComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';

export default {
    name: "App",
    components: {
        HeaderComponent,
        MainComponent,
        FooterComponent
    }
}
</script>

<style>

</style>
