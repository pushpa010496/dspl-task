import VueRouter from 'vue-router';
import Login from '../components/Login.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/login', component: Login },
  // Add other routes as needed
];

const router = new VueRouter({
  routes,
});

export default router;
