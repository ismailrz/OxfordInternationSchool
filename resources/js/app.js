require('./bootstrap');
 import Vue from 'vue';
import App from './pages/App.vue';
import router from './router';
 new Vue({
    el: '#app',
    router,
    components:{App},
    render: h => h(App)
}).$mount("#app");