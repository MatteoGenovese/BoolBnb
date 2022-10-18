<template>
      
        <div class="col-12 col-md-4 col-lg-4 postcard p-3">
            <div class="imagecontainer">
               <img v-for="(photo, index) in house.photos" :key="index" :src="'/storage/' + photo.file_name" class="image"/>
         
            </div>
            <div class="postcard-detail mt-1 ">
              <div class="d-flex justify-content-between">
                 <div class="mt-3">
                    <p class="rent mb-2">IN VENDITA</p>
                    <h2 class="title">{{ house.title }}</h2>
                    <p class="address">{{ house.address }}</p>
                 </div>
              </div>
              <div class="d-flex justify-content-around">
                 <img src="https://www.svgrepo.com/show/17785/bed.svg" alt="" class="icon"><span>{{ house.bed_no}}</span>
                 <img src="https://www.svgrepo.com/show/15059/bathtub.svg" alt="" class="icon"><span >{{ house.bathroo_no }}</span>
                 <img src="https://www.svgrepo.com/show/48874/ruler.svg" alt="" class="icon"><span>{{ house.square_meters }}</span>
              </div>
            </div>
        </div>
      
</template>

<script>
export default {
      name: 'postcard',
      props: {
        house: {type: Object, required: false},
      },

}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.imagecontainer {
    width: 100%;
    margin: auto;
    height: 150px;
}
.postcard{
   
    border-radius: .5rem;
    
}
.postcard:hover{
    box-shadow: 0rem 0rem 2rem lightblue;
}
.image{
    border-radius: .5rem;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.icon{
    width: 1.5rem;
    filter:opacity(50%);
}
.title{
    font-size: 1rem;
}
.rent{
    color: rgb(189, 189, 189);
}
.price{
    font-size: 1.2rem;
    font-weight: bold;
    color: rgb(93, 201, 255);
}
.address{
     font-size: 1rem;
    font-weight: bold;
    color: black;
}
span{
    color: grey;
}
</style>