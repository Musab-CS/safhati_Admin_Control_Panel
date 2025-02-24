<script setup>
import { defineProps, defineEmits } from "vue";
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

// Register plugins
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview , FilePondPluginFileValidateSize);

const props = defineProps({
    modelValue : Object ,
    minFileSize: {
      type: String,
      default: "1KB"
    },
    maxFileSize: {
      type: String,
      default: "2MB"
    },
    maxFile: {
      type: Number,
      default: 5
    },

    multible: {
      type: Boolean,
      default: false
    },
    label: {
      type: String,
      default: null
    },
    required: {
      type: Boolean,
      default: false
    },

});
const emit = defineEmits(["update:modelValue"]);

const handleFileUpdate = (fileItems) => {
  emit("update:modelValue", fileItems.map(fileItem => fileItem.file));
};
</script>

<template>
  <div class="mb-3">
    <label v-if="label" :for="id" :class="['form-label fw-600',labelClass]">{{ label }}  <span v-if="required" class="text-primary2 ">*</span> </label>
    <FilePond v-if="multible"
        :files="modelValue"
        allowMultiple
        allowDrop
        allowPaste
        :maxFiles="maxFile"
        allowReplace
        :minFileSize="minFileSize"
        :maxFileSize="maxFileSize"
        acceptedFileTypes="image/*"

        labelIdle='إسحب وافلت ملفك هنا او  <span class="filepond--label-action"> تصفح </span>'

        @updatefiles="handleFileUpdate"
    />
    <FilePond v-if="!multible"
        :files="modelValue"
        allowDrop
        allowPaste
        allowReplace
        :minFileSize="minFileSize"
        :maxFileSize="maxFileSize"
        acceptedFileTypes="image/*"

        labelIdle='إسحب وافلت ملفك هنا او  <span class="filepond--label-action"> تصفح </span>'


        @updatefiles="handleFileUpdate"
    />

  </div>
</template>
