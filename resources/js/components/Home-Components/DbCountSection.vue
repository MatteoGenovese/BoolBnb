<template>
    <section id="countSection" class="container-fluid my-5">
        <div class="container">
            <div class="row justify-content-around text-center">
                <div v-for="(data, i) in dataCount" :key="i" class="card py-1 col-12 col-sm-5 col-xl-2 my-3">
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

@import '../../../sass/partials/_brandVariables.scss';

    #countSection{
        padding:6rem 1rem;
        background-image: url('https://blog.blacklane.com/wp-content/uploads/2019/05/Untitled-design-2019-05-29T115908.840.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position:top;

        .card{
            background-color: rgba($primary, .8);
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            color: white;
        }
    }

</style>