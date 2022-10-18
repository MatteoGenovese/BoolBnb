<template>
  <div class="text-center">
    <div class="row position-relative">
      <div class="col-md-8 col-sm-12 z-index">
        <div class="mt-5">
          <h1>Scopri un posto in cui ti piacerà vivere</h1>
        </div>
        <div class="search-bar position-relative">
      
            <input
                type="text"
                placeholder="Inserisci posizione"
                v-model="needle"
                @keyup="$_getNeedle()" />
            
                <ul class="list-group position-absolute w-100 top-100 start-0" :class="isClicked == true ? 'd-block' : 'd-none'" v-if="houses.length > 0">
                    <li v-for="(house, index) in houses" :key="index" @click="$_getSelectedCall(index)"
                        class="list-group-item list-group-item-action">
                        
                        {{ house.address.freeformAddress }}

                    </li>
                </ul>
            

            <button class="btn brand-btn-1 btn-lg">
                Cerca
            </button>
        
        </div>
        <p>Cerca tra migliaia di inserzioni</p>
      </div>
      <div class="col-md-6 col-sm-12 position-absolute top-0 end-0">
        <img
          class="w-100"
          src="https://www.oknoplast.it/blog/wp-content/uploads/2017/12/Caricatura-del-trasloco-con-il-bambino-che-trasporta-i-pacchi-con-il-triciclo.jpg"
          alt=""
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "Jumbotron",
  data: function () {
    return {
        needle: '',
        apiUrl: 'https://api.tomtom.com/search/2/search/',
        apiKey: '.json?key=idKostWqefAIHb9WKcGcOklsshiC2KtN',
        country: 'IT',
        typeahead: true,
        limit: 4,
        lat: '',
        lon: '',
        houses: [],
        isSearching: null,
        isClicked: true,
    };
  },
  // ricerca nel jumbo, suggeriti come abbiam fatto in php con il keyup

  // altra funzione, all'invio, dopo che l'utente ha selezionato la ricerca corretta,
  // emittiamo all'invio e con la pressione del pulsante { lon: parametro, lat: parametro } scelti

  // $_sendJumbotronSearch(){
  //     if(this.needle !== ''){
  //         this.$emit('jumboSearch', this.needle.trim() );
  //     }
  // }
  methods: {
    $_getSelectedCall(i){
        console.log(i)
        let { lat, lon } = this.houses[i].position;
        this.lat = lat;
        this.lon = lon;

        this.isClicked = false;

        this.houses = '';
    },
    $_getNeedle(){
        this.isClicked = true;
        clearTimeout(this.isSearching);
        this.isSearching = setTimeout(() => {
            this.$_getHouseTomTom(this.needle);
        }, 500);
    },
    $_getHouseTomTom(needle) {
      if (needle.length > 3) {
        // axios.get(this.apiUrl + needle + this.apiKey + this.country + this.typeahead + '&limit=' + this.limit)
        axios.get(this.apiUrl + needle + this.apiKey, {
            params: {
              countrySet: this.country,
              typeahead: this.typeahead,
              limit: this.limit,
            },
          })
          .then((response) => {
            console.warn(response.data.results);
            
            this.houses = response.data.results;
            // let { lat, lon } = response.data.results[0].position;
            // this.lat = lat;
            // this.lon = lon;
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