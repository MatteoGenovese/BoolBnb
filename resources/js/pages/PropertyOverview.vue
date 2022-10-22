<template>
    <div id="propertyOverview" class="container mt-5 brand-ft-1">
        <div class="row">
            <div class="img-container col-10 m-auto">
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

        <nav id="propertyNav">
            <div class="container-fluid my-5">
                <ul id="detailsNavBar" class="row col-12 col-md-8 p-0 mb-5 p-1 rounded-1">
                    <li class="col-3 col-md-3 py-2 rounded mx-1 btn brand-btn-outline-1" 
                        v-for="(infos, index) in propertyOverviewNav" :key="index"
                        :class="{ 'bg-brand-prime-active-effect' : infos.isActive }"
                        @click="$_activeNavOnClick(index)">

                        {{ infos.name }}

                    </li>
                </ul>

                <!-- Description section -->
                <div class="row text-start col-12 col-md-8" v-show="$_isActiveCheck(0)">
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
                    
                    <hr class="my-4">

                        <div class="col-8">
                            <h4 class="fw-bold">
                                Descrizione
                            </h4>
                            {{ property.description }}
                        </div>
                    </div>

               

                <!-- Services section -->
                <div class="row col-12 col-md-5 text-start" v-show="$_isActiveCheck(1)">
                    <h4 class="col-12 fw-bold">
                        I servizi inclusi nell'abitazione:
                    </h4>
                    <div class="col-6" v-for="service in property.services" :key="service.id">
                        {{ service.name }}
                    </div>
                </div>

                <!-- Map section -->
                <div class="text-start" v-show="$_isActiveCheck(2)">
                    {{ property.title }}
                </div>

                </div>
        </nav>


        <div class="container-fluid">
            <div class="row py-5">
                <hr class="col-12 col-md-8 my-4">

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
      show: false,
      isActive: false,
      currentActive: 0,
      ownerInfo: '',

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
          console.log(response.data.results.data);
        })
        .catch((error) => console.error(error.message));
    },
  },
  created() {
    this.$_getPropertyData();
  },
};
</script>

<style lang="scss" scoped>

@import '../../sass/partials/_brandVariables';
@import '../../sass/partials/_classes';

*::selection{
    background-color: rgba($secondaryLight, .3);
    color: $primary;
}
#propertyOverview {

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
 
}

</style>
