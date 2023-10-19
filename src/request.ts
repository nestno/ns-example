import axios from 'axios'
import { axiosProp } from './commons/interface'

export function request(config: axiosProp) {
  const instance = axios.create({
    baseURL: 'https://skel.kb.com/api.php',
    timeout: 5000,
    headers: ''
  })
  instance.interceptors.request.use(
    (config) => {
      return config
    },
    (err) => {
      console.log(err)
    }
  )
  instance.interceptors.response.use(
    (res) => {
      return res.data
    },
    (err) => {
      console.log(err)
    }
  )
  return instance(config)
}
