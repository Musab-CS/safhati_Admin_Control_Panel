<script setup>
    import { ref, defineProps, defineEmits, watch, getCurrentInstance } from "vue";
    import {router} from '@inertiajs/vue3'
    import InputField from '../../../components/InputField.vue'
    import Select2 from '../../../components/Select2.vue'
    const emit = defineEmits(["update:modelValue"]);

    const { proxy } = getCurrentInstance();

    proxy.$SnapAlert.SnapOptions({
        duration : 5000,
        rtl : true ,
        position : 'top center'
    });

    const statuses = [
        { id : 'active' , value : 'نشط' } ,
        { id : 'inactive' , value : 'غير نشط' } ,
    ];

    const status = ref('active');

    const form = ref({
        name : null ,
        status : 'active' ,
    });

    watch( status , (value) => {
        form.value.status = status.value?.id
    } )

    const closeModal = () => {
        proxy.$SnapAlert.success('نجاح', 'تم إضافة القسم بنجاح.');
        router.visit('/academy/category')
    };

    const create = ()=>{
        closeModal();
    }

</script>

<template>

    <form @submit.prevent="create" class="px-2">

        <div class="pb-3">
            <InputField v-model="form.name" class="form-control-md me-4" id="name" type="text" :required="true" label="عنوان القسم" labelClass="text-primary-4" placeholder="إكتب عنوان القسم" />
        </div>

        <div class="pb-3">
            <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'الحالة' }}  <span class="text-primary2 ">*</span> </label>
            <Select2 v-model="status" defaultValue="0" :multiple="false" :options="statuses" placeholder="Choose an option" class="w-100 shadow-none border-2 border-gray2" style="padding:12px 20px" />
        </div>

        <button type="submit" class="btn btn-primary mx-w-600px py-2 fw-600">

            {{ 'حفظ وإضافة' }}
        </button>

    </form>

</template>
