<template>
    <div id="jumbotron" class="row position-relative">
        <div class="col-md-8 col-sm-12 z-index">
            <div class="mt-5">
                <h1>Scopri il posto in cui ti piacerà vivere</h1>
            </div>

            <p>Cerca tra migliaia di inserzioni</p>
        </div>
        <div class="col-md-6 col-sm-12 position-absolute  end-0">
            <img class="img-fluid"
                src="https://www.oknoplast.it/blog/wp-content/uploads/2017/12/Caricatura-del-trasloco-con-il-bambino-che-trasporta-i-pacchi-con-il-triciclo.jpg"
                alt="jumbo-image" />
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Jumbotron",
    data: function () {
        return {
        };
    },

    methods: {
}
};
</script>

<style lang='scss' scoped>
#jumbotron {
    height: 450px;
}

.search-bar {
    width: 100%;
    max-width: 100%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    border-radius: 8px;
    padding: 10px 20px;
}

.search-bar input {
    background: transparent;
    flex: 1;
    border: 0;
    outline: none;
    padding: 10px 5px;
    font-size: 20px;
}

.z-index {
    z-index: 3;
}

@media (max-width: 767px) {
    img {
        padding-top: 10rem;
    }
}
</style>
