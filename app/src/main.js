import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueSession from 'vue-session'

import VueToast from 'vue-toast-notification';
// Import any of available themes
import 'vue-toast-notification/dist/theme-default.css';
//import 'vue-toast-notification/dist/theme-sugar.css';

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

Vue.use(VueToast)
Vue.use(VueSession)

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
