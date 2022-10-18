<template>
      
        <div class="col-10 col-md-5 col-lg-3 postcard border-animation m-3">
            <div class="imagecontainer">
               <img :src="postcard.image" class="image w-100"/>
            </div>
            <div class="postcard-detail mt-1">
              <div class="d-flex justify-content-between">
                 <div class="mt-3">
                    <p class="rent mb-2">IN VENDITA</p>
                    <h2 class="title">{{postcard.title}}</h2>
                    <p class="address">{{postcard.address}}</p>
                 </div>
                 <div class="d-flex align-items-center">
                    <p class="price">€ {{postcard.price}}</p>
                 </div>
              </div>
              <div class="d-flex justify-content-around">
                 <img src="https://www.svgrepo.com/show/17785/bed.svg" alt="" class="icon"><span>{{postcard.bedrooms}}</span>
                 <img src="https://www.svgrepo.com/show/15059/bathtub.svg" alt="" class="icon"><span >{{postcard.bathrooms}}</span>
                 <img src="https://www.svgrepo.com/show/48874/ruler.svg" alt="" class="icon"><span>{{postcard.squareMeters}}</span>
              </div>
            </div>
        </div>
      
</template>

<script>
export default {
      name: 'postcard',
      props: ['postcard'],

}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.postcard{
   
    border-radius: .5rem;
    
}
.postcard:hover{
    box-shadow: 0rem 0rem 2rem lightblue;
}
.image{
    border-radius: .5rem;
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