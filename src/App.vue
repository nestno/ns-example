<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Home</router-link>
      |
      <router-link to="/about">About</router-link>
      |
      <router-link to="/category">category</router-link>
    </div>
    <keep-alive>
      <router-view />
    </keep-alive>
  </div>
</template>
<script></script>
<style scoped>
@import 'assets/css/base.css';

.tx {
  color: var(--color-high-text);
}
</style>
