<template>
  <div></div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
import {} from 'vue-router'
import { useStore } from 'vuex'
import { GlobalDataProp } from '@/commons/interface'
export default defineComponent({
  name: 'PostDetail',
  components: {},
  props: {},
  setup() {
    const store = useStore<GlobalDataProp>()
    const islogin = store.state.userInfo.isLogin
    return {
      islogin
    }
  }
})
</script>
