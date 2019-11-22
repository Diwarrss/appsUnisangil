<template>
    <div class="sidebar">
        <div class="sidebar-nav">
            <ul class="nav">
                <!-- Consulta -->
                <li class="nav-item">
                <router-link class="nav-link" to="/">
                    <i class="nav-icon icon-speedometer"></i> Escritorio
                    <span class="badge badge-primary">Ver</span>
                </router-link>
                </li>
                <li class="nav-title text-center text-primary">
                <i class="nav-icon icon-home"></i> Menú
                </li>
                <li class="nav-item">
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
                </li>
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
                <li class="nav-item">
                <router-link class="nav-link" to="/reportes">
                    <i class="nav-icon icon-chart"></i> Reportes
                </router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="/totalIngresos">
                    <i class="nav-icon icon-list"></i> Total Ingresos
                </router-link>
                </li>
                <li class="nav-title text-center text-primary">
                <i class="nav-icon icon-equalizer"></i> Configuración
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="/perfil">
                    <i class="nav-icon icon-user"></i> Perfil
                </router-link>
                </li>
            </ul>
        </div>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
</template>
<style scoped>
/* colocar estilo al router-link-active */
.router-link-exact-active {
  background: #085992;
}
</style>
