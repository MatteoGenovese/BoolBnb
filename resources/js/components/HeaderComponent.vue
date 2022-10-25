<template>
  <nav id="headerNavbar" class="navbar brand-ft-1 navbar-expand-lg bg-transparent" tabindex="0">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img :src="'/storage/asset/img/logo.jpg'" alt="brand logo">
      </a>
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
          <li class="nav-item position-relative"
           v-for="(link, index) in navLinks" :key="index">
            <router-link class="nav-link" :to="{ name: link.pathTo }">
              {{ link.name }}
            </router-link>
          </li>
        </ul>

            <a href="/login" role="button"
              class="profile-link"
              aria-expanded="false">
              Area Utente
            </a>

      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "HeaderComponent",
  data: function () {
    return {
      currentPage: 0,
      navLinks: [
        { route: "/", pathTo: "HomePage", name: "Home", isCurrentPage: true, },
        { route: "/ricerca-avanzata", pathTo: "AdvancedSearch", name: "Ricerca", isCurrentPage: false, },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>

  @import '../../sass/partials/_brandVariables.scss';

  a.router-link-exact-active{
    color: $primary;

    &::after{
      content: '\0020';
      position: absolute;
      width: 100%;
      bottom: 0;
      left: 0;
      border-bottom: 3px solid $primary;

      @media screen and (max-width: 992px){
        border-bottom: 0;
        height: 50%;
        position: absolute;
        top: 25%;
        transform: translate(-5px ,0);
        border-left: 3px solid $primary;
      }
    }
  }

  .navbar-brand{
    width: 4rem;
    height: 4rem;

    img{
      object-fit:contain;  
      width: 100%;
      height: 100%;
    }
  }

  .profile-link {
    color: $primary;
    text-decoration: none;
    font-size: 1.25rem;
    display: inline-block;
    padding: .5rem 1rem;
    border-radius: 2rem;
    transition: all .2s;

    &:hover {
      color: white;
      background-color: $primary;
    }
  }

</style>