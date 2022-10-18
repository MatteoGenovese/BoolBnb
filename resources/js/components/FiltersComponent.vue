<template>
  <section class="d-flex justify-content-center align-items-center" @click.self="$emit('openFilterPanel', false)">
    <div>
        <a href="#" @click="$emit('openFilterPanel', false)">X</a>
        <h2 class="mt-5 text-center">Filtri</h2>
        <div class="d-flex flex-column justify-content-evenly align-items-center">

            <label for="bath-no">Numero Bagni</label>
            <select name="bath_no" id="bath-no">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="bath-no">Numero camere</label>
            <select name="bath_no" id="bath-no">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="bath-no">Posti letto</label>
            <select name="bath_no" id="bath-no">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="square-meters">Metri quadri</label>
            <input type="number" name="square_meters" id="square-meters">
            <div class="container my-3">
                <div class="row">

                    <div class="col-4" v-for="service in services" :key="service.id">
                        <input type="checkbox" :name="service.name + '_check'" :id="service.name + '-check'">
                        <label :for="service.name + '-check'">{{ service.name }}</label>
                    </div>
                </div>
            </div>

            <label for="search-range">Raggio di ricerca</label>
            <div class="d-flex align-items-center">
                <input type="range" name="search_range" id="search-range" default="20" min="10" max="1000" step="10" oninput="this.nextElementSibling.value = this.value">
                <output class="ms-3">20 </output> <span class="ms-1"> km</span>
            </div>
            
            <button class="btn btn-lt btn-primary text-white" @click="$emit('openFilterPanel', false)">Applica filtri</button>
        </div>
    </div>

  </section>
</template>

<script>
import axios from "axios";
export default {
    name: "FiltersComponent",

    data: function() {
        return {
            services: [],
        }
    },
    methods: {
        getServices() {
            axios.get("http://127.0.0.1:8000/api/services")
            .then((response) => {
                console.log(response.data.results);
                this.services = response.data.results;
            })
        }
    },
    created() {
        this.getServices();
    }
}
</script>

<style lang="scss" scoped>
    section {
        position: absolute;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100vw;
        background-color: rgba(0,0,0,.4);
        z-index: 10;

        &>div {
            width: 500px;
            height: 600px;
            background-color: white;
            position: relative;
            z-index: 3;

            a {
                color: red;
                text-decoration: none;
                font-weight: bolder;
                position: absolute;
                top: 1rem;
                right: 1.5rem;
            }
        }
    }
</style>