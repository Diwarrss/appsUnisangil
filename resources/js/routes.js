//Importamos los componentes a usar
import Error404 from './views/Error404';
import Dashboard from './views/Dashboard';
import Cursos from './views/Cursos';
import Nrc from './views/Nrc';
import Perfil from './views/Perfil';
import FactElectronica from './views/FactElectronica';
import DocSoporte from './views/DocSoporte'
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
            path: "/nrc",
            name: 'nrc',
            component: Nrc
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
          path: "/documento-soporte",
          name: 'documento-soporte',
          component: DocSoporte
        },
        {
          path: "/nomina-electronica",
          name: 'nomina-electronica',
          component: NominaElectronica
        }
    ]
};
