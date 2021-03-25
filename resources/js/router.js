import Vue from "vue";
import VueRouter from "vue-router";

import NewStudent from './pages/NewStudent.vue'
import LandingPage from './pages/LandingPage.vue'

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      component: LandingPage,
    },
    {
      path: "/new-student",
      component: NewStudent,
    },
  ],
});
