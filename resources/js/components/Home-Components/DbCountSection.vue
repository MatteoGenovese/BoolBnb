<template>
    <section id="countSection" class="container-fluid my-5">
        <div class="container">
            <div class="row justify-content-around text-center">
                <div v-for="(data, i) in dataCount" :key="i" class="card my-3 py-2 col-12 col-md-6 col-lg-2">
                    <h1>
                        {{ data.count }}
                    </h1>
                    <h3>
                        {{ data.name }}
                    </h3>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: 'DbCountSection',
    data(){
        return{
            dataCount: '',
        }
    },
    methods:{
        $_getDbEntriesCount(){
            axios.get('/api/totalCount')
            .then((response)=>{
                console.log(response.data.results);
                this.dataCount = response.data.results;
            })
            .catch((error)=>{
                console.error(error);
            })
        },
    },
    
    mounted(){
        this.$_getDbEntriesCount();
    }
}
</script>

<style lang="scss" scoped>

    #countSection{
        padding: 6rem;
        background-image: url('https://blog.blacklane.com/wp-content/uploads/2019/05/Untitled-design-2019-05-29T115908.840.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position:top;

        .card{
            color: white;
            background-color: rgba(black, .6);
            display: flex;
            justify-content: space-around;
        }
    }

</style>