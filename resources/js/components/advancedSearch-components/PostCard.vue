<template>

    <div class="brand-ft-1 p-3 col-12 col-sm-6 col-lg-4 col-xl-3" @click="$_goToClickedApartment(apartment.id)">
        <div class="apartment-card-hover p-2">
            <div class="imagecontainer">
                <img v-for="(photo, index) in apartment.photos" :key="index" :src="'/storage/' + photo.file_name" class="image"/>
            </div>
            <div class="postcard-detail d-flex flex-column justify-content-sm-between mt-1 ">
                <div>
                    <p class="brand-color-prime">Disponibile</p>
                    <h6 class="text-capitalize">{{ apartment.title.toLowerCase() }}</h6>
                    <h6 class="fw-bold">{{ apartment.address }}</h6>
                </div>
                
                <div class="d-flex justify-content-around my-3">
                    <img src="https://www.svgrepo.com/show/17785/bed.svg" alt="Icona letti" class="icon"><span>{{ apartment.bed_no }}</span>
                    <img src="https://www.svgrepo.com/show/15059/bathtub.svg" alt="Icona bagni" class="icon"><span >{{ apartment.bathroom_no }}</span>
                    <img src="https://www.svgrepo.com/show/48874/ruler.svg" alt="Icona metri quadrati" class="icon"><span>{{ apartment.square_meters }}</span>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
      name: 'postcard',
      props: {
        apartment: {type: Object, required: false},
      },
      methods:{
        $_goToClickedApartment(apartmentId){
            this.$router.push({ name: 'SingleHome', params : { id: apartmentId } });
        }
      }

}
</script>

<style lang="scss" scoped>

@import '../../../sass/partials/_brandVariables';
@import '../../../sass/partials/_classes';

    .postcard-detail{
        @media screen and (min-width: 576px) {
            height: 12.5rem;
        }
    }

    .apartment-card-hover {
        transition: all .3s;
        border-radius: .5rem;
        cursor: pointer;

        &:hover {
            transform: scale(1.1);
            box-shadow: 0rem 0rem .7rem $tertiaryLight;
        }
        &:active {
            transform:scale(.70);
        }
    }

    .imagecontainer {
        width: 100%;
        margin: auto;
        height: 150px;

        .image{
            border-radius: .5rem;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }


    .icon{
        width: 1.5rem;
        filter:opacity(50%);
    }

 
</style>
