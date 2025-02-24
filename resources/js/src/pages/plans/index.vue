<script setup>
    import { ref , onMounted, computed } from 'vue';
    import Layout from '../../layouts/default.vue'
    import Modal from "../../components/Modal.vue";
    import Details from "./show.vue";

    const isMobile = ref(false);

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

    const plans = ref([
        {
            name : 'الباقة المجانية' , options : [
                { type : 'شهري' , duration : '1', price : 0 , enable : true } ,
                { type : 'سنوي' , duration : '1', price : 0 , enable : false } ,
            ]
        },
        {
            name : 'الباقة الاساسية' , options : [
                { type : 'شهري' , duration : '1', price : 200 , enable : true } ,
                { type : 'سنوي' , duration : '1', price : 2100 , enable : true } ,
            ]
        },
        {
            name : 'الباقة المتقدمة' , options : [
                { type : 'شهري' , duration : '1', price : 300 , enable : true } ,
                { type : 'سنوي' , duration : '1', price : 3000 , enable : true } ,
            ]
        }

    ]);

    const plans_details = ref([
        {
            name : "الباقة المجانية" ,
            month_price : null ,
            year_price : null ,

            // features
            features : [
                { name : 'إدارة المحتوى' , enable : true , count : null },
                { name : 'إدارة السلع' , enable : true , count : null },
                { name : 'عدد السلع المتاحة' , enable : null , count : 15 },
                { name : 'التقارير' , enable : false , count : null },
            ],

            // Partner Service
            partner_services : [
                { name : 'خدمة الشركاء 1' , enable : true },
                { name : 'خدمة الشركاء 2' , enable : true },
                { name : 'خدمة الشركاء 3' , enable : false },
                { name : '4 خدمة الشركاء' , enable : false },
                { name : 'خدمة الشركاء 5' , enable : true },
            ],

            // Link Service
            link_services : [
                { name : 'خدمة الربط 1' , enable : true },
                { name : 'خدمة الربط 2' , enable : true },
                { name : 'خدمة الربط 3' , enable : false },
                { name : '4 خدمة الربط' , enable : false },
                { name : 'خدمة الربط 5' , enable : false },
            ],

            // Extra Fee
            extra_fee_services : [
                { name : 'تعديل النطاق' , enable : false },
                { name : 'طلب اسم مرسل خاص لل SMS' , enable : false },
                { name : 'إسم خدمة' , enable : false },
                { name : 'إسم خدمة' , enable : false },
            ],

        },
        {
            name : "الباقة الاساسية" ,
            month_price : 75 ,
            year_price : 850 ,

            // Features
            features : [
                { name : 'إدارة المحتوى' , enable : true , count : null },
                { name : 'إدارة السلع' , enable : true , count : null },
                { name : 'عدد السلع المتاحة' , enable : null , count : 500 },
                { name : 'التقارير' , enable : true , count : null },
            ],

            // Partner Service
            partner_services : [
                { name : 'خدمة الشركاء 1' , enable : true },
                { name : 'خدمة الشركاء 2' , enable : true },
                { name : 'خدمة الشركاء 3' , enable : true },
                { name : '4 خدمة الشركاء' , enable : true },
                { name : 'خدمة الشركاء 5' , enable : true },
            ],

            // Link Service
            link_services : [
                { name : 'خدمة الربط 1' , enable : true },
                { name : 'خدمة الربط 2' , enable : true },
                { name : 'خدمة الربط 3' , enable : true },
                { name : '4 خدمة الربط' , enable : true },
                { name : 'خدمة الربط 5' , enable : true },
            ],

            // Extra Fee
            extra_fee_services : [
                { name : 'تعديل النطاق' , enable : true },
                { name : 'طلب اسم مرسل خاص لل SMS' , enable : true },
                { name : 'إسم خدمة' , enable : true },
                { name : 'إسم خدمة' , enable : true },
            ],

        },
        {
            name : "الباقة المتقدمة" ,
            month_price : 120 ,
            year_price : 1400 ,

            // Features
            features : [
                { name : 'إدارة المحتوى' , enable : true , count : null },
                { name : 'إدارة السلع' , enable : true , count : null },
                { name : 'عدد السلع المتاحة' , enable : null , count : 1000 },
                { name : 'التقارير' , enable : true , count : null },
            ],

            // Partner Service
            partner_services : [
                { name : 'خدمة الشركاء 1' , enable : true },
                { name : 'خدمة الشركاء 2' , enable : true },
                { name : 'خدمة الشركاء 3' , enable : true },
                { name : '4 خدمة الشركاء' , enable : true },
                { name : 'خدمة الشركاء 5' , enable : true },
            ],

            // Link Service
            link_services : [
                { name : 'خدمة الربط 1' , enable : true },
                { name : 'خدمة الربط 2' , enable : true },
                { name : 'خدمة الربط 3' , enable : true },
                { name : '4 خدمة الربط' , enable : true },
                { name : 'خدمة الربط 5' , enable : true },
            ],

            // Extra Fee
            extra_fee_services : [
                { name : 'تعديل النطاق' , enable : true },
                { name : 'طلب اسم مرسل خاص لل SMS' , enable : true },
                { name : 'إسم خدمة' , enable : true },
                { name : 'إسم خدمة' , enable : true },
            ],

        }
    ])

    const view_plans = ref(false);
    const plan_detail = ref();
    const plan_options = ref();

    const show_plans = (date,options) => {
        view_plans.value = true;
        plan_detail.value = date;
        plan_options.value = options;
    }




</script>

<template>

    <Layout>

        <div class="d-flex align-items-center pb-4">
            <i class="bx bx-cabinet sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الباقات </span>
            <span class="px-2 fw-600 fs-5"> / </span>
            <span class="px-2 fw-600 fs-5 text-gray"> إدارة الباقات </span>
        </div>

        <div class="row g-0 g-xl-4 g-lg-4">

            <div v-for="(plan , id) in plans"  class="col-sm">
                <div class="s-card m-2 m-xl-0 m-lg-0 p-3 px-0">
                    <div class="website-item-header d-flex align-items-center justify-content-between px-4 pb-2">
                        <div class="fw-600 text-success2 fs-5"> {{ plan.name }} </div>

                        <div class="d-flex">
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bx-pencil text-success2 fs-5"></i></a>
                            <a href="" class="p-1 d-grid-center ms-1 btn-action aspect-sq"><i class="bx bxs-trash text-danger fs-5"></i></a>
                        </div>

                    </div>

                    <div class="p-4 px-0 py-2 m-4 border rounded-2">
                        <div v-for="(option , index) in plan.options"
                            :class="['d-flex align-items-center justify-content-between py-2 px-4' , { 'border-top' : index > 0 }]">
                            <div class="d-flex">
                                <i :class="['bx fs-5 me-2' , { 'bxs-check-circle text-success2' : option.enable , 'bxs-x-circle text-danger' : !option.enable } ]"></i>
                                <span class="fw-600">{{ option.type }} </span>
                            </div>
                            <div>
                                <span class="text-primary2 fw-600" v-if="option.enable"> {{ option.price > 0 ? option.price.toLocaleString() :  ' مجاني' }} </span>
                                <span v-if="!option.enable">N/A</span>
                                <span class="small fw-600 ms-2" v-if="option.price > 0">{{ 'ر.س' }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="text-center">
                        <button @click="show_plans(plans_details[id] , plan.options )" class="btn btn-base py-2 px-5 mx-auto">
                            تفاصيل الباقة
                        </button>
                    </div>

                </div>
            </div>



        </div>

        <Modal v-model="view_plans" centered="true" size="xl" :show_header="false">
            <div class="col-sm-10 mx-auto pt-5">
                <Details :details="plan_detail" :options="plan_options" />
            </div>
        </Modal>

    </Layout>

</template>
