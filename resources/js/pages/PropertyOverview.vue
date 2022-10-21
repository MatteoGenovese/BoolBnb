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
                <ul class="row col-12 col-md-8 p-0 mb-5">
                    <li class="col-3 col-md-3 py-2 rounded mx-1 btn brand-btn-outline-1" 
                        v-for="(infos, index) in propertyOverviewNav" :key="index"
                        :class="{ 'bg-brand-prime-active-effect' : infos.isActive }"
                        @click="$_activeNavOnClick(index)">

                        {{ infos.name }}

                    </li>
                </ul>

                <!-- Description section -->
                <div class="text-start" v-show="$_isActiveCheck(0)">

                    <div class="row col-8">
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

                    </div>

                    <!-- Services section -->
                    <div class="text-start" v-show="$_isActiveCheck(1)">
                        <h4 class="fw-bold">
                            I servizi inclusi nell'abitazione:
                        </h4>
                        <div v-for="service in property.services" :key="service.id">
                            {{ service.name }}
                        </div>
                    </div>

                    <!-- Map section -->
                    <div class="text-start" v-show="$_isActiveCheck(2)">
                        {{ property.title }}
                    </div>

                </div>
        </nav>


        <div class="row py-5">
            <hr class="col-8 my-4">

            <div class="col-8">
                <h4>
                    Informazioni sul proprietario:
                </h4>
                <h5>
                    {{ ownerInfo.name }} {{ ownerInfo.surname }} 
                </h5>
                <p class="text-secondary">
                    {{ ownerInfo.email }}
                </p>
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
#propertyOverview {

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
