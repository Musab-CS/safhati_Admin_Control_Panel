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

    const subType = [
        { type : 'سنوي' , start_at : '10:12 AM  17-01-2025' , end_at : '10:12 AM  17-01-2026' , price : "1800.00"  },
        { type : 'شهري' , start_at : '03:12 PM  09-02-2025' , end_at : '10:12 AM  17-03-2026' , price : '199.00'  }
    ];

    const subStatus = [
        { class : 'badge badge-outlined badge-danger badge-danger-light' , label : 'منتهي' } ,
        { class : 'badge badge-outlined badge-warning-light badge-warning' , label : 'يوشك على الانتهاء' } ,
        { class : 'badge badge-outlined badge-success-light badge-success' , label : 'ساري' } ,
    ];

    const subscription = ref(
        {
            id : '50013',
            start_at : '10:12 AM , 17-03-2024',
            type : 'سنوي',

        }
    )

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
            <i class="bx bx-wallet sq p-0 fs-5 text-primary2 me-2"></i>
            <span class="text-primary2 fw-600 fs-5"> الإشتراكات </span>
        </div>

        <div class="s-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="py-3 px-4"> {{ 'رقم الإشتراك' }} </th>
                        <th scope="col" class="py-3 px-4 text-center"> {{ 'سعر الإشتراك' }} </th>
                        <th scope="col" class="py-3 px-4 text-center"> {{ 'نوع الإشتراك' }} </th>
                        <th scope="col" class="py-3 px-4 text-center"> {{ 'بداية الإشتراك' }} </th>
                        <th scope="col" class="py-3 px-4 text-center"> {{ 'نهاية الإشتراك' }} </th>
                        <th scope="col" class="py-3 px-4 text-start"> {{ 'حالة الاشتراك' }} </th>
                        <th scope="col" class="py-3 px-4">  </th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="(item , id) in 10">
                        <th scope="row" class="py-3 px-4">
                            <span class="fw-600 text-gray2"> {{ subscription.id+id }} </span>
                        </th>
                        <td class="py-3 px-4 text-center">
                            <span class="fw-600 text-primary2"> {{ subType[id % 2].price }} </span> <span class="text-gray2">ر.س</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="fw-600 badge badge-outlined badge-info badge-info-light"> {{ subType[id % 2].type }} </span>
                        </td>
                        <th scope="row" class="py-3 px-4 text-center">
                            <span dir="ltr" class="fw-600 small"> {{ subType[id % 2].start_at }} </span>
                        </th>
                        <th scope="row" class="py-3 px-4 text-center">
                            <span dir="ltr" class="fw-600 small"> {{ subType[id % 2].end_at }} </span>
                        </th>
                        <td class="py-3 px-4 align-middle text-start">
                            <span :class="[ subStatus[(subscription.id+id)%3].class , 'py-1']"> {{ subStatus[(subscription.id+id)%3].label  }} </span>
                        </td>
                        <td class="py-3 px-4 align-middle text-end" x-data="{ name : 'salah' }">
                            <span v-text="name"></span>
                        </td>
                    </tr>
               </tbody>
            </table>
        </div>



    </Layout>

</template>
