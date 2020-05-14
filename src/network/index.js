import Vue from 'vue'
import axios from 'axios'

Vue.prototype.$axios = axios
const BASEURL = {
  'httpb': 'http://httpbin.org',
  'apiNs': 'https://nss.nervsys.com:8000'
}

export function request(config, baseUrl) {
  baseUrl = BASEURL[baseUrl] || BASEURL.httpb
  const ajax = axios.create({
    baseURL: baseUrl,
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
      console.log(response);
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
