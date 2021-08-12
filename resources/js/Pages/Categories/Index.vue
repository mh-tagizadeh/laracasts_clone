<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>

        <div class="mx-10 my-5">
            <Link href="categories/create" class="shadow rounded-lg bg-blue-600 text-indigo-50 p-2">Create</Link>
        </div>

        <categories-table :categories="categories"/>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CategoriesTable from '@/Jetstream/CategoriesTable.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CategoriesTable
        },
        props: {
            categories: Object,
        },
    }
</script>
