import { VIEWDATA, EDITDATA } from 'store/mutation-types'
export default {
  [EDITDATA](state, payload) {
    state.hello = payload
  },
  [VIEWDATA](state, payload) {
    state.tip = payload
  }
}
