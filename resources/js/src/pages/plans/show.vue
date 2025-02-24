<script setup>
    import { ref, defineProps } from "vue";
    const props = defineProps({
        details : Object ,
        options : Object
    });

</script>

<template>


    <div class="d-flex flex-column flex-xl-row flex-lg-row align-items-center justify-content-between px-0">
        <div class="fs-3 text-primary2"> {{ props.details?.name }} </div>
        <div class="p-4 px-0 py-2 m-4 mx-0 border rounded-2 mx-w-300px">
            <div v-for="(option , index) in props.options"
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
    </div>


    <div class="row mx-1"  v-if="details">
        <div class="row gx-0 plan-card-container border mb-4">
            <div class="col-sm">

                <div class="plan-card">
                    <div class="plan-card-header mb-4">
                        {{ "المميزات" }}
                    </div>

                    <div v-for="feature in details.features">
                        <div class="plan-card-item d-flex align-items-center" v-if="feature.enable == null || feature.enable == true">
                            <i class="bx bxs-check-circle me-2 fs-5 text-gray"></i>
                            <span>{{ feature.name }}</span>
                            <span class="ms-1" v-if="feature.count!= null">({{ feature.count }})</span>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm">
                <div class="plan-card">
                    <div class="plan-card-header mb-2">
                        {{ "خدمات الشركاء" }}
                    </div>
                    <div v-for="partner_services in details.partner_services">
                        <div class="plan-card-item" v-if="partner_services.enable">
                            <div class="d-flex align-items-center">
                                <div class="plan-list-cover me-2">
                                </div>
                                <div>
                                    <div class="fw-600">{{ partner_services.name }}</div>
                                    <span class=" text-secondary small">{{ partner_services.type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="plan-card">
                    <div class="plan-card-header mb-2">
                        {{ "خدمات الربط" }}
                    </div>
                    <div v-for="link_services in details.link_services">
                        <div class="plan-card-item">
                            <div class="d-flex align-items-center" v-if="link_services.enable">
                                <div class="plan-list-cover me-2">
                                </div>
                                <div>
                                    <div class="fw-600">{{ link_services.name }}</div>
                                    <span class=" text-secondary small">{{ link_services.type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="plan-card">
                    <div class="plan-card-header mb-2">
                        {{ "خدمات برسوم" }}
                    </div>
                    <div v-for="extra_fee_services in details.extra_fee_services">
                        <div class="plan-card-item d-flex align-items-start" v-if="extra_fee_services.enable == null || extra_fee_services.enable == true">
                            <i class="bx bxs-check-circle me-2 fs-5 text-gray"></i>
                            <span>{{ extra_fee_services.name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <button class="btn btn-base btn-rounded py-2 px-4">{{ 'تعديل الباقة' }}</button>
            <button class="btn btn-rounded fw-600 btn-danger py-2 px-4 ms-3">{{ 'حذف الباقة' }}</button>
        </div>

    </div>

</template>
