<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="w-full flex flex-row justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Categories
                </h2>
                <div>
                    <Link href="categories/create" class="shadow rounded-lg bg-blue-600 text-indigo-50 p-2">Create</Link>
                </div>
            </div>
        </template>


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <categories-table :categories="categories"/>
                </div>
            </div>
        </div>

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
