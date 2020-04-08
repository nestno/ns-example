export default {
  addNum(state, getters) {
    return text => {
      return state.hello + text
    }
  }
}
