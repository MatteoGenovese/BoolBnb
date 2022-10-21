<template>
    <div id="propertyOverview" class="container mt-5 brand-ft-1">
        <div class="row">
            <div class="img-container col-12">
                <img v-for="photo in property.photos" :key="photo.id" :src="'/storage/' + photo.file_name"
                    :alt="property.title + ' cover Photo'">
            </div>
        </div>
        <!-- <div class="row mt-5">
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
            </div> -->


            <nav id="propertyNav">
                <div class="container-fluid">
                    <ul class="row col-12 col-md-8 p-0">
                        <li class="col-3 col-md-3 py-2 rounded mx-1 btn btn-outline-primary" 
                            v-for="(infos, index) in propertyOverviewNav" :key="index"
                            :class="{ 'bg-warning' : infos.isActive }"
                            @click="$_activeNavOnClick(index)">

                            {{ infos.name }}

                        </li>
                    </ul>

                    <!-- Description section -->
                    <div class="text-start" v-if="$_isActiveCheck(0)">

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
                    <div class="text-start" v-if="$_isActiveCheck(1)">
                        <h4 class="fw-bold">
                            I servizi inclusi nell'abitazione:
                        </h4>
                        <div v-for="service in property.services" :key="service.id">
                            {{ service.name }}
                        </div>
                    </div>

                    <!-- Map section -->
                    <div class="text-start" v-if="$_isActiveCheck(2)">
                        {{ property.title }}
                    </div>

                </div>
            </nav>


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
      show: false,
      isActive: false,
      currentActive: 0,

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
    getPropertyData() {
      axios
        .get("/api/apartments/" + this.id)
        .then((response) => {
          this.property = response.data.results.data;
          console.log(response.data.results.data);
          this.user =
            this.property.user.surname + " " + this.property.user.name;
        })
        .catch((error) => console.error(error.message));
    },
  },
  created() {
    this.getPropertyData();
  },
};
</script>

<style lang="scss" scoped>
#propertyOverview {
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
