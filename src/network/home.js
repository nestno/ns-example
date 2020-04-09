import { request } from '@/network/index'
export function getDate() {
  return request({
    url: '/api.php/home/'
  })
}
