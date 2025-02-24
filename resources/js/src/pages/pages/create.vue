<script setup>
    import { ref , watch , getCurrentInstance } from "vue";
    import Layout from '../../layouts/default.vue'
    import { QuillEditor } from '@vueup/vue-quill'
    import FileUpload from "../../components/FileUpload.vue";
    import TextArea from "../../components/TextArea.vue";
    import InputField from "../../components/InputField.vue";
    import Select2 from "../../components/Select2.vue";

    const { proxy } = getCurrentInstance();
    proxy.$SnapAlert.SnapOptions({
        duration : 5000,
        rtl : true ,
        position : 'top center'
    });

    const form = ref({
        name: "",
        content : '' ,
        slug : null,
        files: [],
    });

    const statuses = [
        { id : 'active' , value : 'فعال' } ,
        { id : 'inactive' , value : 'غير فعال' } ,
    ];


    const create = ()=>{
        proxy.$SnapAlert.success('نجاح', 'تم إضافة القسم بنجاح.');
    }


</script>

<template>
    <Layout>


        <div class="d-flex align-items-center pb-4 px-2">
            <i class="bx bx-detail sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الصفحات </span>
            <span class="px-2 fw-600 fs-5"> / </span>
            <span class="px-2 fw-600 fs-5 text-gray"> إنشاء صفحة جديدة </span>
        </div>


        <form @submit.prevent="create">
            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0">
                <div class="pb-3">
                    <InputField
                        v-model="form.name"
                        class="form-control-md me-4"
                        id="name" type="text"
                        :required="true"
                        label="عنوان الصفحة"
                        labelClass="text-primary-4"
                        placeholder="إكتب عنوان الصفحة" />
                </div>
                <div class="pb-3">
                    <InputField
                        v-model="form.slug"
                        class="form-control-md me-4"
                        id="name" type="text"
                        label="الرابط المخصص"
                        labelClass="text-primary-4"
                        placeholder="إكتب الرابط المخصص" />
                    <div class="d-flex justify-content-end align-items-center" dir="ltr">
                        <i class="bx bx-world ms-2 p-0"></i>
                        <div class="mt-1 fw-600">
                            <span>{{ 'https://example.com/' }}</span> <span class="text-warning">{{ form.slug != null && form.slug != '' ? form.slug :'{ title_academy-post }' }}</span>
                        </div>
                    </div>
                </div>




            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'التفاصيل' }}  <span class="text-primary2 ">*</span> </label>
                <div class="border border-2 rounded-2 overflow-hidden bg-white" dir="ltr">
                    <QuillEditor theme="snow" :options="{ height: 300 }" toolbar="full" v-model:content="form.content" content-type="html"></QuillEditor>
                </div>
            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <FileUpload
                    label="الفلاف"
                    :required="true"
                    v-model="form.files"
                />
            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <div>
                    <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'الحالة' }}   <span class="text-primary2 ">*</span> </label>
                    <Select2 v-model="form.status" defaultValue="0" :multiple="false" :options="statuses" placeholder="Choose an option" class="w-100 shadow-none border-2 border-gray2" style="padding:9px 20px" />
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-base px-5 py-2">{{ 'إضافة الى الصفحات' }}</button>
            </div>

        </form>

    </Layout>
</template>
