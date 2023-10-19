<template>
  <div class="validate-form-container">
    <slot></slot>
    <div
      class="submit-area"
      @click.prevent="submitForm"
    >
      <slot name="submit">
        <span class="btn btn-primary">提交</span>
      </slot>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, onUnmounted } from 'vue'
import mitt from 'mitt'

export const emitter = mitt()
type validateFunc = () => boolean
export default defineComponent({
  name: 'ValidateForm',
  emits: ['form-submit'],
  setup(props, context) {
    const funcArr: validateFunc[] = []
    const submitForm = () => {
      const result = funcArr.map((func) => func()).every((result) => result)
      context.emit('form-submit', result)
    }
    const callback = (func?: validateFunc) => {
      if (func) {
        funcArr.push(func)
      }
    }
    emitter.on('form-item-created', callback)
    onUnmounted(() => {
      emitter.off('form-item-created', callback)
    })
    return {
      submitForm
    }
  }
})
</script>

<style scoped></style>
