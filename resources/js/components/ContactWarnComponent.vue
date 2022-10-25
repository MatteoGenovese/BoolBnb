<template>
  <section class="message-warn">
    <div class="warn-container">
        <h2>messaggio inviato con successo!</h2>
    </div>
  </section>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_brandVariables';
    section.message-warn {
        width: 100vw;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba($primary,.2);
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;

        div.warn-container {
            width: 600px;
            max-width: 90%;
            height: 200px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 2rem;
            

            h2 {
                color: $primary;
                text-transform: uppercase;
            }
        }
    }
</style>