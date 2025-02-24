<template>
    <div class="mb-3">
      <label v-if="label" :for="id" :class="['form-label fw-600',labelClass]">{{ label }}  <span v-if="required" class="text-primary2 ">*</span> </label>
      <input
        :type="type"
        class="form-control text-start border-2 shadow-none py-2 fw-200 fs-16px"
        :id="id"
        :placeholder="placeholder"
        :value="modelValue"
        :disabled="disabled"
        :required="required"
        @input="$emit('update:modelValue', $event.target.value)"
      >
    </div>
</template>

<script setup>
  defineProps({
    id: {
      type: String,
      default: "input-field"
    },
    type: {
      type: String,
      default: "text" // Can be 'email', 'password', 'number', etc.
    },
    label: {
      type: String,
      default: null
    },
    placeholder: {
      type: String,
      default: "Enter value"
    },
    disabled: {
      type: Boolean,
      default: false
    },
    required: {
      type: Boolean,
      default: false
    },
    labelClass : {
        type : String ,
        default : ''
    },
    modelValue: [String, Number , Boolean]
  });

  defineEmits(["update:modelValue"]);
</script>
