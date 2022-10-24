<template>
    <section id="citiesSuggestions" class="row gy-4 py-5">

        <div class="col-12">
           <h2>
                Viaggia in città
           </h2>
           <p class="text-secondary">
                Ecco alcune delle nostre città preferite
           </p>
        </div>
    
        <div class="col-6 cities-card-wrapper">
            <img :src="'/storage/asset/suggestedCities/rome.jpeg'" class="img-fluid" alt="rome image">
            <h3 class="city-name">
                Roma
            </h3>
        </div>
        <div class="col-6 cities-card-wrapper">
            <img :src="'/storage/asset/suggestedCities/milan.jpg'" class="img-fluid" alt="milan image">
            <h3 class="city-name">
                Milano
            </h3>
        </div>
        <div class="col-4 cities-card-wrapper">
            <img :src="'/storage/asset/suggestedCities/naples.jpg'" class="img-fluid" alt="naples image">
            <h3 class="city-name">
                Napoli
            </h3>
        </div>
        <div class="col-4 cities-card-wrapper">
            <img :src="'/storage/asset/suggestedCities/lecce.jpg'" class="img-fluid" alt="lecce image">
            <h3 class="city-name">
                Lecce
            </h3>
        </div>
        <div class="col-4 cities-card-wrapper">
            <img :src="'/storage/asset/suggestedCities/catania.jpeg'" class="img-fluid" alt="catania image">
            <h3 class="city-name">
                Catania
            </h3>
        </div>
       
    </section>
</template>

<script>
export default {
    name: 'CitiesSuggestion',
}
</script>

<style lang="scss" scoped>

    #citiesSuggestions{

        .cities-card-wrapper{
            position: relative;
            transition: transform 200ms linear;

             &:hover{
                cursor: pointer;
                transform: translate(0, -10px);
            }

            &:hover::before{
                content: '\0020';
                width: calc(100% - 25px);
                height: 100%;
                position: absolute;
                top: 0;
                background: linear-gradient(128deg, rgba(0,0,0,0.38) 0%, rgba(0,0,0,0.05) 20%);
            }

        }

        img{
            width: 100%;
            height: 100%;
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