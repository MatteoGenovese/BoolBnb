<template>
    <div>
        <HeaderComponent />
        <!-- <MainComponent /> -->
        <router-view></router-view>
    </div>
    
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';

export default {
    name: "App",
    components: {
        HeaderComponent,
        MainComponent
    }
}
</script>

<style>

</style>