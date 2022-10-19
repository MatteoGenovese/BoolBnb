<template>
  <section class="d-flex justify-content-start align-items-center" @click.self="$emit('openFilterPanel', false)">
    <div>
        <h2 class="mt-5 text-center">Filtri</h2>
        <div class="d-flex flex-column justify-content-evenly">

            <label for="room-no">Numero camere</label>
            <select name="room_no" id="room-no" v-model="roomNo">
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
            <label for="bed-no">Posti letto</label>
            <select name="bed_no" id="bed-no" v-model="bedNo">
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
        
            <div class="container my-3">
                <div class="row">

                    <div class="col-4" v-for="service in services" :key="service.id">
                        <input type="checkbox" :value="service.id" :name="service.name + '_check'" :id="service.name + '-check'" v-model="apartmentServices">
                        <label :for="service.name + '-check'">{{ service.name }}</label>
                    </div>
                </div>
            </div>

            <label for="search-range">Raggio di ricerca</label>
            <div class="d-flex align-items-center">
                <input type="range" name="search_range" id="search-range" default="20" min="10" max="1000" step="10" oninput="this.nextElementSibling.value = this.value" v-model="searchRange">
                <output class="ms-3">20 </output> <span class="ms-1"> km</span>
            </div>
            
            <button class="btn btn-lt btn-primary text-white" @click="sendFiltersData(), $emit('openFilterPanel', false)">Applica filtri</button>
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
            bathNo: 0,
            roomNo: 0,
            bedNo: 0,
            squareMeters: 0,
            searchRange: 20,
            apartmentServices: [],
        }
    },
    methods: {
        getServices() {
            axios.get("http://127.0.0.1:8000/api/services")
            .then((response) => {
                console.log(response.data.results);
                this.services = response.data.results;
            })
        },

        sendFiltersData() {
            this.$emit("sendFilters", {
                bathNo: this.bathNo,
                roomNo: this.roomNo,
                bedNo: this.bedNo,
                squareMeters: this.squareMeters,
                searchRange: this.searchRange,
                apartmentServices: this.apartmentServices
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
        height: 100vh;
        width: 100vw;
       

        &>div {
            width: 500px;
            height: 600px;
            background-color: white;
        }
    }
</style>