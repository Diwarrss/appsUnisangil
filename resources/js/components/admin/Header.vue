<template>
  <header class="app-header navbar">
    <button
      class="navbar-toggler sidebar-toggler d-lg-none mr-auto"
      type="button"
      data-toggle="sidebar-show"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/home">
      <img class="navbar-brand-full" :src="imagenUniversidad" height="45" alt="Logotipo" />
      <!-- <img
        class="navbar-brand-minimized"
        src="adminCoreui/img/brand/sygnet.svg"
        width="30"
        height="30"
        alt="CoreUI Logo"
      />-->
    </a>
    <button
      class="navbar-toggler sidebar-toggler d-md-down-none"
      type="button"
      data-toggle="sidebar-lg-show"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <router-link class="nav-link" to="/">
          <i class="nav-icon icon-speedometer"></i> Escritorio
        </router-link>
      </li>
      <!-- <li class="nav-item px-3">
        <router-link class="nav-link" to="/usuarios">
          <i class="fas fa-users-cog"></i> Usuarios
        </router-link>
      </li>
      <li class="nav-item px-3" v-if="infoUserAuth[0].roles_id == 1">
        <router-link class="nav-link" to="/universidad">
          <i class="fas fa-university"></i> Universidad
        </router-link>
      </li>-->
    </ul>
    <ul class="nav navbar-nav ml-auto mr-3">
      <li class="nav-item dropdown">
        <a
          class="nav-link"
          data-toggle="dropdown"
          href="#"
          role="button"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <a class="d-sm-down-none">Juan Gomez</a>
          <!-- <img class="img-avatar" :src="imagenUniversidad" /> -->
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Cuenta</strong>
          </div>
          <router-link class="dropdown-item" to="/perfil">
            <i class="fa fa-user"></i> Perfil
          </router-link>
          <!-- <router-link class="dropdown-item" to="/universidad">
            <i class="fas fa-university"></i> Universidad
          </router-link>
          <div class="dropdown-divider"></div>-->
          <a class="dropdown-item" href="/logout" @click="logout()">
            <i class="fas fa-sign-out-alt text-danger"></i> Cerrar Sesión
          </a>
          <form id="logout-form" action="/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" v-bind:value="csrf" />
          </form>
        </div>
      </li>
    </ul>
    <!--  mostrar botn lado izquierdo menu
    <button
      class="navbar-toggler aside-menu-toggler d-md-down-none"
      type="button"
      data-toggle="aside-menu-lg-show"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <button
      class="navbar-toggler aside-menu-toggler d-lg-none"
      type="button"
      data-toggle="aside-menu-show"
    >
      <span class="navbar-toggler-icon"></span>
    </button>-->
  </header>
</template>
<script>
//importamos para usar el mapState, mapActions
import { mapState, mapActions } from "vuex";
export default {
  props: ["csrf"],
  methods: {
    logout() {
      event.preventDefault();
      document.getElementById("logout-form").submit();
    }
  }
};
</script>
