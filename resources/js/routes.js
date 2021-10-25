//Importamos los componentes a usar
import Error404 from './views/Error404';
import Dashboard from './views/Dashboard';
import Cursos from './views/Cursos';
import Pruebas from './views/Pruebas';
import Perfil from './views/Perfil';
import FactElectronica from './views/FactElectronica';
import NominaElectronica from './views/NominaElectronica';

export default {

    //mode: 'history',
    base: "/home",

    routes: [{
            path: "*",
            name: 'error',
            component: Error404
        },
        {
            path: "/",
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: "/cursos",
            name: 'cursos',
            component: Cursos
        },
        {
            path: "/pruebas",
            name: 'pruebas',
            component: Pruebas
        },
        {
          path: "/perfil",
          name: 'perfil',
          component: Perfil
        },
        {
          path: "/facturacion-electronica",
          name: 'facturacion-electronica',
          component: FactElectronica
        },
        {
          path: "/nomina-electronica",
          name: 'nomina-electronica',
          component: NominaElectronica
        }
    ]
};
