export interface RuleProp {
  type: 'require' | 'email' | 'length'
  message: string
  max?: number
  min?: number
}
export interface axiosProp {
  url: string
  methon: string
  params?: object
}
export interface TestColumns {
  id: number
  avatar?: string
  description: string
  title: string
}
export interface TestPosts {
  id: number
  image?: string
  createdAt: string
  title: string
  content: string
  columnId: number
}
export interface UserProp {
  isLogin: boolean
  name?: string
  id?: number
  columnId?: number
}

export interface GlobalDataProp {
  userInfo: UserProp
  columns: TestColumns[]
  posts: TestPosts[]
}
