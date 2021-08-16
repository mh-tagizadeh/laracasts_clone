<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        
        <create-category :categories='categories' v-if="!category"/>
        <edit-category  v-else :category="category" />
        
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import CreateCategory from '@/Jetstream/CreateCategory.vue'
import EditCategory from '@/Jetstream/EditCategory.vue'


export default {
    components: {
        AppLayout,
        CreateCategory,
        EditCategory
    },
    props: {
        categories : Object,
        category : Object,
    }
}
</script>
