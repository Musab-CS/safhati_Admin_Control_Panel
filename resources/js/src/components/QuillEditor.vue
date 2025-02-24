<template>
    <div dir="ltr">
        <QuillEditor theme="snow" :options="{ height: 300 }" toolbar="full" v-model:content="content" content-type="html"></QuillEditor>
    </div>
</template>

  <script setup>
    import { ref } from "vue";
    import { QuillEditor } from '@vueup/vue-quill'
    import '@vueup/vue-quill/dist/vue-quill.snow.css';

    const content = ref("");
  </script>
