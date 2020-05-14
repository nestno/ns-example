<!-- 导航栏 -->
<template>
  <div class="tabbar">
    <div class="logo tabbar-item">
      <img :src="navdata.logo" alt="" v-if="navdata.logo" />
      <img alt="Vue logo" src="~assets/imgs/logo.png" v-else />
    </div>
    <div class="content tabbar-item">
      <router-link
        v-for="item in navdata.nav"
        :key="item.name"
        :to="item.url"
        class="nav-item"
        >{{ item.name }}</router-link
      >
    </div>
    <div class="ustate tabbar-item">
      <div v-if="!navdata.ustate">未登录</div>
      <div v-else>已登录</div>
    </div>
  </div>
</template>
<script>
//这里可以导入其他文件（比如：组件，工具js，第三方插件js，json文件，图片文件等等）
//例如：import 《组件名称》 from '《组件路径》'

export default {
  name: 'NavBar',
  //import引入的组件需要注入到对象中才能使用
  components: {},
  props: {
    navdata: {
      type: Object,
      default() {
        return {}
      }
    }
  },
  data() {
    //这里存放数据
    return {}
  },
  //监听属性 类似于data概念
  computed: {},
  //监控data中的数据变化
  watch: {},
  //方法集合
  methods: {},
  //生命周期 - 创建完成（可以访问当前this实例）
  created() {},
  //生命周期 - 挂载完成（可以访问DOM元素）",
  mounted() {
    console.log(this.navdata)
  },
  //生命周期 - 创建之前
  beforeCreate() {},
  //生命周期 - 挂载之前
  beforeMount() {},
  //生命周期 - 更新之前"
  beforeUpdate() {},
  //生命周期 - 更新之后
  updated() {},
  //生命周期 - 销毁之前
  beforeDestroy() {},
  //生命周期 - 销毁完成
  destroyed() {},
  //如果页面有keep-alive缓存功能，这个函数会触发
  activated() {}
}
</script>
<style scoped>
/*@import url(); 引入公共css类*/
.tabbar {
  display: flex;
  flex-flow: row;
  justify-content: center;
  font-size: 16px;
  height: 62px;
  line-height: 62px;
  background-color: #444444;
  color: #ffffff;
}
.logo {
  width: 20%;
  text-align: center;
  height: 62px;
}
.logo img {
  height: 60px;
}
.content {
  flex: 1;
  display: flex;
}
.content .nav-item {
  flex: 1;
  color: #ffffff;
  text-align: center;
}
.ustate {
  width: 20%;
}
.active {
  background-color: var(--color-high-background);
  color: #ffffff;
}
</style>
