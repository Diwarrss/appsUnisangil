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
                <li class="nav-item nav-dropdown" v-if="dataUser.roles_id === 2 || dataUser.roles_id === 3 || dataUser.roles_id === 1 || dataUser.roles_id === 4">
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
                        <router-link class="nav-link" :to="{ name: 'nrc' }">
                            <i class="nav-icon fas fa-tags"></i> NRC
                        </router-link>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" v-if="dataUser.roles_id === 5 || dataUser.roles_id === 1">
                    <router-link class="nav-link" :to="{ name: 'facturacion-electronica' }">
                        <i class="nav-icon fas fa-file-invoice"></i> Facturación
                    </router-link>
                </li>
                <li class="nav-item" v-if="dataUser.roles_id === 5 || dataUser.roles_id === 1">
                    <router-link class="nav-link" :to="{ name: 'documento-soporte' }">
                        <i class="nav-icon fas fa-file-invoice"></i> Documento Soporte
                    </router-link>
                </li>
                <li class="nav-item" v-if="dataUser.roles_id === 6 || dataUser.roles_id === 1">
                    <router-link class="nav-link" :to="{ name: 'nomina-electronica' }">
                        <i class="nav-icon fas fa-file-invoice"></i> Nómina
                    </router-link>
                </li>
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
