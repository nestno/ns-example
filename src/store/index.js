import Vue from 'vue'
import Vuex from 'vuex'
import mutations from 'store/mutations'
import actions from 'store/actions'
import getters from 'store/getters'
import home from 'store/modules/home'


Vue.use(Vuex)
const state = {
  hello: '欢迎光临！',
  tip: '提示'
}
const modules = {
  home
}
export default new Vuex.Store({
  state,
  mutations,
  actions,
  modules,
  getters
})
