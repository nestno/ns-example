<template>
  <div class="dropdown" ref="dropdownRef">
    <a href="#" class="btn btn-outline-light my-2 dropdown-toggle" @click.prevent="toggleOpen">你好 {{ title }}</a>
    <ul class="dropdown-menu" :style="{display:'block'}" v-if="isOpen">
      <slot></slot>
    </ul>
  </div>
</template>

<script lang="ts">
import {defineComponent, ref, watch} from "vue";
import useClickOutside from "@/hooks/useClickOutside";


export default defineComponent({
  name: "Dropdow",
  props: {
    title: {
      type: String,
      require: true
    }
  },
  setup() {
    const isOpen = ref(false)
    const toggleOpen = () => {
      isOpen.value = !isOpen.value
    }
    const dropdownRef = ref(null)
    const isClickOutside = useClickOutside(dropdownRef)
    watch(isClickOutside, () => {
      if (isClickOutside.value && isOpen.value) {
        isOpen.value = false;
      }
    })
    return {
      isOpen,
      toggleOpen,
      dropdownRef
    }
  }
})
</script>

<style scoped>

</style>
