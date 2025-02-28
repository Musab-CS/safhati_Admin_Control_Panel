<script setup>
    import { getCurrentInstance, ref , watch } from "vue";
    import Layout from '../../layouts/default.vue'
    import { QuillEditor } from '@vueup/vue-quill'
    import Flatpickr from '../../components/Flatpickr.vue';
    import FileUpload from "../../components/FileUpload.vue";
    import InputField from "../../components/InputField.vue";
    import Select2 from "../../components/Select2.vue";
    import axios from "axios";

    const { proxy } = getCurrentInstance();
    proxy.$SnapAlert.SnapOptions({
        duration : 5000,
        rtl : true ,
        position : 'top center'
    });


    const selectedDate = ref('');
    const status = ref('');


    const form = ref({
        name: null,
        slug: null,
        category: null,
        content : '' ,
        image: null,

        date_at : null ,
        status : null,
    });

    const message = ref("");

    const categories = [
        { id : 'none' , value : 'لايوجد' } ,
        { id : 1 , value : 'قسم 1' } ,
        { id : 2 , value : 'قسم 2' } ,
        { id : 3 , value : 'قسم 3' } ,
        { id : 4 , value : 'قسم 4' } ,
        { id : 5 , value : 'قسم 5' } ,
    ];

    const statuses = [
        { id : 'publish' , value : 'منشور' } ,
        { id : 'pending' , value : 'في إنتظار النشر' } ,
        { id : 'draft' , value : 'مسودة' } ,
        { id : 'trash' , value : 'سلة الحذف' } ,
    ];


    watch( status , (value) => {
        form.value.status = status.value?.id
    } )


    const submitForm = async () => {
        try {
            console.log(form.value)
            const formData = new FormData();
            formData.append("title", form.value.name);
            formData.append("slug", form.value.slug??null);
            formData.append("category", form.value.category?.id);
            formData.append("body", form.value.content?.id);
            formData.append("image", form.value.image.length > 0 ? form.value.image[0] : null);

            formData.append("date_at", form.value.date_at);
            formData.append("status", form.value.status?.id);

            const response = await axios.post("https://admin.website.test/api/academy/create", formData, {
                headers: { "Content-Type": "multipart/form-data" },
            });

            message.value = "Upload successful!";
            console.log("Response:", response.data);
        } catch (error) {
            message.value = "Upload failed!";
            console.error("Error:", error.response?.data);
        }
    };

    const create = ()=>{
        proxy.$SnapAlert.success('نجاح', 'تم إضافة القسم بنجاح.');
    }



</script>

<template>
    <Layout>


        <div class="d-flex align-items-center pb-4 px-2">
            <i class="bx bx-wallet sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الأكاديمية </span>
        </div>


        <form @submit.prevent="submitForm">
            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0">

                <div class="pb-3">
                    <InputField
                        v-model="form.name"
                        class="form-control-md me-4"
                        id="name" type="text"
                        :required="true"
                        label="العنوان"
                        labelClass="text-primary-4"
                        placeholder="إكتب العنوان" />
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

                <div class="pb-0">
                    <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'القسم' }} </label>
                    <Select2 v-model="form.category" defaultValue="0" :multiple="false" :options="categories" placeholder="Choose an option" class="w-100 shadow-none border-2 border-gray2" style="padding:12px 20px" />
                </div>


            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'المحتوى' }}  <span class="text-primary2 ">*</span> </label>
                <div class="border border-2 rounded-2 overflow-hidden bg-white" dir="ltr">
                    <QuillEditor theme="snow" :options="{ height: 300 }" toolbar="full" v-model:content="form.content" content-type="html"></QuillEditor>
                </div>
            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <FileUpload
                    label="الغلاف"
                    :required="true"
                    v-model="form.image"
                />
            </div>

            <div class="s-card p-3 px-xl-5 px-lg-5 py-5 mx-2 mx-xl-0 mx-lg-0 mt-4">
                <div class="row gx-4 gy-4">
                    <div class="col">
                        <Flatpickr
                            label="تاريخ النشر"
                            placeholder="إختر تاريخ النشر"
                            v-model="form.date_at"
                            inputClass="border-2"
                            required="true"
                            :options="{ enableTime: true, dateFormat: 'd/m/Y H:i' }"
                        />

                    </div>
                    <div class="col">
                        <div>
                            <label for="status" :class="['form-label fw-600 text-primary-4']">{{ 'الحالة' }}   <span class="text-primary2 ">*</span> </label>
                            <Select2 v-model="form.status" defaultValue="0" :multiple="false" :options="statuses" placeholder="Choose an option" class="w-100 shadow-none border-2 border-gray2" style="padding:9px 20px" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-base px-5 py-2">{{ 'إضافة الى الأكاديمية' }}</button>
            </div>

            {{ form }}

        </form>

    </Layout>
</template>
