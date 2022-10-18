<template>
  <nav id="headerNavbar" class="navbar brand-ft-1 navbar-expand-lg bg-transparent">
    <div class="container">
      <router-link class="navbar-brand" :to="{ name: 'HomePage' }">
        <img :src="'/storage/asset/img/logo.jpg'" alt="brand logo">
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNavDropdown">

        <ul class="navbar-nav">
          <li class="nav-item" v-for="(link, index) in navLinks" :key="index">
            <router-link class="nav-link" :to="{ name: link.pathTo }">
              {{ link.name }}
            </router-link>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle btn brand-btn-1"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Vendi anche tu!
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/login">Accedi</a></li>
              <li><a class="dropdown-item" href="/register">Registrati</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "HeaderComponent",
  data: function () {
    return {
      navLinks: [
        { route: "/", pathTo: "HomePage", name: "Home" },
        { route: "/ricerca-avanzata", pathTo: "AdvancedSearch", name: "Ricerca" },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>

  .navbar-brand{
    width: 4rem;
    height: 4rem;

    img{
      object-fit:contain;  
      width: 100%;
      height: 100%;
    }
  }

</style>