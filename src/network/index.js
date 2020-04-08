import Vue from 'vue'
import axios from 'axios'

Vue.use(axios)

export function request(config) {
  const ajax = axios.create({
    baseURL: 'http://httpbin.org',
    timeout: 30000
  })
  ajax.interceptors.request.use(
    config => {
      return config
    },
    err => {
      return err
    }
  )
  ajax.interceptors.response.use(
    response => {
      return response.data
    },
    err => {
      return err
    }
  )
  return new Promise((resolve, reject) => {
    resolve(ajax(config))
  })
}
