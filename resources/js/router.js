//gestione dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

//inizializzazione Vue Router
Vue.use(VueRouter);

//import dei componenti richiamati nelle rotte
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';
import SinglePost from './pages/SinglePost';
import NotFound from './pages/NotFound';
import Category from './pages/Category';


const router = new VueRouter({
    mode:'history',
    //aggiunta classe active 
    // linkActiveClass:'active',
    routes:[
       {
            path:'/',
            name:'home',
            component:Home
        },
        {
            path:'/about',
            name:'about',
            component:About
        },
        {
            path:'/blog',
            name:'blog',
            component:Blog
        },
        {
            //rotta parametrica
            path:'/blog/:slug',
            name:'single-post',
            component:SinglePost
        },
        {
            path:'/blog/category/:slug',
            name:'category',
            component:Category
        },
        //deve essere l'ultima
        {
            path:'*',
            name:'not-found',
            component:NotFound
        }
    ]
});

export default router;

