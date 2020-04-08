import { TIPACT } from 'store/action-types'
import { VIEWDATA } from 'store/mutation-types'

export default {
  [TIPACT](context, payload) {
    return new Promise(resolve => {
      setTimeout(() => {
        resolve(payload)
      }, 2000)
    })
      .then(data => {
        console.log(data)
        return new Promise(resolve => {
          setTimeout(() => {
            resolve(data + '123')
          }, 1000)
        })
      })
      .then(data => {
        console.log(data)
        context.commit(VIEWDATA, data)
        return '12344'
      })
    // obj.state.tip = payload
    // console.log(arguments)
  }
}
