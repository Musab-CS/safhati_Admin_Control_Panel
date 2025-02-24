<script setup>
    import { ref, defineProps, defineEmits, watch, computed } from "vue";

    const props = defineProps({
        modelValue: [String, Number, Array, Object , Boolean], // Support for v-model
        title: String,
        style: String,
        show_header : { type : Boolean , default : true },
        centered : Boolean,
        scrollable : Boolean,
        size : { type : String , default : null } ,
        Class: String,
    });

    const emit = defineEmits(["update:modelValue"]);

    const sizes = {
        sm : 'modal-sm',
        lg : 'modal-lg',
        xl : 'modal-xl',
        full : 'modal-fullscreen',
    }

    const sizeClass = computed(() => sizes[props.size] || "");

    const closeModal = () => {
        emit("update:modelValue", false);
    };

</script>

<template>
    <div :class="{'modal fade': true, 'show': modelValue , }"
        data-bs-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">

        <div :class=" [ 'modal-dialog ' , sizeClass ,{ 'modal-dialog-centered' : centered , 'modal-dialog-scrollable' : scrollable }]">
            <div class="modal-content">
                <div class="modal-header" v-if="props.show_header">
                    <h1 class="modal-title fs-5" id="staticBackdropLiveLabel">{{ title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <slot/>
                </div>
                <div class="modal-footer">
                    <button @click="closeModal" type="button" class="btn btn-sm btn-light fw-600 small py-2 px-4"> رجوع </button>
                </div>
            </div>
        </div>
    </div>

    <div v-if="modelValue" class="modal-backdrop fade show"></div>
</template>
