<template>
  <div class="category">{{ name }}</div>
</template>

<script>
export default {
  props: {},
  data() {
    let name = 'libai'
    return { name }
  },
  mounted() {
    console.log('luji')
  }
}
</script>
<style scoped>
.category {
  color: var(--color-high-text);
  font-size: 16px;
}
</style>
