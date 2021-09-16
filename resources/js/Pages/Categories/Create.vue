<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>


        <div class="grid grid-cols-3">
            <div>
                <categories-sections></categories-sections>
            </div>
            <div class="col-span-2 my-10 pr-3">
                <create-category :categories='categories' v-if="!category"/>
                <edit-category  v-else :category="category" :categories='categories' />
            </div>
        </div>

        
        
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import CreateCategory from '@/Jetstream/CreateCategory.vue'
import EditCategory from '@/Jetstream/EditCategory.vue'
import CategoriesSections from '@/Components/Categories/Sections.vue'


export default {
    components: {
        AppLayout,
        CreateCategory,
        EditCategory,
        CategoriesSections
    },
    props: {
        categories : Object,
        category : Object,
    }
}
</script>
