<script setup>
    import { ref } from "vue";
    import Layout from '../../layouts/default.vue'
    import QuillEditor from "../../components/QuillEditor.vue";
    import Flatpickr from '../../components/Flatpickr.vue';
    import FileUpload from "../../components/FileUpload.vue";
    import Select2 from "../../components/Select2.vue";


    const categories = [
        { id : 'all' , value : 'كل الأقسام' } ,
        { id : 1 , value : 'قسم 1' } ,
        { id : 2 , value : 'قسم 2' } ,
        { id : 3 , value : 'قسم 3' } ,
        { id : 4 , value : 'قسم 4' } ,
        { id : 5 , value : 'قسم 5' } ,
    ];

    const orders = [
        { id : 'title' , value : 'العنوان' } ,
        { id : 'date' , value : 'التاريخ' } ,
    ];

    const category = ref();
    const OrderBy = ref();


    const posts = ref([
        {
            id : 10001 , date : '11/02/2025 12:07 AM' , category_name : 'قسم 1',
            title : 'منشور اكاديمية رقم 1' ,
            image: '/assets/images/demo/academy/post-01.jpg',
        },
        {
            id : 10002 , date : '23/01/2025 09:22 PM' , category_name : 'قسم 1',
            title : 'منشور اكاديمية رقم 2' ,
            image: null,
        },
        {
            id : 10003 , date : '20/01/2025 4:02 PM' , category_name : 'قسم 5',
            title : 'منشور اكاديمية رقم 3' ,
            image: '/assets/images/demo/academy/post-02.jpg',
        },
        {
            id : 10004 , date : '15/01/2025 03:55 PM' , category_name : 'قسم 2',
            title : 'منشور اكاديمية رقم 4' ,
            image: '/assets/images/demo/academy/post-03.jpg',
        },
        {
            id : 10005 , date : '30/12/2024 11:40 AM' , category_name : 'قسم 3',
            title : 'منشور اكاديمية رقم 5' ,
            image: '/assets/images/demo/academy/post-04.jpg',
        },
        {
            id : 10006 , date : '25/11/2024 9:30 AM' , category_name : '',
            title : 'منشور اكاديمية رقم 6' ,
            image: null,
        },

    ]);



</script>

<template>
    <Layout>
        <div class="d-flex align-items-center pb-4 px-3">
            <i class="bx bx-news sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الأكاديمية </span>
        </div>

        <div class="row g-0 gx-xl-4 gx-lg-4 mx-2 mx-xl-0 mx-lg-0 flex-column flex-xl-row flex-lg-row mb-4">
            <div class="col-12 col-xl-6 col-lg-6 mb-3 mb-xl-0 mb-lg-0">
                <div class="input-field">
                    <div class="field-sufix text-right">
                        <button class="btn search-btn me-2">
                            <i class="bx bx-search fs-4 p-0 m-0"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="إبحث بواسطة حسب العنوان" name="" id="">
                </div>
            </div>

            <div class="col-xl col-lg col-sm text-right mt-xl-0 mt-lg-0">
                <Select2 :Class="'bg-white w-100'" :style="'padding : 13px 20px'" v-model="category" :defaultValue="0" :prefixText="'عرض حسب'" :multiple="false" :options="categories" placeholder="حدد القسم" />
            </div>
            <div class="col-xl col-lg col-sm text-right mt-xl-0 mt-lg-0 mt-3 mt-xl-0">
                <Select2 :Class="'bg-white w-100'" :style="'padding : 13px 20px'" v-model="OrderBy" :defaultValue="1" :prefixText="'ترتيب حسب'" :multiple="false" :options="orders" placeholder="حدد القسم" />
            </div>
        </div>

        <div class="post-list">
            <div class="row g-0 g-xl-0 gx-lg-0 gx-md-0">
                <div class="col-12 col-xl-4 col-lg-4 col-md-6" v-for="(post , index) in posts" :key="post.id">
                    <div class="s-card p-3 m-2 pb-4">
                        <div class="image-cover" :style="{ backgroundImage: `url(${post.image??'/assets/images/demo/academy/blank.png'})` }">

                        </div>
                        <div class="px-2">
                            <div class="fw-bold fs-6 pt-3">{{ post.title }}</div>
                            <div class="d-flex mt-3">
                                <span class="badge badge-outlined badge-primary me-4">{{ post.category_name }}</span>
                                <span class="small fw-600" dir="ltr">{{ post.date }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>

</template>
