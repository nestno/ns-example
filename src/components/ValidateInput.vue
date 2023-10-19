<template>
  <div class="validate-input-container pd-3">
    <input
      v-if="tag !== 'textarea'"
      class="form-control"
      :class="{ 'is-invalid': inputRef.error }"
      :value="inputRef.val"
      @blur="validateInput"
      @input="updateValue"
      v-bind="$attrs"
    />
    <textarea
      v-else
      class="form-control"
      :class="{ 'is-invalid': inputRef.error }"
      :value="inputRef.val"
      @blur="validateInput"
      @input="updateValue"
      v-bind="$attrs"
    >
    </textarea>
    <span
      class="invalid-feedback"
      v-if="inputRef.error"
    >{{
      inputRef.message
    }}</span>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType, reactive, onMounted } from 'vue'
import { emitter } from './ValidateForm.vue'
import { RuleProp } from '@/commons/interface'
export type RulesProp = RuleProp[]
export type TagType = 'input' | 'textarea'
export default defineComponent({
  name: 'ValidateInput',
  props: {
    rules: Array as PropType<RulesProp>,
    modelValue: String,
    tag: {
      type: String as PropType<TagType>,
      default: 'input'
    }
  },
  inheritAttrs: false,
  setup(props, context) {
    const inputRef = reactive({
      val: props.modelValue || '',
      error: false,
      message: ''
    })
    const validateInput = () => {
      if (props.rules) {
        const emailReg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/
        const allPassed = props.rules.every((rule) => {
          let passed = true
          switch (rule.type) {
            case 'require':
              passed = inputRef.val !== ''
              inputRef.message = rule.message
              break
            case 'email':
              passed = emailReg.test(inputRef.val)
              inputRef.message = rule.message
              break
            case 'length':
              console.log(rule.max)
              if (rule.max) {
                passed = inputRef.val.length <= rule.max
              }
              if (rule.min) {
                passed = inputRef.val.length >= rule.min
              }
              if (rule.max && rule.min) {
                passed = inputRef.val.length >= rule.min && inputRef.val.length <= rule.max
              }
              inputRef.message = rule.message
              break
            default:
              break
          }
          return passed
        })
        inputRef.error = !allPassed
        return allPassed
      }
      return true
    }
    const updateValue = (e: KeyboardEvent) => {
      const targetValue = (e.target as HTMLInputElement).value
      inputRef.val = targetValue
      context.emit('update:modelValue', targetValue)
    }
    onMounted(() => {
      emitter.emit('form-item-created', validateInput)
    })
    return {
      inputRef,
      validateInput,
      updateValue
    }
  }
})
</script>
