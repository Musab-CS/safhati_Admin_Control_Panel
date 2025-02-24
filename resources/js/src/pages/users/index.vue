<script setup>
    import { ref , onMounted, computed } from 'vue';
    import Layout from '../../layouts/default.vue'
    import Select2 from "../../components/Select2.vue";

    const isMobile = ref(false);
    const selectdUsers = ref([]);
    const clients= ref([
        {
            name : 'يامن مدني', phone : '0519636831' , email : 'trenton79@example.com' ,  website : 'mclaughlin.biz' , profit : '44,625' , visible : false
        },
        {
            name : 'راما الحميد', phone : '0517248642' , email : 'jerrod.jacobi@example.com' ,  website : 'swift.org' , profit : '44,625' , visible : false
        },
        {
            name : 'عبد الرحمان هوساوي', phone : '0569706553' , email : 'jerrod.jacobi@example.com' ,  website : 'hessel.com' , profit : '44,625' , visible : false
        },
        {
            name : 'فراس السويلم', phone : '0531548746' , email : 'libbie87@example.net' ,  website : 'moen.com' , profit : '44,625' , visible : false
        },
        {
            name : 'اثير الحميد', phone : '0519618403' , email : 'wunsch@example.com' ,  website : 'feest.org' , profit : '44,625' , visible : false
        },
        {
            name : 'اسراء الحصين', phone : '0584445068' , email : 'rowe.gloria@example.com' ,  website : 'hackett.net' , profit : '44,625' , visible : false
        },
        {
            name : 'سدير الفرحان', phone : '0553455724' , email : 'sigrid.larkin@example.com' ,  website : 'kuhn.com' , profit : '44,625' , visible : false
        },
        {
            name : 'مهران السعيد', phone : '0580438402' , email : 'senger.nick@example.com' ,  website : 'vandervort.info' , profit : '44,625' , visible : false
        },
        {
            name : 'عماد السديري', phone : '0524800770' , email : 'jeramie32@example.net' ,  website : 'damore.com' , profit : '44,625' , visible : false
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
            checkMobile(1200)
        });
        checkMobile(1200)
    });

    const isAllSelected = computed(() => {
      return selectdUsers.value.length === clients.value.length;
    });

    // Method to toggle select all
    const toggleSelectAll = (event) => {
      if (event.target.checked) {
        // Select all
        selectdUsers.value = clients.value.map(option => option.phone);
      } else {
        // Deselect all
        selectdUsers.value = [];
      }
    };


</script>

<template>

    <Layout>

        <div class="d-flex align-items-center pb-4">
            <i class="bx bx-user sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> العملاء </span>
        </div>


        <div class="row gx-0 mx-2">
            <div class="col-12 col-xl-5 col-lg-5">
                <div class="input-field">
                    <div class="field-sufix text-right">
                        <button class="btn search-btn me-2">
                            <i class="bx bx-search fs-4 p-0 m-0"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="إبحث بواسطة إسم العميل, رقم الهاتف, البريد الإلكتروني" name="" id="">
                </div>
            </div>
            <div class="col-12 col-xl-5 col-lg-5">

            </div>
            <div class="col-xl col-lg text-right" v-if="!isMobile">
                <button v-if="selectdUsers.length > 0" class="btn btn-lg btn-danger btn-rounded py-2 d-flex me-0 ms-auto">
                    <i class="bx bx-trash bx-fix me-2"></i>
                    <span class="fw-600 fs-16px">حذف ({{ selectdUsers.length  }}) عملاء</span>
                </button>
            </div>
        </div>

        <div class="s-card shadow-sm mx-2 p-4 mt-40px">

            <div v-if="!isMobile" class="row gx-0 px-3 pb-3 mb-4 website-item-header">
                <div class="col-xl-2 col-lg-2">
                    <div class="d-flex align-items-center">
                        <div class="form-check me-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="selectAll"
                                :checked="isAllSelected"
                                @change="toggleSelectAll">
                        </div>

                        <span class=" text-black fw-bold"> {{ 'الإسم' }} </span>
                    </div>
                </div>
                <div class="col-sm text-center"> <span class=" text-black fw-bold"> {{ 'رقم الجوال' }} </span></div>
                <div class="col-xl-2 col-lg-2 text-center"> <span class=" text-black fw-bold"> {{ 'البريد الإلكتروني' }} </span></div>
                <div class="col-sm text-center"> <span class=" text-black fw-bold"> {{ 'اسم الموقع' }} </span></div>
                <div class="col-sm text-center"> <span class=" text-black fw-bold"> {{ 'الارباح' }} </span> </div>
                <div class="col-xl-2 col-lg-2"> </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-2" v-if="isMobile">
                <div class="d-flex align-items-center my-2">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" value="" id="selectAll" :checked="isAllSelected" @change="toggleSelectAll">
                    </div>
                    <span class=" text-black fw-600 small"> {{ !isAllSelected ? 'إختيار الكل' : 'الغاء إختيار الكل' }} </span>
                </div>

                <button v-if="selectdUsers.length > 0" class="btn btn-sm btn-danger rounded-2 px-3 d-flex me-0 ms-auto">
                    <i class="bx bx-trash bx-fix me-2"></i>
                    <span class="fw-600">حذف ({{ selectdUsers.length  }}) عملاء</span>
                </button>
            </div>

            <div v-for="(client , id) in clients" :class="{'website-item website-item-border shadow-none mb-2' : true , 'card-selected' : selectdUsers.includes(client.phone) }">
                <div v-if="!isMobile" class="row gx-0">
                    <div class="col-xl-2 col-lg-2 pt-2">
                        <div class="d-flex align-items-center">
                            <div class="form-check form-chec me-2":key="id">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    :value="client.phone"
                                    :id="id"
                                    v-model="selectdUsers"
                                />
                            </div>
                            <span class="text-gray2 fw-600 field-selected"> {{ client.name }} </span>
                        </div>
                    </div>
                    <div class="col-sm text-center pt-2"> <span class="text-gray2 fw-600"> {{ client.phone }} </span></div>
                    <div class="col-xl-2 col-lg-2 pt-2 text-center"> <span class="text-gray2 fw-600"> {{ client.email }} </span></div>
                    <div class="col-sm text-center pt-2"> <span class="text-gray2 fw-600"> {{ client.website }} </span></div>
                    <div class="col-sm text-center pt-2"> <span class=" text-primary2 fw-bold"> {{ client.profit }} </span> <span class="fw-600 small ms-2">ر.س</span> </div>
                    <div class="col-sm d-flex justify-content-end">

                        <div class="d-flex border-start border-end px-2 h-100">
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bx-pencil text-success2 fs-4"></i></a>
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bxs-trash text-danger fs-4"></i></a>
                        </div>

                        <a @click="client.visible=!client.visible" href="javascript:void(0)" class="p-1 d-grid-center ms-2 btn-action aspect-sq"><i class="bx bx-chevron-down text-gray2 fs-4"></i></a>
                    </div>
                    <div v-if="client.visible" class="col-12 border-top mt-3 pt-4">
                        <div class="d-flex mx-w-200px align-items-center justify-content-between pb-2">
                            <span class="fw-600 me-2">{{ 'إسم الباقة' }}:</span>
                            <span class="text-primary2 fw-600 me-2">{{ 'المجانية' }}</span>
                        </div>

                        <div class="d-flex align-items-center align-content-between">
                            <div class="d-flex mx-w-300px align-items-center py-2">
                                <span class="fw-600 me-2">{{ 'تاريخ بداية الإشتراك' }}:</span>
                                <span class="text-primary2 fw-600 ms-2">{{ '1/2021 /25' }}</span>
                            </div>

                            <div class="d-flex mx-w-300px align-items-center py-2">
                                <span class="fw-600 me-2">{{ 'تاريخ إنتهاء الإشتراك' }}:</span>
                                <span class="text-primary2 fw-600 ms-2">{{ '2022 /1 / 9' }}</span>
                            </div>

                            <div class="d-flex mx-w-300px align-items-center py-2">
                                <span class="fw-600 me-2">{{ 'المدة المتبقية على نهاية الاإشتراك' }}:</span>
                                <div>
                                    <span class="text-primary2 fw-600 mx-2 me-1">{{ '600' }}</span>
                                    <span class="">{{ 'يوم' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="isMobile" class="">
                    <div class="form-check form-chec me-2":key="id">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            :value="client.phone"
                            :id="id"
                            v-model="selectdUsers"
                        />
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'الإسم' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ client.name }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'رقم الجوال' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ client.phone }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'البريد الإلكتروني' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ client.email }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'اسم الموقع' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ client.website }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'الارباح' }}</span>
                        <div>
                            <span class=" text-primary2 fw-bold"> {{ client.profit }} </span> <span class="fw-600 small ms-2">ر.س</span>
                        </div>
                    </div>

                    <div v-if="client.visible" class="my-3 py-3 pb-2 border btn-rounded bg-white shadow-sm">
                        <div class="d-flex align-items-center justify-content-between pb-2 px-3 border-bottom">
                            <span class="fw-600 me-2">{{ 'إسم الباقة' }}:</span>
                            <span class="text-primary2 fw-600 ms-2">{{ 'المجانية' }}</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom">
                            <span class="fw-600 me-2">{{ 'تاريخ بداية الإشتراك' }}:</span>
                            <span class="text-primary2 fw-600 ms-2">{{ '1/2021 /25' }}</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom">
                            <span class="fw-600 me-2">{{ 'تاريخ إنتهاء الإشتراك' }}:</span>
                            <span class="text-primary2 fw-600 ms-2">{{ '2022 /1 / 9' }}</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-2 px-3">
                            <span class="fw-600 me-2">{{ 'المدة المتبقية للإشتراك' }}:</span>
                            <div>
                                <span class="text-primary2 fw-600 mx-2 me-1">{{ '600' }}</span>
                                <span class="">{{ 'يوم' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 pb-0">
                        <div class="d-flex border-end px-2 pe-0 h-100">
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bx-pencil text-success2 fs-4"></i></a>
                            <a href="" class="p-1 d-grid-center mx-4 btn-action aspect-sq"><i class="bx bxs-trash text-danger fs-4"></i></a>
                        </div>
                        <a @click="client.visible=!client.visible" href="javascript:void(0)" :class="{'p-1 d-grid-center ms-2 btn-action aspect-sq' : true ,'rotate-180':client.visible}"><i class="bx bx-chevron-down text-gray2 fs-4"></i></a>
                    </div>

                </div>
            </div>



        </div>


    </Layout>

</template>
