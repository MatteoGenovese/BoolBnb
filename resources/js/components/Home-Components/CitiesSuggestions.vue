<template>
    <section class="container">
        <div id="citiesSuggestions" class="row gy-4 py-5">

            <div class="col-12">
            <h2>
                    <span class="brand-styled-word-prime rounded">Viaggia</span>
                    in città
            </h2>
            <p class="text-secondary">
                    Ecco alcune delle nostre città preferite
            </p>
            </div>

            <div v-for="(card, index) in suggestedCities" :key="index" @click="$_redirectToAdvancedSearchWithPosition(index)"
            :class="card.responsiveClasses">
                <div class="cities-card-wrapper">
                    <img :src="card.img" :alt="'Foto rappresentativa di ' + card.city">
                    <h3 class="city-name">
                        {{ card.city }}
                    </h3>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CitiesSuggestion',
    data(){
        return{
            suggestedCities:[
                {
                    city: 'Roma',
                    position:{
                        lat: 41.89056,
                        lon: 12.49427,
                    },
                    img: '/storage/asset/suggestedCities/rome.jpeg',
                    responsiveClasses: 'col-12 col-lg-6',
                },
                {
                    city: 'Milano',
                    position:{
                        lat: 45.46362,
                        lon: 9.18812,
                    },
                    img: '/storage/asset/suggestedCities/milan.jpg',
                    responsiveClasses: 'col-6',
                },
                {
                    city: 'Napoli',
                    position: {
                        lat: 40.83998,
                        lon: 14.25254,
                    },
                    img: '/storage/asset/suggestedCities/naples.jpg',
                    responsiveClasses: 'col-6 col-lg-4',
                },
                {
                    city: 'Lecce',
                    position:{
                        lat: 40.35329,
                        lon: 18.17401,
                    },
                    img: '/storage/asset/suggestedCities/lecce.jpg',
                    responsiveClasses: 'col-6 col-lg-4',
                },
                {
                    city: 'Ancona',
                    position:{
                        lat: 43.609476,
                        lon: 13.50375,
                    },
                    img: '/storage/asset/suggestedCities/ancona.jpg',
                    responsiveClasses: 'col-6 col-lg-4',
                },
            ],
        }
    },
    methods:{
        $_redirectToAdvancedSearchWithPosition(index){

            let addressSelected = this.suggestedCities[index];

            this.$router.push(
                {
                    name: 'AdvancedSearch', query: { lat: addressSelected.position.lat, lon:  addressSelected.position.lon} 
                })
        }
    }
}
</script>

<style lang="scss" scoped>

    @import '../../../sass/partials/_classes.scss';

    #citiesSuggestions{

        .cities-card-wrapper{
            width: 100%;
            height: 100%;
            position: relative;
            text-transform: capitalize;
            transition: transform 200ms linear;
            border-radius: 15px;
            width: 100%;
            height: 100%;
            overflow: hidden;

            &:hover{
                cursor: pointer;
                transform: translate(0, -10px);
            }

            &:hover::before{
                content: '\0020';
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                background: linear-gradient(128deg, rgba(0,0,0,0.38) 0%, rgba(0,0,0,0.05) 20%);
            }

        }

        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .city-name{
            color: white;
            font-weight: 700;
            position: absolute;
            padding: 1rem;
            top: 0;
        }
    }

</style>
