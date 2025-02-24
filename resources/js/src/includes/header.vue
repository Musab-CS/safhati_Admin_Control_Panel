<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const logout = () => {
        localStorage.removeItem('token')
        router.visit('/auth/login')
    }

    const links = [
        { icon: 'bx bx-user' , label : 'ملفي الشخصي' , url : '/profile' } ,
        { icon: 'bx bx-power-off' , label : 'تسجيل الخروج' , url : null , method : 'logout' }
    ]

    const toggleMenue = ref(false);

</script>

<template>

    <div class="header">
        <div class="container px-0">

            <div class="d-flex px-0 px-xl-5 px-lg-5 justify-content-between">
                <div class="searchbar">

                </div>

                <div class="d-flex position-relative" v-click-away="()=> toggleMenue = false ">
                    <div class="header-action pe-auto pe-xl-5 pe-lg-5 d-flex align-items-center" @click="toggleMenue = !toggleMenue">
                        <img src="/assets/images/avatar.svg" alt="" class="avatar">
                        <div class="ps-4">
                            <div class="fw-600 small">{{ 'أمين الأحمدي' }}</div>
                            <span class="badge badge-outlined pt-1 badge-primary"> {{ 'مدير النظام' }} </span>
                        </div>
                    </div>
                    <div :class="['s-card absolute position-absolute w-100 top-100 mx-w-300px start-0 z-1000 flex-column',{ 'd-flex' : toggleMenue ,  'd-none' : !toggleMenue }]">
                        <div class="p-2">
                            <template v-for="ink in links">
                                <Link v-if="ink.url!=null" class="dropx-items" :href="ink.url">
                                    <i :class="ink.icon"></i>
                                    <span>{{ ink.label }}</span>
                                </Link>
                                <div v-if="!ink.url&&ink.method&&ink.method=='logout'" class="dropx-items danger" @click="logout">
                                    <i :class="ink.icon"></i>
                                    <span>{{ ink.label }}</span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
