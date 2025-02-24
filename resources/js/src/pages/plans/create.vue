<script setup>
    import { ref , onMounted, computed } from 'vue';
    import Layout from '../../layouts/default.vue'
    import Select2 from "../../components/Select2.vue";
    import Modal from "../../components/Modal.vue";
    import Details from "./show.vue";
import InputField from '../../components/InputField.vue';

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

    const localeMonth =[
        { id : 'all' , value :'كلاهما' },
        { id : 'monthly' , value :'شهري' },
        { id : 'yearly' , value :'سنوي' }

    ]

    const name = ref();
    const plan_type = ref(localeMonth[0]);

    const products_count = ref();
    const bookings_count  = ref();

    const products_unlimted = ref(false);
    const bookings_unlimted  = ref(false);

    const monthFree = ref(false);
    const yearFree  = ref(false);


    const features = ref([
        { id : 'feature-1' , name : 'إدارة المحتوى' , is_active : false },
        { id : 'feature-2' , name : 'إدارة السلع' , is_active : false },
        { id : 'feature-3' , name : 'إدارة الحجوزات' , is_active : false },
        { id : 'feature-4' , name : 'التقارير' , is_active : false}
    ])

    const servicesFee = ref([
        { id : 'service-fee-1' , name : 'خدمة برسوم 1' , is_active : false },
        { id : 'service-fee-2' , name : 'خدمة برسوم 2' , is_active : false },
        { id : 'service-fee-3' , name : 'خدمة برسوم 3' , is_active : false },
        { id : 'service-fee-4' , name : 'خدمة برسوم 4' , is_active : false}
    ])

    const partnersFee = ref([
        { id : 'service-partner-1' , name : 'خدمة شريك 1' , is_active : false },
        { id : 'service-partner-2' , name : 'خدمة شريك 2' , is_active : false },
        { id : 'service-partner-3' , name : 'خدمة شريك 3' , is_active : false },
        { id : 'service-partner-4' , name : 'خدمة شريك 4' , is_active : false}
    ])

    const LinksFee = ref([
        { id : 'service-link-1' , name : 'خدمة الربط 1' , is_active : false },
        { id : 'service-link-2' , name : 'خدمة الربط 2' , is_active : false },
        { id : 'service-link-3' , name : 'خدمة الربط 3' , is_active : false },
        { id : 'service-link-4' , name : 'خدمة الربط 4' , is_active : false}
    ])

    const custom_domain = ref('default')

</script>

<template>

    <Layout>

        <div class="d-flex align-items-center pb-4">
            <i class="bx bx-cabinet sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الباقات </span>
            <span class="px-2 fw-600 fs-5"> / </span>
            <span class="px-2 fw-600 fs-5 text-gray"> إنشاء باقة جديدة </span>
        </div>


        <form action="">
            <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 pt-5">

                <div class="row gx-0 gx-xl-4 gx-lg-4 align-items-end">
                    <div class="col-12 col-xl-7 col-lg-7">
                        <InputField v-model="name" class="form-control-md me-4" id="name" type="text" :required="true" label="اسم الباقة" labelClass="text-primary-4" placeholder="إكتب اسم الباقة" />
                    </div>
                    <div class="col">
                        <div class="text-start  pe-0 pe-xl-5 pe-lg-5 mt-3">
                            <div class="mb-2">
                                <span class="fw-600 text-primary-4"> مدة الاشتراك </span> <span class="text-primary2">*</span>
                            </div>
                            <div class="d-flex">
                                <InputField v-model="name" class="form-control-md shadow-none me-4 corner-e-0" id="name" type="text" :required="true" placeholder="حدد مدة الاشتراك" />
                                <Select2 :Class="'bg-white mb-3 mx-w-100px shadow-none d-block ms-0 border-2 corner-s-0 border-start-1 '" v-model="plan_type" :defaultValue="0" :multiple="false" :options="localeMonth" placeholder="حدد توع البحث" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm" v-if="(['all','monthly']).includes(plan_type?.id)">
                        <div class="text-start  pe-0 pe-xl-5 pe-lg-5 mt-4">
                            <div class="mb-2">
                                <span class="fw-600 text-primary-4"> رسوم الإشتراك {{ 'الشهرية' }}</span> <span class="text-primary2">*</span>
                            </div>
                            <div class="d-flex align-items-end mb-3">
                                <div class="input-group mx-w-175px mb-0">
                                    <input type="number" :disabled="monthFree" class="form-control text-start py-2 fw-200" placeholder="حدد رسوم" aria-label="حدد رسوم">
                                    <span class="input-group-text bg-transparent fw-600 " id="basic-addon1">
                                        {{ 'ر.س' }}
                                    </span>
                                </div>
                                <div class="ms-4 mb-2">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            id="monthFree"
                                            v-model="monthFree"
                                        >
                                        <label class="form-check-label fw-600" for="bookings_unlimted">
                                        {{ 'الباقة المجانية' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm" v-if="(['all','yearly']).includes(plan_type?.id)">
                        <div class="text-start  pe-0 pe-xl-5 pe-lg-5 mt-4">
                            <div class="mb-2">
                                <span class="fw-600 text-primary-4"> رسوم الإشتراك {{ 'السنوية' }}</span> <span class="text-primary2">*</span>
                            </div>
                            <div class="d-flex align-items-end mb-3">
                                <div class="input-group mx-w-175px mb-0">
                                    <input type="number" :disabled="yearFree" class="form-control text-start py-2 fw-200" placeholder="حدد رسوم" aria-label="حدد رسوم" aria-describedby="basic-addon1">
                                    <span class="input-group-text bg-transparent fw-600 " id="basic-addon1">
                                        {{ 'ر.س' }}
                                    </span>
                                </div>
                                <div class="ms-4 mb-2">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            id="yearFree"
                                            v-model="yearFree"
                                        >
                                        <label class="form-check-label fw-600" for="bookings_unlimted">
                                        {{ 'الباقة المجانية' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-2 mt-3">
                    <div class="mb-3">
                        <span class="fw-600 text-primary-4"> نطاق الموقع </span> <span class="text-primary2">*</span>
                    </div>

                    <div class="form-check mb-2">
                        <input v-model="custom_domain" class="form-check-input" :value="'default'" type="radio" name="custom_domain" id="custom_domain_1">
                        <label class="form-check-label fw-600" for="custom_domain_1">
                            نطاق تابع للمنصة
                        </label>
                    </div>
                        <div class="form-check">
                        <input v-model="custom_domain" class="form-check-input" :value="'custom'" type="radio" name="custom_domain" id="custom_domain_2">
                        <label class="form-check-label fw-600" for="custom_domain_2">
                            نطاق خاص
                        </label>
                    </div>

                </div>

            </div>

            <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 px-0 pt-5">
                <div class="px-4">
                    <div class="row gx-0 gx-xl-4 gx-lg-4">
                        <div class="col-12 col-5 col-lg-5">
                            <div class="d-flex align-items-end">
                                <InputField v-model="products_count" :disabled="products_unlimted == true" class="form-control-md" id="products_unlimted" type="number" :required="true" label="عدد السلع المتاحة للباقة" labelClass="text-primary-4" placeholder="حدد عدد السلع المتاحة" />
                                <div class="ms-5 mb-3">
                                    <div class="form-check py-1 d-flex">
                                        <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="products_unlimted"
                                        v-model="products_unlimted"
                                        >
                                        <label class="form-check-label fw-600 ms-2" for="products_unlimted">
                                        {{ 'غير محدود' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-5 col-lg-5">
                            <div class="d-flex align-items-end">
                                <InputField v-model="bookings_count" :disabled="bookings_unlimted === true" class="form-control-md" id="bookings_unlimted" type="number" :required="true" label="عدد الحجوزات المتاحة للباقة" labelClass="text-primary-4" placeholder="حدد عدد الحجوزات المتاحة" />
                                <div class="ms-5 mb-3">
                                    <div class="form-check py-1 d-flex">
                                        <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="bookings_unlimted"
                                        v-model="bookings_unlimted"
                                        >
                                        <label class="form-check-label fw-600 ms-2" for="bookings_unlimted">
                                        {{ 'غير محدود' }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 px-0">
                <div class=" website-item-header mb-4 px-4">
                    <div class="fw-bold text-primary2 fs-5"> {{ 'مميزات اضافية' }} </div>
                </div>

                <div class="px-4">
                    <div class="row">
                        <div v-for="feature in features" class="col-12 col-xl-3 col-lg-3">
                            <div :key="feature.id" class="form-check py-1">
                                <input
                                class="form-check-input"
                                type="checkbox"
                                :id="feature.id"
                                v-model="feature.is_active"
                                >
                                <label class="form-check-label fw-600 ms-2" :for="feature.id">
                                {{ feature.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 px-0">
                <div class=" website-item-header mb-4 px-4">
                    <div class="fw-bold text-primary2 fs-5"> {{ 'خدمات برسوم' }} </div>
                </div>

                <div class="px-4">
                    <div class="row">
                        <div v-for="service in servicesFee" class="col-12 col-xl-3 col-lg-3">
                            <div :key="service.id" class="form-check py-1">
                                <input
                                class="form-check-input"
                                type="checkbox"
                                :id="service.id"
                                v-model="service.is_active"
                                >
                                <label class="form-check-label fw-600 ms-2" :for="service.id">
                                {{ service.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gx-0 gx-xl-3 gx-lg-3">

                <div class="col-sm d-grid">
                    <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 px-0">
                        <div class=" website-item-header mb-4 px-4">
                            <div class="fw-bold text-primary2 fs-5"> {{ 'خدمات الشركاء' }} </div>
                        </div>

                        <div class="px-4">
                            <div v-for="partner in partnersFee" :key="partner.id" class="form-check py-1">
                                <input
                                class="form-check-input"
                                type="checkbox"
                                :id="partner.id"
                                v-model="partner.is_active"
                                >
                                <label class="form-check-label fw-600 ms-2" :for="partner.id">
                                {{ partner.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm d-grid">
                    <div class="s-card mb-4 p-4 mx-2 mx-xl-0 mx-xl-0 px-0">
                        <div class=" website-item-header mb-4 px-4">
                            <div class="fw-bold text-primary2 fs-5"> {{ 'خدمات الربط' }} </div>
                        </div>
                        <div class="px-4">
                            <div v-for="link in LinksFee" :key="link.id" class="form-check py-1">
                                <input
                                class="form-check-input"
                                type="checkbox"
                                :id="link.id"
                                v-model="link.is_active"
                                >
                                <label class="form-check-label fw-600 ms-2" :for="link.id">
                                {{ link.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-2">
                <button type="submit" class="btn btn-base px-5 py-2">{{ 'إضافة الى الباقات' }}</button>
            </div>


        </form>



    </Layout>

</template>
