<template>
    <app-layout title="Dashboard">
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>

        </template>


        <div class="grid grid-cols-3">
            <div>
                <categories-sections></categories-sections>
            </div>
            <div class="col-span-2 my-10 pr-3">
                <categories-table :categories="categories"/>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CategoriesTable from '@/Components/Categories/Table.vue'
    import CategoriesSections from '@/Components/Categories/Sections.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CategoriesTable,
            CategoriesSections
        },
        props: {
            categories: Object,
        },
    }
</script>
