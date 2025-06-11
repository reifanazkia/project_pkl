
import {createRouter, createWebHistory} from 'vue-router'
import Home from '../pages/Home.vue';
import Sekolah from '../components/Sekolah.vue';
import DetailSekolah from '../pages/DetailSekolah.vue';


const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/sekolah/:id",
    name: "DetailSekolah",
    component: DetailSekolah,
    props: true,
  }
  ]

const router = createRouter({
  history: createWebHistory(),
  routes,
})


export default router;

