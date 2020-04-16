//Importamos los componentes a usar
import Error404 from './views/Error404';
import Dashboard from './views/Dashboard';
import Cursos from './views/Cursos';
import Pruebas from './views/Pruebas';

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
        }
    ]
};
