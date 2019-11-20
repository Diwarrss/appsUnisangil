//Importamos los componentes a usar
import Intro from '../views/home/Intro';
import Servicios from '../views/home/Servicios';

export default {

    mode: 'history',
    base: "/",

    routes: [/* {
            path: "*",
            component:
        }, */
        {
            path: "/",
            component: Intro
        },
        {
            path: "/Servicios",
            component: Servicios
        }
    ]
};
