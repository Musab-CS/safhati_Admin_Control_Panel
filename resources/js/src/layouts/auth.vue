<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps({
    logo : String
})

</script>

<template>

    <div class="relative position-relative">
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
                    <div class="">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, officia cum minima ex iusto ut aperiam id praesentium accusantium. Maxime quas aperiam corporis quia itaque eos aliquid. Modi, vitae? Eos!
                    </div>
                </div>
            </div>

        </div>
    </div>




</template>

