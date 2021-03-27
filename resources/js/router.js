import Vue from "vue";
import VueRouter from "vue-router";

import NewAccount from './pages/NewAccount.vue';
import LandingPage from './pages/LandingPage.vue';
import UpdateAccount from './pages/UpdateAccount.vue';

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      component: LandingPage,
    },
    {
      path: "/new-account",
      component: NewAccount,
    },
    {
      path: "/update-account/:id",
      component: UpdateAccount,
    },
  ],
});
