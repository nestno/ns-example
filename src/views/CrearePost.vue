<template>
  <div>
    <validate-form-vue @form-submit="onSubmitFor">
      <div class="mb-3">
        <label
          for=""
          class="form-label"
        >标题：</label>
        <validate-input-vue
          :rules="titleRule"
          v-model="mTitle"
          placeholder="标题"
          type="text"
          tag="input"
        ></validate-input-vue>
      </div>

      <div class="mb-3">
        <label
          for=""
          class="form-label"
        >文章内容：</label>
        <validate-input-vue
          rows="10"
          v-model="mContent"
          placeholder="文章内容"
          tag="textarea"
        ></validate-input-vue>
      </div>
      <template #submit>
        <button class="btn btn-primary btn-large">
          发表文章
        </button>
      </template>
    </validate-form-vue>
  </div>
</template>
<script lang="ts">
import ValidateFormVue from '@/components/ValidateForm.vue'
import ValidateInputVue from '@/components/ValidateInput.vue'
import { defineComponent, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
import { RuleProp, GlobalDataProp, TestPosts } from '@/commons/interface'
export default defineComponent({
  name: 'Create',
  components: {
    ValidateFormVue,
    ValidateInputVue
  },
  setup() {
    const titleRule: RuleProp[] = [
      {
        type: 'require',
        message: '标题不能为空'
      },
      {
        type: 'length',
        message: '标题太长，请重新输写',
        max: 15
      }
    ]
    const mTitle = ref('')
    const mContent = ref('')
    const router = useRouter()
    const store = useStore<GlobalDataProp>()
    const onSubmitFor = (result: boolean) => {
      if (result) {
        const { columnId } = store.state.userInfo
        if (columnId) {
          const newPost: TestPosts = {
            id: new Date().getTime(),
            title: mTitle.value,
            columnId,
            content: mContent.value,
            createdAt: new Date().toLocaleString()
          }
          store.commit('createPost', newPost)
          router.push({ name: 'column', params: { id: columnId } })
        }
      }
    }
    return {
      onSubmitFor,
      mTitle,
      mContent,
      titleRule
    }
  }
})
</script>
