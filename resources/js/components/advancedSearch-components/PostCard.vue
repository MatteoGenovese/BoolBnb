<template>

    <div class="brand-ft-1 p-3 col-12 col-sm-6 col-lg-4 col-xl-3" @click="$_goToClickedApartment(apartment.id)">
        <div class="apartment-card-hover p-2">
            <div class="imagecontainer  position-relative">
                <div v-if="sponsor==true" class=" position-absolute star text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </div>
                <img v-for="(photo, index) in apartment.photos" :key="index" :src="'/storage/' + photo.file_name" class="image"/>
            </div>
            <div class="postcard-detail d-flex flex-column justify-content-sm-between mt-1 ">
                <div>
                    <p class="brand-color-prime">Disponibile</p>
                    <h6 class="text-capitalize title">{{ apartment.title.toLowerCase() }}</h6>
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
        apartment: {
            type: Object,
            required: false},
        sponsor:{
            type: Boolean,
            required:true,
        }
      },
      methods:{
        $_goToClickedApartment(apartmentId){
            this.$router.push({ name: 'SingleHome', params : { id: apartmentId, sponsor: this.sponsor } });
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
    .star{
        left: 10px;
        display: inline-block;
        padding: 10px;
        background: rgb(184, 0, 0);
        clip-path: polygon(100% 0%, 0% 0%, 0% 100%, 50% 63%, 100% 100%);

        svg{
            transform: translateY(-7px);
            color: white;

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

    .title{
        word-break: break-all;
    }


</style>
