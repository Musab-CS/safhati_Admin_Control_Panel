<script setup>
    import { ref } from 'vue';
    import AuthLayout from '../../layouts/auth.vue'
    import { Link, router } from '@inertiajs/vue3';

    const logo = ref('/assets/logo.svg')
    const isLoading = ref(false);
    const warning = ref(null)

    const email = ref();
    const password = ref();

    const login = ()=>{
        isLoading.value = true;
        setTimeout(()=>{
            if (email.value && password.value && email.value === "email@email.com" && password.value === "123456" ) {
                localStorage.setItem('token' , Math.round(Math.random(0,2)*99999999) )
                router.visit('/')
            }else{
                warning.value = "بيانات الدخول التي قمت بإدخالها خاطئة."
            }
            isLoading.value = false;
        }, 1000)
    }

</script>


<template>

    <AuthLayout :logo="logo">

        <div class="auth-card px-0 border-0 shadow-none">
            <form @submit.prevent="login">
                <div class="text-center">
                    <h1 class="fw-bold text-primary fs-2 mb-5">{{ 'تسجيل الدخول' }}</h1>
                </div>
                <div class="d-flex align-items-center alert alert-danger border-0 mb-3 mt-0 mx-2 ms-1" v-if="warning">
                    <i class="bx bxs-x-circle text-danger fs-4"></i>
                    <p class="m-0 ps-3 fw-600 small text-danger">
                        {{ warning }}
                    </p>
                </div>
                <div class="ex-input-field mb-3 ms-1">
                    <input type="email" v-model="email" required maxlength="100" name="email" class="text-start" :disabled="isLoading" placeholder="البريدالإلكتروني">
                    <div class="ex-input-field-icon">
                        <i class="bx bx-envelope"></i>
                    </div>
                </div>

                <div class="ex-input-field mb-3 ms-1">
                    <input type="password" v-model="password" required name="password" :disabled="isLoading" placeholder="كلمة المرور">
                    <div class="ex-input-field-icon">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between px-2 px-xl-3 px-lg-3 pt-2">
                    <div class="form-check">
                        <input class="form-check-input" :disabled="isLoading" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label fw-600" for="flexCheckChecked">
                            تذكرني
                        </label>
                    </div>

                    <Link href="/auth/reset-password" class="link link-active">{{ "هل نسيت كلمة المرور؟" }}</Link>
                </div>

                <div class="text-center pt-4">
                    <button :class="[ 'auth-btn auth-btn-submit mx-auto mx-0 mb-3' , { 'is-loading' : isLoading } ]" :disabled="isLoading">{{ "الدخول" }}</button>
                </div>
            </form>
        </div>


    </AuthLayout>

</template>
