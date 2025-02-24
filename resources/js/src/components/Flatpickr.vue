<script setup>
import { ref, onMounted, watch } from 'vue';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

const props = defineProps({
    modelValue: String, // Bind to v-model
    options: Object,
    id: {
      type: String,
      default: "input-date"
    },
    label: {
      type: String,
      default: null
    },
    placeholder: {
      type: String,
      default: "Enter Date"
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
    inputClass : {
        type : String ,
        default : ''
    }
});

const emit = defineEmits(['update:modelValue']);
const input = ref(null);
let fp = null;

onMounted(() => {
  fp = flatpickr(input.value, {
    ...props.options,
    defaultDate: props.modelValue,
    onChange: (selectedDates, dateStr) => {
      emit('update:modelValue', dateStr);
    }
  });
});

// Watch for changes in modelValue and update Flatpickr
watch(() => props.modelValue, (newValue) => {
  if (fp) fp.setDate(newValue, false);
});
</script>

<template>
    <div dir="ltr" :class="['form-group text-primary-4',inputClass,'text-start']">
        <label v-if="label" dir="rtl" :for="id" :class="['form-label fw-600 text-start ps-0',labelClass]">{{ label }}  <span v-if="required" class="text-primary2 ">*</span> </label>
        <input ref="input" type="text" :placeholder="placeholder" :class="['flatpickr-input form-control text-start border-2 shadow-none py-2 fw-200 fs-16px text-start fw-600',inputClass]" />
    </div>
</template>
