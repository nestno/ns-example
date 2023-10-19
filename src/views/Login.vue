<template>
  <div>
    <validate-form @form-submit="onSubmitForm">
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <validate-input
          :rules="emailRule"
          v-model="mValue"
          placeholder="请输入邮箱地址"
          type="text"
        ></validate-input>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <validate-input
          :rules="passwordRule"
          v-model="mPassword"
          placeholder="请输密码"
          type="password"
        ></validate-input>
      </div>
      <template #submit>
        <span class="btn btn-danger">提交</span>
      </template>
    </validate-form>
  </div>
</template>
<script lang="ts">
import { defineComponent, ref } from 'vue'
import ValidateForm from '@/components/ValidateForm.vue'
import ValidateInput from '@/components/ValidateInput.vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
import { RuleProp, GlobalDataProp } from '@/commons/interface'

export default defineComponent({
  name: 'Login',
  components: {
    ValidateForm,
    ValidateInput
  },
  setup() {
    const emailRule: RuleProp[] = [
      {
        type: 'require',
        message: '邮箱不能为空'
      },
      {
        type: 'email',
        message: '输入的邮箱格式不对'
      }
    ]
    const passwordRule: RuleProp[] = [{ type: 'require', message: '密码不能为空' }]
    const mValue = ref('')
    const mPassword = ref('')
    const router = useRouter()
    const store = useStore<GlobalDataProp>()
    const onSubmitForm = (result: boolean) => {
      if (result) {
        router.push('/')
        store.commit('login')
      }
    }
    return {
      mValue,
      mPassword,
      onSubmitForm,
      passwordRule,
      emailRule
    }
  }
})
</script>
