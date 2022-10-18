<template>
    <section>
        <div class="container">
           <div class="row">
            <PostCard
          v-for="postcard in postcards"
          :key="postcard.id"
          :postcard="postcard"
        />
        </div>
        </div>
        
    </section>
</template>


<script>

import PostCard from '../components/Home-Components/PostCard.vue';

export default {
    name:"HomePage",
    components:{
        PostCard
    },
    data(){
        return{
            postcards: [
                {
                    image: 'https://www.pozzicase.it/sites/default/files/styles/immagine_teaser_casa/public/casa/thumb%20.jpg?itok=ff8V817rhttps://www.progedil90.it/blog/wp-content/uploads/2013/10/case-ecologiche.png',
                    title: 'Piccola villetta',
                    address: 'Via Cesare Ciccotti 4',
                    bedrooms: '2 letti',
                    bathrooms: '1 bagno',
                    squareMeters: '300 m²',
                    price: '300.000',
                    
                },
                {
                    image: 'https://www.guidaedilizia.it/images/_processed_/2/5/csm_rubner_haus-11_317e2ad28c.jpg',
                    title: 'Villa con piscina',
                    address: 'Via Angilla Vecchia 10',
                    bedrooms: '3 letti',
                    bathrooms: '2 bagni',
                    squareMeters: '400 m²',
                    price:'400.000',
                    
                },
                {
                    image: 'https://www.avantgardeconstruct.it/wp-content/uploads/2019/06/Gallery-case-prefabbricate-in-legno.jpg',
                    title: 'Villa moderna',
                    address: 'Via Dei Salici 12',
                    bedrooms: '5 letti',
                    bathrooms: '3 bagni',
                    squareMeters: '350 m²',
                    price:'250.000',
                },
            ]
        }
    }
}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>