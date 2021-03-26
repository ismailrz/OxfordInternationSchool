import Vue from "vue";
import VueRouter from "vue-router";

import NewStudent from './pages/NewStudent.vue';
import LandingPage from './pages/LandingPage.vue';
import UpdateStudent from './pages/UpdateStudent.vue';

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
    {
      path: "/update-student/:id",
      component: UpdateStudent,
    },
  ],
});
