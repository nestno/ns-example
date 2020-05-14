<template>
  <div id="app">
    <nav-bar :navdata="navdata" class="navbar" />
    <keep-alive>
      <router-view />
    </keep-alive>
    <foot :foot="foot" />
  </div>
</template>
<script>
import NavBar from 'components/common/navbar/NavBar'
import Foot from 'components/common/foot/Foot'



export default {
  name: 'app',
  data() {
    return {
      navdata: {},
      foot: []
    }
  },
  components: {
    NavBar,
    Foot
  },
  methods: {},
  created() {
    this.navdata = {
      nav: [
        { url: '/home', name: '首页' },
        { url: '/category', name: '分类' },
        { url: '/about', name: '关于' },
        { url: '/contact', name: '联系方式' }
      ],
      logo: '',
      ustate: ''
    }
  }
}
</script>
<style scoped>
@import 'assets/css/base.css';
.navbar{
  position: relative;
  z-index: 999;
}
.tx {
  color: var(--color-high-text);
}
</style>
