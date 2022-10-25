<template>
    <div id="propertyOverview" class="container mt-5 brand-ft-1">
        <ContactWarnComponent v-if="warnMessage"/>
        <div class="row" tabindex="1">
            <div class="img-container position-relative col-10 m-auto">
                <div v-if="sponsorApplied==true" class=" position-absolute star text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </div>
                <img class="rounded img-fluid w-100"
                v-for="photo in property.photos" :key="photo.id" :src="'/storage/' + photo.file_name"
                    :alt="property.title + ' cover Photo'">
            </div>
            <div class="col-12">
                <h3 class="my-3 mt-5 text-capitalize">
                    {{ property.title }}
                </h3>
                <h5>
                    {{ property.address }}
                </h5>

                <ul class="icons-field my-3 p-0">
                    <li>
                        <img src="https://www.svgrepo.com/show/17785/bed.svg" alt="Icona letto">
                        <span>{{ property.bed_no }}</span>
                        <span>/</span>
                    </li>
                    <li>
                        <img src="https://www.svgrepo.com/show/15059/bathtub.svg" alt="Icona bagno">
                        <span>{{ property.bathroom_no }}</span>
                        <span>/</span>
                    </li>
                    <li>
                        <img src="https://www.svgrepo.com/show/48874/ruler.svg" alt="Icona metri quadrati">
                        <span>{{ property.square_meters }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Central body  -->
        <div class="row">

            <!-- Left side -->
            <div class="col-12 col-lg-8" tabindex="2">
                <nav id="propertyNav" class="col-12 my-5">

                        <ul id="detailsNavBar" class="row mb-5 p-1 rounded-1 d-flex justify-content-around">
                            <li class="col-3 p-0 p-sm-2 py-2 rounded btn brand-btn-outline-1"
                                v-for="(infos, index) in propertyOverviewNav" :key="index"
                                :class="{ 'bg-brand-prime-active-effect' : infos.isActive }"
                                @click="$_activeNavOnClick(index)">

                                {{ infos.name }}

                            </li>
                        </ul>

                        <!-- Description section -->
                        <div class="row text-start" v-show="$_isActiveCheck(0)">
                            <h4 class="col-12 fw-bold">
                                Dettagli dell'abitazione
                            </h4>

                            <div class="row col-12 col-md-5">
                                <div class="col-6 fw-bold">
                                    Numero bagni:
                                </div>

                                <div class="col-6">
                                    {{ property.bathroom_no }}
                                </div>

                                <div class="col-6 fw-bold">
                                    Numero stanze:
                                </div>

                                <div class="col-6">
                                    {{ property.room_no }}
                                </div>

                            </div>

                            <div class="row col-12 col-md-5">

                                <div class="col-6 fw-bold">
                                    Numero letti:
                                </div>

                                <div class="col-6">
                                    {{ property.bed_no }}
                                </div>

                                <div class="col-6 fw-bold">
                                    Metri Quadrati:
                                </div>

                                <div class="col-6">
                                    {{ property.square_meters }}
                                </div>

                                </div>

                                <hr class="my-4 col-8">

                                <div class="col-12">
                                    <h4 class="fw-bold">
                                        Descrizione
                                    </h4>
                                    {{ property.description }}
                                </div>
                            </div>



                        <!-- Services section -->
                        <div class="row col-md-5 text-start" v-show="$_isActiveCheck(1)">
                            <h4 class="col-12 fw-bold">
                                I servizi inclusi nell'abitazione:
                            </h4>
                            <div class="col-6" v-for="service in property.services" :key="service.id">
                                {{ service.name }}
                            </div>
                        </div>

                        <!-- Map section -->
                        <div id="mapSection" class="row" v-show="$_isActiveCheck(2)">
                            <div class="col-8 m-auto text-center">
                                Zoom:
                            </div>

                            <div class="col-8 m-auto d-flex justify-content-center mb-3 gap-5">
                                <button class="btn brand-btn-outline-1 rounded-pill" @click="$_mapZoomIn()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                </button>

                                <button class="btn brand-btn-outline-1 rounded-pill" @click="$_mapZoomOut()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                    </svg>

                                </button>
                            </div>

                            <div class="col-12">
                                <img :src="propertyLocationImg" :alt="'mappa di ' + property.title">
                            </div>
                        </div>
                </nav>

                <!-- Owner info -->
                <div class="row py-5" tabindex="3">
                    <hr class="my-4">

                    <div class="col-12 col-md-8">

                        <h4>
                            Informazioni sul proprietario:
                        </h4>
                        <h5>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                            </span>
                            <span>
                                {{ ownerInfo.name }} {{ ownerInfo.surname }}
                            </span>
                        </h5>
                        <p class="text-secondary">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                            </span>
                            <span>
                                {{ ownerInfo.email }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <ContactForm :apartment="property" @messageSent="showWarn"/>

        </div>

    </div>
</template>

<script>

import axios from "axios";
import ContactForm from "../components/ContactForm.vue"
import ContactWarnComponent from "../components/ContactWarnComponent.vue";

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
            sponsorApplied: false,
            show: false,
            isActive: false,
            warnMessage: false,
            currentActive: 0,
            ownerInfo: "",
            apiKey: "idKostWqefAIHb9WKcGcOklsshiC2KtN",
            propertyLocationImg: "",
            lat: "",
            lon: "",
            mapZoomIndex: 16,
            propertyOverviewNav: [
                {
                    name: "Descrizione",
                    isActive: true,
                },
                {
                    name: "Servizi",
                    isActive: false,
                },
                {
                    name: "Mappa",
                    isActive: false,
                },
            ],
        };
    },
    methods: {

        showWarn(value) {
            this.warnMessage = value;
            setTimeout(() => this.warnMessage = !this.warnMessage, 2000);
        },

        $_addNewVisual() {
                // console.warn(id);
                axios.post(`http://127.0.0.1:8000/api/visuals/${this.id}`)
                .then((response) => {
                    this.post = response;

                    console.log(this.post);

                    this.selectApartmentBySponsorship(response.data.result);


                    console.warn(this.post)
                }).catch((error) => {
                    console.error(error)
                })
        },
        $_mapZoomIn() {
            if (this.mapZoomIndex !== 20) {
                this.mapZoomIndex = this.mapZoomIndex + 1;
                this.$_getTomTomPrintedMap(this.$_coordinatesConverter(this.lat, this.lon, this.mapZoomIndex));
            }
        },
        selectApartmentBySponsorship(apartment) {

                if(apartment.sponsorships.length>0)
                {
                    if(new Date(apartment.sponsorships[apartment.sponsorships.length-1].pivot.expiration_date) > new Date)
                    {
                        this.sponsorApplied=true;
                    }
                    else{
                        this.sponsorApplied=false;
                    }
                }
                else
                {
                    this.sponsorApplied=false;
                }

    },
        $_mapZoomOut() {
            if (this.mapZoomIndex !== 10) {
                this.mapZoomIndex = this.mapZoomIndex - 1;
                this.$_getTomTomPrintedMap(this.$_coordinatesConverter(this.lat, this.lon, this.mapZoomIndex));
            }
        },
        /**
         * Return a converted string corresponding to the tile's
         * position on the TomTom API grid for that zoom level.
         *
         * @param Float lat
         * @param Float lon
         * @param Int zoomLevel =  default 16
         *
         * @return String z/x/y
         */
        $_coordinatesConverter(lat, lon, zoomLevel = 16) {
            let z = Math.trunc(zoomLevel);
            let xyTilesCount = Math.pow(2, z);
            let x = Math.trunc(Math.floor((lon + 180) / 360 * xyTilesCount));
            let y = Math.trunc(Math.floor((1 - Math.log(Math.tan(lat * Math.PI / 180) + 1 / Math.cos(lat * Math.PI / 180)) / Math.PI) / 2 * xyTilesCount));
            return z.toString() + "/" + x.toString() + "/" + y.toString();
        },
        $_getTomTomPrintedMap(parsedQuery) {
            axios.get("https://api.tomtom.com/map/1/tile/basic/main/" + parsedQuery + ".png?", { params: {
                    tileSize: 512,
                    view: "Unified",
                    language: "IT",
                    key: this.apiKey
                } })
                .then((response) => {
                this.propertyLocationImg = response.request.responseURL;
            })
                .catch((error) => {
                console.error(error);
            });
        },
        $_activeNavOnClick(index) {
            this.propertyOverviewNav.forEach((item) => {
                item.isActive = false;
            });
            this.currentActive = index;
            this.propertyOverviewNav[index].isActive = true;
        },
        $_isActiveCheck(index) {
            if (this.currentActive === index) {
                return true;
            }
            return false;
        },
        $_getPropertyData() {
            axios
                .get("/api/apartments/" + this.id)
                .then((response) => {
                this.property = response.data.results.data;
                this.ownerInfo = this.property.user;
                // console.log(response.data.results.data);
                this.selectApartmentBySponsorship(response.data.results.data);
                this.lat = response.data.results.data.latitude;
                this.lon = response.data.results.data.longitude;
                this.$_getTomTomPrintedMap(this.$_coordinatesConverter(this.lat, this.lon, this.mapZoomIndex));
            })
                .catch((error) => console.error(error.message));
        },
    },
    created() {
        this.$_getPropertyData();
        this.$_addNewVisual();
    },
    components: { ContactForm, ContactWarnComponent }
}
</script>

<style lang="scss" scoped>

@import '../../sass/partials/_brandVariables';
@import '../../sass/partials/_classes';

#propertyOverview {

    .star{
        left: 20px;
        display: inline-block;
        padding: 10px;
        background: rgb(184, 0, 0);
        clip-path: polygon(100% 0%, 0% 0%, 0% 100%, 50% 63%, 100% 100%);

        svg{
            transform: translateY(-7px);
            color: white;

        }

    }

    ul#detailsNavBar{
        background-color: rgba($tertiaryLight,.1);

        li{
            box-shadow: -2px 2px 11px -2px rgba(0,0,0,0.29);
            -webkit-box-shadow: -2px 2px 11px -2px rgba(0,0,0,0.29);
            -moz-box-shadow: -2px 2px 11px -2px rgba(0,0,0,0.29);
        }
    }

    ul.icons-field{
        margin-left: .5rem;
        list-style: none;
        display: inline-block;

        li{
            font-size: 1.2rem;
            display: inline-block;
            img{
                width: 2rem;
                filter: opacity(50%);
            }
            span{
                color: gray;
                margin: 0 .8rem;
            }
        }

        #propertyNav {
            margin: 3rem 0;
            ul {
            list-style: none;

                li {
                    text-align: center;
                    display: inline-block;
                }
            }
        }
    }

    #mapSection{
        img{
            display: block;
            margin: 0 auto;
            @media screen and (max-width: 550px){
                max-width: 300px;
            }
        }
    }
}

</style>
