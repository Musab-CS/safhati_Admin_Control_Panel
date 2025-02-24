<script setup>
import { ref, onMounted, watch, defineProps, defineEmits } from "vue";

const props = defineProps({
  modelValue: [String, Number, Array , Object], // Support for v-model
  options: Array, // Array of options
  placeholder: String,
  prefixText: String,
  defaultValue : Number ,
  multiple: Boolean,
  style: String,
  Class : String ,
});

const emit = defineEmits(["update:modelValue"]);

const selectRef = ref(props.multiple ? [] : null);
const toggleSelect = ref(false);

const handleSelect = (option) => {
  if (props.multiple) {
    if (selectRef.value.includes(option)) {
        selectRef.value = (option.id ? selectRef.value.filter((item) => item.id !== option.id) : selectRef.value.filter((item) => item !== option));
    } else {
      selectRef.value.push(option);
    }
  } else {
    selectRef.value = option;
    toggleSelect.value = false;
  }
  emit("update:modelValue", selectRef.value);
};

const checkSelect = (option) => {
  if (props.multiple) {
    return selectRef.value.includes(option);
  } else {
    if (selectRef.value && selectRef.value?.id) {
        return selectRef.value?.id === option?.id;
    }else{
        return selectRef.value === option;
    }
  }
};

onMounted(() => {
    if (props.defaultValue >= 0) {
        selectRef.value = props.options[props.defaultValue];
    }
});

watch(() => props.modelValue, (newValue) => {

});
</script>

<template>

<div :class="'select-s-container ' + Class " :style="style" :display="toggleSelect" v-click-away="()=> toggleSelect=false ">
    <div class="select-s-value" @click="toggleSelect=!toggleSelect">
        <span v-if="prefixText" class="select-prefix-text">
            {{ prefixText }}
        </span>
        <div class="d-flex flex-wrap" v-if="Array.isArray(selectRef)">
            <span v-if="selectRef.length>0" v-for="(option , index) in selectRef" class="option-s-tag">
                {{ option.id?(option.value??option.id): option }}
            </span>
            <span v-if="selectRef.length==0">
                {{ placeholder??'Select Optins' }}
            </span>
        </div>
        <span v-if="!Array.isArray(selectRef)" :class="{ 'fw-600' : selectRef }">
            {{ selectRef?( selectRef.id? selectRef.value :  selectRef):(placeholder??'Select Optins') }}
        </span>
    </div>
    <div class="select-s-options">
        <div v-for="(option , index) in options"  :class="['select-s-option ' , (checkSelect(option.id?option:option)?'selected':'') ] " @click="handleSelect(option.id?option:option)">
            <span>{{ option.value??(option.id??option) }}</span>
        </div>
    </div>
  </div>

</template>

<style scoped>
/* Optional custom styles */
</style>
