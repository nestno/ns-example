<template>
  <div>
    <nav class="navbar navbar-dark bg-primary mb-4 px-4">
      <router-link
        class="navbar-brand"
        to="/"
      >者也专栏</router-link>
      <ul
        v-if="userInfo && !userInfo.isLogin"
        class="list-inline mb-0"
      >
        <li class="list-inline-item">
          <router-link
            to="/login"
            class="btn btn-outline-light my-2"
          >登录</router-link>
        </li>
        <li class="list-inline-item">
          <router-link
            to="/register"
            class="btn btn-outline-light my-2"
          >注册</router-link>
        </li>
      </ul>
      <ul
        v-else
        class="list-inline mb-0"
      >
        <li class="list-inline-item">
          <dropdow :title="userInfo && userInfo.name">
            <dropdown-item>
              <!-- <a class="dropdown-item" href="#"></a> -->
              <router-link
                to="/create"
                class="btn btn-outline-lingt"
              >新建文章</router-link>
            </dropdown-item>
            <dropdown-item>
              <a
                class="dropdown-item"
                href="#"
              >编辑资料</a>
            </dropdown-item>
            <dropdown-item>
              <a
                class="dropdown-item"
                href="#"
              >退出登录</a>
            </dropdown-item>
          </dropdow>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'
import Dropdow from '@/components/Dropdow.vue'
import DropdownItem from '@/components/DropdownItem.vue'
// import { useStore } from 'vuex'
import { UserProp } from '@/commons/interface'
export default defineComponent({
  name: 'GlobalHeader',
  components: {
    Dropdow,
    DropdownItem
  },
  props: {
    userInfo: {
      type: Object as PropType<UserProp>,
      require: true
    }
  },
  setup() {
    // const store = useStore()
    return {}
  }
})
</script>

<style scoped></style>
