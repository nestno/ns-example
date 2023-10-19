import { createStore } from 'vuex'
import { testColumns, testPosts } from '@/testData'
import { GlobalDataProp } from '@/commons/interface'
import { request } from '@/request'

const store = createStore<GlobalDataProp>({
  state: {
    userInfo: {
      isLogin: false
    },
    columns: testColumns,
    posts: testPosts
  },
  mutations: {
    login(state) {
      state.userInfo = { ...state.userInfo, isLogin: true, name: 'kaibin' }
    },
    createPost(state, newPost) {
      state.posts.push(newPost)
    },
    fetchColumns(state, rawData) {
      state.columns = rawData.data.list
    }
  },
  actions: {
    fetchColumns(context) {
      request({ url: '/columns', methon: 'get' }).then((res) => {
        context.commit('fetchColumns', res)
      })
    }
  },
  getters: {
    biggerColumnsLen(state) {
      return state.columns.filter((c) => c.id > 2).length
    },
    getColumnById: (state) => (id: number) => {
      return state.columns.find((c) => c.id === id)
    },
    getPostsById: (state) => (cid: number) => {
      return state.posts.filter((post) => post.columnId === cid)
    }
  }
})
export default store
