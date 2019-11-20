//Importamos los componentes a usar
import Error404 from './views/Error404';
import Dashboard from './views/admin/Dashboard';

export default {

    //mode: 'history',
    base: "/admin",

    routes: [{
            path: "*",
            component: Error404
        },
        {
            path: "/",
            component: Dashboard
        }
    ]
};
