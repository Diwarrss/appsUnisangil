<template>
    <div class="sidebar" v-if="dataUser">
        <div class="sidebar-nav">
            <ul class="nav">
                <!-- Consulta -->
                <li class="nav-item">
                <router-link class="nav-link" to="/">
                    <i class="nav-icon icon-speedometer"></i> Escritorio
                    <span class="badge badge-primary">Ver</span>
                </router-link>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-title text-center">
                    <i class="nav-icon icon-home"></i> Menú
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="nav-icon fas fa-archive"></i> Solicitudes
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'cursos' }">
                            <i class="nav-icon fas fa-boxes"></i> Cursos
                        </router-link>
                        </li>
                        <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'pruebas' }">
                            <i class="nav-icon fas fa-tags"></i> Pruebas
                        </router-link>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                <router-link class="nav-link" to="/admin">
                    <i class="nav-icon icon-user-following"></i> Admin
                </router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="/personas">
                    <i class="nav-icon icon-people"></i> Personas
                </router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="/computadores">
                    <i class="nav-icon icon-screen-desktop"></i> Computadores
                </router-link>
                </li> -->
                <!-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-chart"></i> Reportes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                    <router-link class="nav-link" to="/total">
                        <i class="nav-icon icon-puzzle"></i> Totales
                    </router-link>
                    </li>
                </ul>
                </li>-->
                <!-- <li class="nav-item">
                <router-link class="nav-link" to="/reportes">
                    <i class="nav-icon icon-chart"></i> Reportes
                </router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="/totalIngresos">
                    <i class="nav-icon icon-list"></i> Total Ingresos
                </router-link>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-title text-center">
                    <i class="nav-icon icon-equalizer"></i> Configuración
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                <router-link class="nav-link" to="/perfil">
                    <i class="nav-icon icon-user"></i> Perfil
                </router-link>
                </li> -->
            </ul>
        </div>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
</template>
<script>
//importamos para usar el mapState, mapActions
import { mapState, mapActions, mapGetters } from "vuex";
export default {
    computed: {
        dataUser()
        {
            return this.$store.state.dataUser
        }
    },
}
</script>
<style lang="scss" scoped>
/* colocar estilo al router-link-active */
.router-link-exact-active {
  background: #000000;
}
.nav-link:hover{
    background-color: #000000 !important;

}
.nav-title{
    font-size: 16px;
}
</style>
