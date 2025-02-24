<script setup>
    import { ref , onMounted, computed } from 'vue';
    import Layout from '../../layouts/default.vue'
    import Select2 from "../../components/Select2.vue";

    const isMobile = ref(false);
    const selectdUsers = ref([]);

    const selectOptions = [
        { id : 'website-name' , value : 'إسم الموقع' } ,
        { id : 'client-name' , value : 'إسم العميل' } ,
    ];


    const websites= ref([
        {
            name : 'نجم العلم', client : 'سامي الشمري',
            logo : '/assets/images/demo/websites/logo-1.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
        {
            name : 'أفق الابتكار', client : 'ريم الفايد',
            logo : '/assets/images/demo/websites/logo-2.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
        {
            name : 'نور المعرفة', client : 'حسان الجابري',
            logo : '/assets/images/demo/websites/logo-3.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
        {
            name : 'إبداع المستقبل', client : 'نورا بن يوسف',
            logo : '/assets/images/demo/websites/logo-4.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
        {
            name : 'حلول متكاملة', client : 'خالد الصالح',
            logo : '/assets/images/demo/websites/logo-5.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
        {
            name : 'إشراقة فكر', client : 'هالة العابد',
            logo : '/assets/images/demo/websites/logo-6.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025', is_enable : true
        },
    ])

    const checkMobile = (limit = 600 ) => {
        if (document.documentElement.clientWidth <= limit) {
            return isMobile.value = true;
        } else {
            return isMobile.value = false;
        }
    }

    onMounted(() => {
        window.addEventListener('resize', function(){
            checkMobile(600)
        });
        checkMobile(600)
    });

    const toggleWebsiteStatus = (index) =>{
        websites.value[index].is_enable = !websites.value[index].is_enable
    }


</script>

<template>

    <Layout>

        <div class="d-flex align-items-center pb-4">
            <i class="bx bx-window-alt sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> المواقع </span>
        </div>

        <div class="row g-0 gx-xl-4 gx-lg-4 mx-2 mx-xl-0 mx-lg-0 flex-column-reverse flex-xl-row flex-lg-row">
            <div class="col-xl col-lg col-sm text-right mt-xl-0 mt-lg-0">
                <Select2 :Class="'bg-white w-100'" :style="'padding : 13px 20px'" v-model="selectedPeriod" :defaultValue="0" :prefixText="'ترتيب حسب'" :multiple="false" :options="selectOptions" placeholder="حدد توع البحث" />
            </div>
            <div class="col-12 col-xl-8 col-lg-8 mb-3 mb-xl-0 mb-lg-0">
                <div class="input-field">
                    <div class="field-sufix text-right">
                        <button class="btn search-btn me-2">
                            <i class="bx bx-search fs-4 p-0 m-0"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="إبحث بواسطة إسم العميل, رقم الهاتف, البريد الإلكتروني" name="" id="">
                </div>
            </div>
        </div>

        <div class="website-list py-4 px-2">
            <div v-if="!isMobile" v-for="(website , index) in websites" :key="index" class="bg-white website-item shadow-sm d-flex align-items-center justify-content-between justify-content-between mb-3">
                <div class="d-flex align-items-center">
                    <img :src="website.logo" alt="" class="website-image">
                    <div class="website-info ps-4">
                        <div class="website-name fs-5 fw-bold">{{ website.name }}</div>
                        <div class="website-url fw-600 text-secondary mt-1">{{ website.client }}</div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="fw-600 mb-3"> عدد السلع </div>
                    <div class="fw-600 text-primary2"> {{ website.products }} </div>
                </div>
                <div class="text-center">
                    <div class="fw-600 mb-3"> عدد الحجوزات </div>
                    <div class="fw-600 text-primary2"> {{ website.bookings }} </div>
                </div>
                <div class="text-center px-5">
                    <div class="fw-600 mb-3"> تاريخ إنشاء الموقع </div>
                    <div class="fw-600 text-primary2" dir="ltr"> {{ website.created_at }} </div>
                </div>

                <div class="text-center px-3 border-start mx-w-100px">
                    <button class="btn btn btn-danger rounded-2 px-4 d-flex me-0 mx-auto">
                        <i class="bx bx-trash bx-fix me-2"></i>
                        <span class="fw-600">حذف</span>
                    </button>
                    <div class="d-flex flex-row justify-content-between align-items-center px-0 mt-2 mx-auto">
                        <span :class="{ 'text-primary2' : website.is_enable , 'fw-600 d-flex ms-1 small' : true }">{{ website.is_enable ? 'مفعل' : 'غير مفعل' }}</span>
                        <div class="form-check form-switch mx-0 px-0" dir="ltr">
                            <input class="form-check-input"
                                type="checkbox"
                                role="switch"
                                :id="'website-enable-'+index"
                                :checked="website.is_enable"
                                @change="toggleWebsiteStatus(index)">
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="isMobile" v-for="(website , index) in websites" :key="index" class="bg-white website-item website-item-border shadow-none d-flex flex-column justify-content-between justify-content-between mb-3">
                <div class="d-flex align-items-center website-item-header">
                    <img :src="website.logo" alt="" class="website-image md rounded">
                    <div class="website-info ps-4">
                        <div class="website-name fs-6 fw-bold">{{ website.name }}</div>
                        <div class="website-url fw-600 text-secondary mt-1 small">{{ website.client }}</div>
                    </div>
                </div>
                <div class="text-center d-flex justify-content-between mt-4">
                    <div class="fw-600 mb-1 me-4"> عدد السلع </div>
                    <div class="fw-600 text-primary2"> {{ website.products }} </div>
                </div>
                <div class="text-center d-flex justify-content-between">
                    <div class="fw-600 mb-1 me-4"> عدد الحجوزات </div>
                    <div class="fw-600 text-primary2"> {{ website.bookings }} </div>
                </div>
                <div class="text-center d-flex justify-content-between">
                    <div class="fw-600 mb-1 me-4"> تاريخ إنشاء الموقع </div>
                    <div class="fw-600 text-primary2" dir="ltr"> {{ website.created_at }} </div>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center mt-3 border-top pt-3">
                    <button class="btn btn btn-sm btn-danger rounded-2 px-3 d-flex me-0">
                        <i class="bx bx-trash bx-fix me-2"></i>
                        <span class="fw-600">حذف</span>
                    </button>
                    <div class="d-flex flex-row justify-content-between align-items-center px-0 mt-2 ms-auto">
                        <span :class="{ 'text-primary2' : website.is_enable , 'fw-600 d-flex ms-1 small' : true }">{{ website.is_enable ? 'مفعل' : 'غير مفعل' }}</span>
                        <div class="form-check form-switch px-0 ms-5" dir="ltr">
                            <input class="form-check-input"
                                type="checkbox"
                                role="switch"
                                :id="'website-enable-'+index"
                                :checked="website.is_enable"
                                @change="toggleWebsiteStatus(index)">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </Layout>

</template>
