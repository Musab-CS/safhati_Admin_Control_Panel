<script setup>
    import { ref, onMounted, computed } from "vue";
    import Layout from '../../layouts/default.vue'
    import Select2 from "../../components/Select2.vue";


    const isMobile = ref(false);
    const type = ref();

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


    const types = [
        { id : 'payment' , value : 'خدمات الدفع' } ,
        { id : 'shipping' , value : 'خدمات الشحن والتوصيل' } ,
        { id : 'support' , value : 'خدمات مساندة لدعم موقعك' } ,
    ];

    const orders = [
        { id : 'title' , value : 'العنوان' } ,
        { id : 'date' , value : 'التاريخ' } ,
    ];

    const OrderBy = ref();


    const applications = ref([
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 1' , plans : ['المتقدمة'] ,
            image: '/assets/images/demo/applications/show/01.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الشحن والتوصيل',
            name : 'تطبيق منظومة رقم 2' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/02.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 3' , plans : ['المتقدمة'] ,
            image: '/assets/images/demo/applications/show/03.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 4' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/04.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الشحن والتوصيل',
            name : 'تطبيق منظومة رقم 5' , plans : ['المجانية'] ,
            image: '/assets/images/demo/applications/show/05.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 6' , plans : ['المتقدمة'] ,
            image: '/assets/images/demo/applications/show/06.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 7' , plans : ['المتقدمة','الاساسية'] ,
            image: '/assets/images/demo/applications/show/07.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الشحن والتوصيل',
            name : 'تطبيق منظومة رقم 8' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/08.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 9' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/09.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات مساندة لدعم موقعك',
            name : 'تطبيق منظومة رقم 10' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/10.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 11' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/11.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات مساندة لدعم موقعك',
            name : 'تطبيق منظومة رقم 12' , plans : [,'المتقدمة'] ,
            image: '/assets/images/demo/applications/show/12.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات الدفع',
            name : 'تطبيق منظومة رقم 13' , plans : ['المجانية','الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/13.png',
        },
        {
            id : 10001 , status : true , type : 'خدمات مساندة لدعم موقعك',
            name : 'تطبيق منظومة رقم 14' , plans : ['الاساسية','المتقدمة'] ,
            image: '/assets/images/demo/applications/show/14.png',
        }
    ]);



</script>

<template>
    <Layout>
        <div class="d-flex align-items-center pb-4 px-3">
            <i class="bx bx-category-alt sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> المنظومة </span>
        </div>

        <div class="row g-0 gx-xl-4 gx-lg-4 mx-2 mx-xl-0 mx-lg-0 flex-column flex-xl-row flex-lg-row mb-4">
            <div class="col-12 col-xl-8 col-lg-8 mb-3 mb-xl-0 mb-lg-0">
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
                <Select2 :Class="'bg-white w-100'" :style="'padding : 13px 20px'" v-model="type" :defaultValue="0" :prefixText="'عرض حسب'" :multiple="false" :options="types" placeholder="حدد القسم" />
            </div>
        </div>

        <div class="website-list py-4 px-2">
            <div v-if="!isMobile" v-for="(application , index) in applications" :key="index" class="bg-white website-item shadow-sm d-flex align-items-center justify-content-between justify-content-between mb-3">
                <div class="d-flex align-items-center mx-w-300px">
                    <img :src="application.image" alt="" class="website-image">
                    <div class="website-info ps-4">
                        <div class="website-name fs-6 fw-bold">{{ application.name }}</div>
                    </div>
                </div>
                <div class="text-start">
                    <div class="fw-600 mb-3"> نوع المنظومة </div>
                    <div class="fw-600 text-primary2"> {{ application.type }} </div>
                </div>
                <div class="text-start">
                    <div class="fw-600 mb-3"> الباقات المتاحة </div>
                    <div class="fw-600 text-primary2">
                        <span v-if="application.plans?.length > 0" v-for="(plan , index) in application.plans" class="badge badge-outlined badge-primary ms-2">{{ plan }}</span>
                        <span v-if="application.plans.length == 0" >{{ 'N/A' }}</span>
                    </div>
                </div>
                <div class="text-center px-3 border-start mx-w-100px">
                    <button class="btn btn btn-danger rounded-2 px-4 d-flex me-0 mx-auto">
                        <i class="bx bx-trash bx-fix me-2"></i>
                        <span class="fw-600">حذف</span>
                    </button>
                    <div class="d-flex flex-row justify-content-between align-items-center px-0 mt-2 mx-auto">
                        <span :class="{ 'text-primary2' : application.status , 'fw-600 d-flex ms-1 small' : true }">{{ application.status ? 'مفعل' : 'غير مفعل' }}</span>
                        <div class="form-check form-switch mx-0 px-0" dir="ltr">
                            <input class="form-check-input"
                                type="checkbox"
                                role="switch"
                                :id="'website-enable-'+index"
                                :checked="application.status"
                                @change="toggleapplicationstatus(index)">
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="isMobile" v-for="(application , index) in applications" :key="index" class="bg-white website-item website-item-border shadow-none d-flex flex-column justify-content-between justify-content-between mb-3">
                <div class="d-flex align-items-center website-item-header">
                    <img :src="application.image" alt="" class="website-image md rounded">
                    <div class="website-info ps-4">
                        <div class="website-name fs-5 fw-bold">{{ application.name }}</div>
                    </div>
                </div>
                <div class="text-center d-flex justify-content-between mt-4">
                    <div class="fw-600 mb-3"> نوع المنظومة </div>
                    <div class="fw-600 text-primary2"> {{ application.type }} </div>
                </div>
                <div class="text-center d-flex justify-content-between">
                    <div class="fw-600 mb-3"> الباقات المتاحة </div>
                    <div class="fw-600 text-primary2">
                        <span v-if="application.plans?.length > 0" v-for="(plan , index) in application.plans" class="badge badge-outlined badge-primary ms-2">{{ plan }}</span>
                        <span v-if="application.plans.length == 0" >{{ 'N/A' }}</span>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center mt-3 border-top pt-3">
                    <button class="btn btn btn-sm btn-danger rounded-2 px-3 d-flex me-0">
                        <i class="bx bx-trash bx-fix me-2"></i>
                        <span class="fw-600">حذف</span>
                    </button>
                    <div class="d-flex flex-row justify-content-between align-items-center px-0 mt-2 ms-auto">
                        <span :class="{ 'text-primary2' : application.status , 'fw-600 d-flex ms-1 small' : true }">{{ application.status ? 'مفعل' : 'غير مفعل' }}</span>
                        <div class="form-check form-switch px-0 ms-5" dir="ltr">
                            <input class="form-check-input"
                                type="checkbox"
                                role="switch"
                                :id="'website-enable-'+index"
                                :checked="application.status"
                                @change="toggleapplicationstatus(index)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>

</template>
