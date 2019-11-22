//Importamos los componentes a usar
import Error404 from './views/Error404';
import Dashboard from './views/Dashboard';
import Admin from './views/Admin';

export default {

    //mode: 'history',
    base: "/home",

    routes: [{
            path: "*",
            component: Error404
        },
        {
            path: "/",
            component: Dashboard
        },
        {
            path: "/admin",
            component: Admin
        }
    ]
};
