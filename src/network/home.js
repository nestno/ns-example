import {request} from '@/network/index'

export function getDate() {
  return request({
    url: '/api.php/home/'
  })
}

export function getNav() {
  return request({
    url: '/api.php/home/getData'
  },'apiNs')
}
