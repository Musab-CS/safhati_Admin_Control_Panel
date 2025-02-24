<script setup>
    import { Link } from '@inertiajs/vue3';


</script>

<template>


    <div class="page-404">
        <div class="text-code">
            404
        </div>

        <div class="text-description">
            <span>{{ 'عذرا' }}</span>
            الصفحة غير موجودة او غير صحيحة

        </div>
    </div>

</template>

<style scoped>
    .page-404 {
        height: calc(100vh - 40px);
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        align-content: center;
        justify-content: center;
        padding: 20px;
    }

    .text-code {
        font-size: 13rem;
        color: brown;

    }

    .text-description {
        font-weight: 600;
        font-size: 25px;
    }

    .text-description span {
        color: brown;
    }
</style>

