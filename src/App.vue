<template>
  <div id="app">
    <div id="nav">
      <tab-bar>
        <div slot="logo">logo</div>
        <div slot="content">content</div>
        <div slot="ustate">用户状态</div>
      </tab-bar>
    </div>
    <keep-alive>
      <router-view />
    </keep-alive>
  </div>
</template>
<script>
import TabBar from 'components/common/TabBar'
export default {
  name: 'app',
  components:{
    TabBar
  }
}
</script>
<style scoped>
@import 'assets/css/base.css';

.tx {
  color: var(--color-high-text);
}
</style>
