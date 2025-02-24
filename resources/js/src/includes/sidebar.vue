<script setup>
    import { Link } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const isMobile = () => {
        const screenWidth = document.documentElement.clientWidth;

        if (screenWidth <= 600) {
            return true;
        } else {
            return false;
        }
    }

    const is_show = ref(false);

    const items= ref([
        {
            title : 'الإحصائيات',
            icon : 'bx bx-bar-chart-square',
            url : '/',
            collabse : false,
            items : null
        },
        {
            title : 'العملاء',
            icon : 'bx bx-user',
            url : '/users',
            collabse : false,
            items : null
        },
        {
            title : 'المواقع',
            icon : 'bx bx-window-alt',
            url : '/websites',
            collabse : false,
            items : null
        },
        {
            title : 'الأكاديمية',
            icon : 'bx bx-news',
            url : '',
            collabse : false,
            items : [
                {
                    title : 'أقسام الأكاديمية', url : '/academy/category'
                },
                {
                    title : 'المنشورات', url : '/academy/list'
                },
                {
                    title : 'انشاء منشور جديد', url : '/academy/create'
                },


            ]
        },
        {
            title : 'الباقات',
            icon : 'bx bx-cabinet',
            url : '',
            collabse : false,
            items : [
                {
                    title : 'انشاء باقة جديدة', url : '/plan/create'
                },
                {
                    title : 'إدارة الباقات', url : '/plans'
                },

            ]
        },
        {
            title : 'المنظومة',
            icon : 'bx bx-category-alt',
            url : '',
            collabse : false,
            items : [
                {
                    title : 'انشاء منظومة جديدة', url : '/applications/create'
                },
                {
                    title : 'إدارة المنظومة', url : '/applications'
                },

            ]
        },
        {
            title : 'الصفحات',
            icon : 'bx bx-detail',
            url : '',
            collabse : false,
            items : [
                {
                    title : 'انشاء صفحة جديدة', url : '/pages/create'
                },
                {
                    title : 'إدارة الصفحات', url : '/pages'
                },

            ]
        },
        {
            title : 'الإشتراكات',
            icon : 'bx bx-wallet',
            url : '/subscriptions',
            collabse : false,
            items : null
        },
        {
            title : 'خدمة العملاء',
            icon : 'bx bx-conversation',
            url : '/help-center',
            collabse : false,
            items : null
        },
    ])


</script>

<template>

    <div :class="{'sidebar' : true , 'show' : is_show}">
        <div class="d-flex d-xl-none d-lg-none sidebar-toggle" @click="is_show=!is_show">
            <i class='bx bx-chevron-left'></i>
        </div>
        <div class="sidebar-header">
            <div class="sidebar-brand py-3">
                <img src="/assets/logo.svg" alt="">
            </div>
        </div>
        <div class="sidebar-menu">
            <div v-for="(item,index) in items" >
                <Link :href="item.url" :class="{ 'sidebar-item' : true , 'active' : $page.url == item.url  }" v-if="item.items == null">
                    <i :class="item.icon"></i>
                    <span> {{ item.title }} </span>
                </Link>
                <div v-if="item.items != null" class="sidebar-item has-child" :expand="item.collabse">
                    <div class="sidebar-item-title" @click="item.collabse=!item.collabse">
                        <i :class="item.icon"></i>
                        <span> {{ item.title }} </span>
                    </div>
                    <div class="sidebar-item-sub">
                        <Link :class="{ 'sidebar-item' : true , 'active' : $page.url == subItem.url  }" v-for="(subItem , inxx) in item.items" :href="subItem.url">
                            <span> {{ subItem.title }} </span>
                        </Link>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>
