<script setup>
    import { ref , onMounted, computed, getCurrentInstance } from 'vue';
    import Layout from '../../layouts/default.vue'
    import Select2 from "../../components/Select2.vue";
    import Modal from '../../components/Modal.vue';

    const { proxy } = getCurrentInstance();

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
    proxy.$SnapAlert.SnapOptions({
        duration : 5000,
        rtl : true ,
        position : 'top center'
    });

    SnapDialog().SnapDialogOptions({
        rtl: true,
        animation : 'zoom'
    });



    onMounted(() => {
        window.addEventListener('resize', function(){
            checkMobile(600)
        });
        checkMobile(600)
        //proxy.$SnapAlert.info('Info', 'Be Notice!');
        //SnapDialog().success('Success Title', 'This is a success message.');

    });

    const toggleWebsiteStatus = (index) =>{
        websites.value[index].is_enable = !websites.value[index].is_enable
    }

    const deleteRecord = ()=>{
        SnapDialog().alert('تنبيه', 'هل حقا تريد إغلاق هذه التذكرة؟' , {
            type : 'alert',
            icon : 'bx-question-mark',
            enableConfirm: true,
            confirmText : 'نعم , إغلاق التذكرة',
            onConfirm: function() {
                proxy.$SnapAlert.success('نجاح', 'تم إغلاق التذكرة بنجاح.');
            },
            enableCancel: true,
            cancelText: 'تراجع',
            onCancel: function() {
                console.log('Cancelled');
            }
        });
    }

    const show = ref(false);


</script>

<template>

    <Layout>

        <div class="d-flex align-items-center pb-4">
            <i class="bx bx-question-mark border border-2 sq p-1 rounded-5 border-primary-2 text-primary2 me-2 fw-600"></i>
            <span class="text-primary2 fw-600 fs-5"> الدعم </span>
            <span class="px-2 fw-600 fs-5"> / </span>
            <span class="px-2 fw-600 fs-5 text-gray"> التذاكر السابقة </span>
        </div>
        <button v-if="1==2" @click="show = true" >SHow Dialog </button>

        <Modal v-model="show" centered="true" size="lg" title="CC">

            <p  v-for="x in 4">
                Lorem ipsum dolor sit amet.
            </p>

        </Modal>

        <div class="s-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="py-3 px-4"> {{ 'رقم التذكرة' }} </th>
                        <th scope="col" class="py-3 px-4"> {{ 'عنوان التذكرة' }} </th>
                        <th scope="col" class="py-3 px-4"> {{ 'اخر رد' }} </th>
                        <th scope="col" class="py-3 px-4"> {{ 'حالة التذكرة' }} </th>
                        <th scope="col" class="py-3 px-4">  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item , id) in 10">
                        <th scope="row" class="py-3 px-4">
                            <span class="fw-600 text-primary2"> {{ 123000002+id }} </span>
                        </th>
                        <td class="py-3 px-4">
                            <span class="fw-600 text-gray2"> {{ 'مشكلة في إدارة السلع' }} </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="fw-600 text-gray2"> {{ 'التاجر' }} </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="fw-600 badge badge-outlined badge-primary-light"> {{ 'في انتظار رد الموقع' }} </span>
                        </td>
                        <td class="py-3 px-4 align-middle text-end">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-sm btn-primary px-3 rounded-2 fw-600"> {{ 'عرض التذكرة' }}</a>
                                <a @click="deleteRecord" class="btn btn-sm btn-danger px-3 rounded-2 ms-3 fw-600"> {{ 'إغلاق التذكرة' }}</a>
                            </div>
                        </td>
                    </tr>
=                </tbody>
            </table>
        </div>

    </Layout>

</template>
