<template>
  <div>
    <h1>Ricerca avanzata</h1>
    <filters-component />
  </div>
</template>

<script>
import FiltersComponent from "../components/FiltersComponent.vue"
export default {
    name:"AdvancedSearch",
    components: {
      FiltersComponent,
      }
    
}
</script>

<style lang="scss">

</style>