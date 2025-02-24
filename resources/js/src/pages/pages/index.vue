<script setup>
    import { ref } from "vue";
    import Layout from '../../layouts/default.vue'

    const pages = ref([
        {
            id : 10001 , date : '11/02/2025 12:07 AM' , status : 'active',
            title : 'عنوان صفحة رقم 1' ,
            image: '/assets/images/demo/academy/post-01.jpg',
        },
        {
            id : 10002 , date : '23/01/2025 09:22 PM' , status : 'inactive',
            title : 'عنوان صفحة رقم 2' ,
            image: null,
        },
        {
            id : 10003 , date : '20/01/2025 4:02 PM' , status : 'active',
            title : 'عنوان صفحة رقم 3' ,
            image: '/assets/images/demo/academy/post-02.jpg',
        },
        {
            id : 10004 , date : '15/01/2025 03:55 PM' , status : 'inactive',
            title : 'عنوان صفحة رقم 4' ,
            image: '/assets/images/demo/academy/post-03.jpg',
        },
        {
            id : 10005 , date : '30/12/2024 11:40 AM' , status : 'active',
            title : 'عنوان صفحة رقم 5' ,
            image: '/assets/images/demo/academy/post-04.jpg',
        },
        {
            id : 10006 , date : '25/11/2024 9:30 AM' , status : 'inactive',
            title : 'عنوان صفحة رقم 6' ,
            image: null,
        },

    ]);



</script>

<template>
    <Layout>
        <div class="d-flex align-items-center pb-4 px-3">
            <i class="bx bx-detail sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الصفحات </span>
        </div>

        <div class="mb-4 px-2">
            <div class="input-field">
                <div class="field-sufix text-right">
                    <button class="btn search-btn me-2">
                        <i class="bx bx-search fs-4 p-0 m-0"></i>
                    </button>
                </div>
                <input type="text" placeholder="إبحث بواسطة حسب العنوان" name="" id="">
            </div>
        </div>

        <div class="post-list">
            <div class="row g-0 g-xl-0 gx-lg-0 gx-md-0">
                <div class="col-12 col-xl-4 col-lg-4 col-md-6" v-for="(page , index) in pages" :key="page.id">
                    <div class="s-card p-3 m-2 pb-4">
                        <div class="image-cover" :style="{ backgroundImage: `url(${page.image??'/assets/images/demo/academy/blank.png'})` }">

                        </div>
                        <div class="px-2">
                            <div class="fw-bold fs-6 pt-3">{{ page.title }}</div>
                            <div class="d-flex mt-3">
                                <span v-if="page.status === 'active'" class="badge badge-outlined badge-primary me-4">{{ 'فعال' }}</span>
                                <span v-if="page.status === 'inactive'" class="badge badge-outlined badge-danger me-4">{{ 'غير فعال' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>

</template>
