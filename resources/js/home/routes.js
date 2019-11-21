//Importamos los componentes a usar
import Error404 from '../views/home/Error404';
import Intro from '../views/home/Intro';
import Services from '../views/home/Services';
import About from '../views/home/About';
import Team from '../views/home/Team';

export default {

    mode: 'history',
    base: "/",

    routes: [/* {
            path: "*",
            component: Error404
        }, */
        {
            path: "/",
            name: 'intro',
            component: Intro
        },
        {
            path: "/Services",
            name: 'services',
            component: Services
        },
        {
            path: "/About",
            name: 'about',
            component: About
        },
        {
            path: "/Team",
            name: 'team',
            component: Team
        }
    ]
};
