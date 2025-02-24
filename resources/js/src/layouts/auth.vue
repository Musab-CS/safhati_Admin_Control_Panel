<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps({
    logo : String
})

</script>

<template>

    <div class="relative position-relative bg-white">
        <div class="auth-logo">
            <Link href="/auth/login">
                <img :src="logo" alt="">
            </Link>
        </div>

        <div class="row gx-0 flex-column flex-xl-row flex-lg-row">
            <div class="col d-grid p-0 flex-centers auth-height">
                <div class="m-5 py-0">
                    <div class="auth-container">
                        <slot/>
                    </div>
                </div>

            </div>
            <div class="col d-grid p-0 flex-centers auth-left-side">
                <div class="m-5 py-5 d-none d-xl-block d-lg-block">
                    <div class="fs-5 col-sm-9 mx-auto text-light text-center" style="line-height: 40px;">
                        {{ "إدارة منصتك بكل سهولة واحترافية – تحكم في كل التفاصيل، تابع الأداء، واتخذ القرارات الذكية في مكان واحد.  إذا كنت تريد وصفًا أكثر تفصيلًا أو رسميًا، يمكنني تعديله حسب احتياجاتك" }}
                    </div>
                </div>
            </div>

        </div>
    </div>




</template>

