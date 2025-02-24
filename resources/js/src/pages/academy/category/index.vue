<script setup>
    import { ref , onMounted , computed} from "vue";
    import Layout from '../../../layouts/default.vue'
    import Select2 from "../../../components/Select2.vue";
    import Modal from "../../../components/Modal.vue";
    import CreateCategory from './create.vue'
    const isMobile = ref(false);
    const selectdCategories = ref([]);

    const orders = [
        { id : 'title' , value : 'العنوان' } ,
        { id : 'date' , value : 'التاريخ' } ,
    ];

    const create_category = ref(false);
    const OrderBy = ref(false);


    const categories = ref([
        {
            id : 10001  ,title : 'قسم 1' , date : '11/02/2025 12:07 AM', post_count : 34
        },
        {
            id : 10001  ,title : 'قسم 2' , date : '11/02/2025 12:07 AM', post_count : 12
        },
        {
            id : 10001  ,title : 'قسم 3' , date : '11/02/2025 12:07 AM', post_count : 8
        },
        {
            id : 10001  ,title : 'قسم 4' , date : '11/02/2025 12:07 AM', post_count : 33
        },
        {
            id : 10001  ,title : 'قسم 5' , date : '11/02/2025 12:07 AM', post_count : 72
        },
        {
            id : 10001  ,title : 'قسم 6' , date : '11/02/2025 12:07 AM', post_count : 21
        }

    ]);

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
      return selectdCategories.value.length === categories.value.length;
    });

    // Method to toggle select all
    const toggleSelectAll = (event) => {
      if (event.target.checked) {
        // Select all
        selectdCategories.value = categories.value.map(option => option.id);
      } else {
        // Deselect all
        selectdCategories.value = [];
      }
    };



</script>

<template>
    <Layout>
        <div class="d-flex align-items-center justify-content-between pb-4 px-2">

            <div class="d-flex align-items-center">
                <i class="bx bx-news sq p-0 fs-5 text-primary2 me-2"></i>
                <span class="text-primary2 fw-600 fs-5"> أقسام الأكاديمية </span>
            </div>

            <button @click="create_category=true" class="btn btn-base px-3 d-flex align-items-center">
                <i class="bx bxs-plus-circle fs-6"></i>
                <span class="fw-600 ms-2">{{ 'جديد' }}</span>
            </button>

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

            <div class="col-xl col-lg col-sm text-right">
                <Select2 :Class="'bg-white w-100'" :style="'padding : 13px 20px'" v-model="OrderBy" :defaultValue="1" :prefixText="'ترتيب حسب'" :multiple="false" :options="orders" placeholder="حدد القسم" />
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

                        <span class=" text-black fw-bold"> {{ 'العنوان' }} </span>
                    </div>
                </div>
                <div class="col-sm text-center"> <span class=" text-black fw-bold"> {{ 'عدد المنشورات' }} </span></div>
                <div class="col-sm text-start"> <span class=" text-black fw-bold"> {{ 'تاريخ الإضافة' }} </span> </div>
                <div class="col-xl-2 col-lg-2"></div>
            </div>

            <div v-if="isMobile" class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center my-2">
                    <div class="form-check me-2">
                        <input class="form-check-input" type="checkbox" value="" id="selectAll" :checked="isAllSelected" @change="toggleSelectAll">
                    </div>
                    <span class=" text-black fw-600 small"> {{ !isAllSelected ? 'إختيار الكل' : 'الغاء إختيار الكل' }} </span>
                </div>

                <button v-if="selectdCategories.length > 0" class="btn btn-sm btn-danger rounded-2 px-3 d-flex me-0 ms-auto">
                    <i class="bx bx-trash bx-fix me-2"></i>
                    <span class="fw-600">حذف ({{ selectdCategories.length  }}) عملاء</span>
                </button>
            </div>

            <div v-for="(category , id) in categories" :class="{'website-item website-item-border shadow-none mb-2' : true , 'card-selected' : selectdCategories.includes(category.id) }">
                <div v-if="!isMobile" class="row gx-0">
                    <div class="col-xl-2 col-lg-2 pt-2">
                        <div class="d-flex align-items-center">
                            <div class="form-check form-chec me-2":key="category.id">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    :value="category.id"
                                    :id="'category-'+id"
                                    v-model="selectdCategories"
                                />
                            </div>
                            <span class="text-gray2 fw-600 field-selected"> {{ category.title }} </span>
                        </div>
                    </div>
                    <div class="col-sm text-center pt-2"> <span class="text-gray2 fw-600"> {{ category.post_count }} </span></div>
                    <div class="col-sm text-start pt-2"> <span class="text-gray2 fw-600 text-start" dir="ltr"> {{ category.date }} </span> </div>
                    <div class="col-xl-2 col-lg-2 d-flex justify-content-end">
                        <div class="d-flex border-start border-end px-2 h-100">
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bx-pencil text-success2 fs-4"></i></a>
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bxs-trash text-danger fs-4"></i></a>
                        </div>
                    </div>
                </div>

                <div v-if="isMobile" class="">
                    <div class="form-check form-chec me-2":key="id">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            :value="category.id"
                            :id="id"
                            v-model="selectdCategories"
                        />
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-black fw-bold field-selected"> {{ category.title }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'عدد المنشورات' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ category.post_count }} </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span>{{ 'تاريخ الإضافة' }}</span>
                        <span class="text-gray2 fw-600 field-selected"> {{ category.date }} </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 pb-0">
                        <div class="d-flex px-2 pe-0 h-100">
                            <a href="" class="p-1 d-grid-center mx-1 btn-action aspect-sq"><i class="bx bx-pencil text-success2 fs-4"></i></a>
                            <a href="" class="p-1 d-grid-center mx-4 btn-action aspect-sq"><i class="bx bxs-trash text-danger fs-4"></i></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <!-- Crerate Modal -->
        <Modal v-model="create_category" centered="true" :show_header="false">
            <div class="py-4">
                <CreateCategory />
            </div>
        </Modal>
    </Layout>

</template>
