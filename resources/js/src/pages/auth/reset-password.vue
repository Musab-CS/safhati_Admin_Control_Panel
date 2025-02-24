<script setup>
    import { ref } from 'vue';
    import AuthLayout from '../../layouts/auth.vue'
import { Link } from '@inertiajs/vue3';

    const logo = ref('/assets/logo.svg');

    const isLoading = ref(false)
    const email = ref()
    const success = ref(false);
    const warning = ref(null)
    const requestReset = ()=>{
        isLoading.value = true;
        setTimeout(()=>{
            if (email.value === "email@email.com") {
                success.value = true;
            }else{
                warning.value = "خطأ , هذا البريد الكتروني غير مسجل لدينا في قاعدة بياناتنا"
            }

            isLoading.value = false;
        }, 4000)
    }

</script>


<template>

    <AuthLayout :logo="logo">

        <div class="auth-card px-0 border-0 shadow-none" v-if="!success">
            <form @submit.prevent="requestReset">
                <div class="text-center mb-5">
                    <h1 class="fw-bold text-primary fs-2">{{ 'نسيت كلمة المرور؟' }}</h1>
                    <p class="fw-600 text-gray">{{ 'أدخل البريد الإلكتروني لاستلام تعليمات تعيين كلمة مرور جديدة' }}</p>
                </div>

                <div class="ex-input-field mb-0 ms-2 px-0">
                    <input v-model="email" type="email" class="text-start" required maxlength="" value="" placeholder="البريدالإلكتروني" :disabled="isLoading">
                    <div class="ex-input-field-icon">
                        <i class="bx bx-envelope"></i>
                    </div>
                </div>

                <div class="d-flex align-items-center alert alert-danger border-0 mb-0 mt-1 mx-2" v-if="warning">
                    <i class="bx bxs-x-circle text-danger fs-4"></i>
                    <p class="m-0 ps-3 fw-600 small text-danger">
                        {{ warning }}
                    </p>
                </div>

                <div class="text-center pt-3">
                    <button :class="[ 'auth-btn auth-btn-submit mx-auto mx-0 mb-3' , { 'is-loading' : isLoading } ]" :disabled="isLoading">{{ "إرسال رابط التعيين" }}</button>
                    <Link href="/auth/login" class="link-active fw-600"> رجوع الى تسجيل الدخول </Link>
                </div>
            </form>
        </div>

        <div class="auth-card px-0 flex-centers px-5 flex-column" v-if="success">
            <i class="bx bxs-check-circle fs-80px text-success2"></i>
            <div class="fw-600 mt-4 text-center mb-3">
                {{ 'تم إرسال تعليمات تعيين كلمة المرور الى بريدك الالكتروني' }}
            </div>
            <Link href="/auth/login" class="link-active fw-600"> رجوع الى تسجيل الدخول </Link>
        </div>


    </AuthLayout>

</template>
