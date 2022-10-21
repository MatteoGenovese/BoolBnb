<template>
    <div class="container mt-5">
        <div class="row">
            <div class="img-container col-12">
                <img v-for="photo in property.photos" :key="photo.id" :src="'/storage/' + photo.file_name"
                    :alt="property.title + ' cover Photo'">
            </div>
        </div>
        <div class="row mt-5">
            <div class="property-details col-9">
                <h2>
                    {{ property.title }}
                </h2>
                <h6 class="ps-3">
                    di {{ user }}
                </h6>
                <p class="mt-4">
                    {{ property.description }}
                </p>
            </div>
            <div class="col-3">
                <h5 class="ms-2">Servizi:</h5>
                <ul class="mt-1 list-group list-group-flush">
                    <li class="list-group-item" v-for="service in property.services" :key="service.id">{{ service.name
                    }}</li>
                </ul>
            </div>
            <div class="row mt-4 justify-content-center">
                <h4 class="d-flex justify-content-center">Caratteristiche:</h4>
                <div class="col-3 my-4 text-center"><img src="https://www.svgrepo.com/show/17785/bed.svg" alt=""
                        class="icon me-3"><span> Posti letto: {{ property.bed_no}}</span></div>
                <div class="col-3 my-4 text-center"><img src="https://www.svgrepo.com/show/15059/bathtub.svg" alt=""
                        class="icon me-3"><span>Bagni: {{ property.bathroom_no }}</span></div>
                <div class="col-3 my-4 text-center"><img src="https://www.svgrepo.com/show/48874/ruler.svg" alt=""
                        class="icon me-3"><span>Metri quadri: {{ property.square_meters }}</span></div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";
export default {
    props: {
        id: {
            type: [String, Number],
            required: true,
        },
    },
    data: function () {
        return {
            property: [],
            user: "",
        }
    },

    methods: {
        getPropertyData() {
            axios.get("/api/apartments/" + this.id).
                then(response => {
                    this.property = response.data.results.data;
                    this.user = this.property.user.surname + " " + this.property.user.name;
                })
                .catch(error => console.error(error.message))
        }
    },
    created() {
        this.getPropertyData();
    }
}
</script>

<style lang="scss" scoped>
div.img-container {
    width: 100%;
    max-height: 40vh;
    overflow: hidden;

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}

.icon {
    width: 1.5rem;
    filter: opacity(50%);
}
</style>
