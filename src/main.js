import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import 'lib-flexible'
import func from './common/func'
// import './utils/rem'
Vue.config.productionTip = false
Vue.use(func)
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
