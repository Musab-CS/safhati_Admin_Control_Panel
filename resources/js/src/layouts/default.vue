<template>

    <Sidebar/>


    <div class="main">

        <Header/>

        <div class="p-2 p-xl-5 p-lg-5 pt-3 pb-5">
            <slot />
        </div>



    </div>


</template>
<script setup>
    import Header from '../includes/header.vue'
    import Sidebar from '../includes/sidebar.vue'
    const { isPage } = defineProps({ isPage : Boolean , default : false });
    import { onMounted } from 'vue';


    onMounted(()=>{

    })

</script>

