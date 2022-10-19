<template>
    <div>

        <div class="search-bar position-relative">
            <input type="text" placeholder="Inserisci l'indirizzo nella nuovissima search..." v-model="needle"
                @keyup="$_sendNeedleAfter500ms()" />

            <ul class="list-group position-absolute w-100 top-100 start-0"
                :class="newLetterWasTyped == true ? 'd-block' : 'd-none'" v-if="adresses.length > 0">
                <li v-for="(address, index) in adresses" :key="index" @click="$_getCoordinatesFromAddressClicked(index)"
                    class="list-group-item list-group-item-action">
                    {{ address.address.freeformAddress }}
                </li>
            </ul>


            <button class="btn brand-btn-1 btn-lg" @click="$_sendDataToUpperLevel()">
                <router-link class="nav-link" :to=" '/ricerca-avanzata' " :coordinates="$_sendCoordinates()" :fromHomePage="true">
                    Search
                </router-link>
            </button>

        </div>

    </div>

</template>

<script>
import axios from "axios";
export default {
    name: "SearchBar",
    props: {
        latitude,
        longitude
    },
    data: function () {
        return {
            needle: "",
            apiUrl: "https://api.tomtom.com/search/2/search/",
            apiKey: "idKostWqefAIHb9WKcGcOklsshiC2KtN",
            country: "IT",
            typeahead: true,
            limit: 4,
            lat: "",
            lon: "",
            adresses: [],
            timerBetweenTwoWords: false,
            newLetterWasTyped: true,
        }

    },

    methods: {
        $_sendCoordinates() {
            let latitude=this.lat;
            let longitude=this.lat;
            return {latitude,longitude}
        },

        $_sendDataToUpperLevel() {
            if (this.needle !== "") {
                this.$emit("sentDataFromDownLevel", { lat: this.lat, lon: this.lon });
            }
        },

        $_getCoordinatesFromAddressClicked(index) {



            let { lat, lon } = this.adresses[index].position;
            this.lat = lat;
            this.lon = lon;
            console.log(this.lat + '-' + this.lon)

            this.newLetterWasTyped = false;

            this.$emit("sentDataFromDownLevel", { lat: this.lat, lon: this.lon });

            this.adresses = "";
        },
        $_sendNeedleAfter500ms() {
            this.newLetterWasTyped = true;
            clearTimeout(this.timerBetweenTwoWords);
            this.timerBetweenTwoWords = setTimeout(() => {
                this.$_getAddressFromApi(this.needle);
            }, 500);
        },
        $_getAddressFromApi(needle) {
            if (needle.length > 3) {
                // axios.get(this.apiUrl + needle + this.apiKey + this.country + this.typeahead + '&limit=' + this.limit)
                axios
                    .get(this.apiUrl + needle + '.json?key=' + this.apiKey, {
                        params: {
                            countrySet: this.country,
                            typeahead: this.typeahead,
                            limit: this.limit,
                        },
                    })
                    .then((response) => {
                        console.warn(response.data.results);

                        this.adresses = response.data.results;
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        },
    },
};
</script>

<style lang='scss' scoped>
#jumbotron {
    height: 450px;
}

.search-bar {
    width: 100%;
    max-width: 100%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    border-radius: 8px;
    padding: 10px 20px;
}

.search-bar input {
    background: transparent;
    flex: 1;
    border: 0;
    outline: none;
    padding: 10px 5px;
    font-size: 20px;
}

.z-index {
    z-index: 3;
}

@media (max-width: 767px) {
    img {
        padding-top: 10rem;
    }
}
</style>
