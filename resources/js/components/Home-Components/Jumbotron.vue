<template>
    <section>
        <div class="text-center">
            <div class="row d-flex">
                    <div class="col-md-8 col-sm-12 z-index">
                        <div class="">
                            <h1>Scopri un posto in cui ti piacerà vivere </h1>
                        </div>
                        <form action="" class="search-bar">
                            <input type="text" placeholder="Inserisci posizione" name="q">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Search
                            </button>
                        </form>
                        <p>Cerca tra migliaia di inserzioni</p>
                    </div>
                    <div class="col-md-6 col-sm-12 position-absolute top-0 end-0 ">
                        <img class="w-100" src="https://www.oknoplast.it/blog/wp-content/uploads/2017/12/Caricatura-del-trasloco-con-il-bambino-che-trasporta-i-pacchi-con-il-triciclo.jpg" alt="">
                    </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style lang='scss' scoped>
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