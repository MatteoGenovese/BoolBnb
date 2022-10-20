<template>
    <div>

        <div class="search-bar position-relative">


            <input
            type="text"
            placeholder="Inserisci l'indirizzo..."
            v-model="needle"
            @keyup="$_sendNeedleAfter500ms()"
            @keyup.enter="$_getAddressObject(0)" />



            <ul class="list-group position-absolute w-100 top-100 start-0"
                :class="newLetterWasTyped == true ? 'd-block' : 'd-none'" v-if="addresses.length > 0">
                <li v-for="(address, index) in addresses" :key="index"
                    @click="$_getAddressObject(index)"
                    class="list-group-item list-group-item-action">
                    {{ address.address.freeformAddress }}
                </li>
            </ul>


            <button @click="$_searchRedirect()">
                Search
            </button>

        </div>

    </div>

</template>

<script>
import axios from "axios";
export default {
    name: "SearchBar",
    props: {

    },
    watch: {
        lat(oldLat, newLat){
            if(newLat != oldLat){
                this.$_getApartment();
            }

        }
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
            addresses: [],
            timerBetweenTwoWords: false,
            newLetterWasTyped: true,
            addressSelected: {},
        }

    },

    methods: {
        $_searchRedirect(){
            if(this.$route.name == 'HomePage'){
                this.$router.push(
                    {
                        name: 'AdvancedSearch', params : { addressSelected : this.addressSelected, query : this.needle }
                    })
            }
            if(this.$route.name == 'AdvancedSearch'){
                this.$emit("sentDataFromDownLevel", this.addressSelected);
            }
        },

        $_sendDataToUpperLevel() {
            if (this.needle !== "") {
                this.$emit("sentDataFromDownLevel", { lat: this.addressSelected.position.lat, lon: this.addressSelected.position.lon });
            }
        },

        $_getAddressObject(index) {
            this.addressSelected=this.addresses[index];
            this.newLetterWasTyped = false;
            console.log(this.addresses[index])
            this.needle=this.addresses[index].address.freeformAddress
            this.$_searchRedirect()
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
                axios
                    .get(this.apiUrl + needle + '.json?key=' + this.apiKey, {
                        params: {
                            countrySet: this.country,
                            typeahead: this.typeahead,
                            limit: this.limit,
                        },
                    })
                    .then((response) => {
                        this.addresses = response.data.results;
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
