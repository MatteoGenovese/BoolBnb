<template>
    <section class="container">
        <div id="jumbotron" class="row my-3 position-relative">

            <div class="title-wrapper col-12 col-lg-6 py-5">
                <h1 class="w-75">Scopri il posto in cui ti piacerà 
                   <div class="d-sm-inline d-md-block d-xl-inline">
                        <span class="type-effect brand-color-prime p-1">
                            {{ printedWord }}
                        </span>
                   </div>
                </h1>

                <p>Cerca tra migliaia di inserzioni</p>
                <SearchBar/>
            </div>

            <div class="img-wrapper col-12 col-lg-6">
                <img :src="'/storage/asset/img/jumbophoto.avif'" alt="" class="img-fluid d-block d-lg-none">
            </div>
        </div>
    </section>
</template>

<script>
import SearchBar from './SearchBar.vue';
export default {
    name: "Jumbotron",
    components:{
        SearchBar,
    },
    data: function () {
        return {
            isTyping: false,
            printedWord: '',
            wordsArray: ['viaggiare. ', 'conoscere. ', 'vivere. '],
            isFull: false,
            i: -1,
            currentWord: 0,
            reset: false,
        };
    },

    methods: {
        $_write(){
            if(this.isFull === false){
                this.i++;
                this.printedWord += this.wordsArray[this.currentWord][this.i];

                if(this.i === this.wordsArray[this.currentWord].length -1){
                    this.isFull = true;
                    this.i = -1;
                    this.currentWord++;
                }
        }
      },
      $_deleteWord(){
        setInterval(() => {
            if(this.isFull === true){
              this.printedWord = this.printedWord.slice(0,this.printedWord.length -1);
              if(this.printedWord.length === 0){
                this.isFull = false;
              }
            }
            if(this.wordsArray.length === this.currentWord){
              this.currentWord = 0;
            }
        }, 50);
      },

    $_startWrite(){
        this.isTyping = setInterval(() => {
          this.$_write();
        }, 300);
      },
    },
    created(){
      this.$_startWrite();
      this.$_deleteWord();
    },
};
</script>

<style lang='scss' scoped>

    @import '../../../sass/partials/_brandVariables.scss';

    #jumbotron {
        background-repeat: no-repeat;
        background-position: right;
        background-size: contain;

        .title-wrapper{
            z-index: 1;
        }

        .search-bar-container {
            position: absolute;
            width: 100%;
            top: 12rem;
            left: 3rem;
            z-index: 2;
        }

        .img-wrapper{
            @media screen and (min-width: 992px) {
                // background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');
                background-size: cover;
                background-image: url('/storage/asset/img/jumbophoto.avif');
                background-position: center;
            }
        }

        /* DEMO-SPECIFIC STYLES */
        .type-effect{
            overflow: hidden; /* Ensures the content is not revealed until the animation */
            border-right: 2px solid orange; /* The typwriter cursor */
            margin: 0 auto; /* Gives that scrolling effect as the typing happens */
            animation: 
            typing 3.5s steps(30, end),
            blink .5s step-end infinite;
            }
            /* The typing effect */
            @keyframes typing {
            from { width: 0 }
            to { width: 100% }
            }
            /* The typewriter cursor effect */
            @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: $primary }
            }

        .typewriter{
            &::after{
            content: '\0020';
            border-right: 4px solid;
            border-radius: 30px;
            animation: blink-caret 1.25s step-end infinite;
            }
        }

        // /* The typewriter cursor effect */
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: blue; }
        }

    }
</style>
