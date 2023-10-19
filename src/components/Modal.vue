<template>
  <teleport to="#modal">
    <div id="center" v-if="isOpen">
      <h2><slot>this a modal</slot></h2>
      <button @click="closeModal">close</button>
    </div>
  </teleport>
</template>
<script lang="ts">
import { defineComponent} from 'vue';

export default defineComponent({
  props: {
    isOpen: {
      type: Boolean
    }
  },
  emits: {
    'close-modal': null
  },
  setup(props, context) {
    const closeModal = () => {
      context.emit('close-modal');
    };
    return {
      closeModal
    };
  }
})
</script>
<style scoped>
#center {
  position: fixed;
  left: 50%;
  top: 50%;
  margin-top:-100px;
  margin-left:-100px;
  width:200px;
  height:200px;
  background-color:red;
}
</style>
