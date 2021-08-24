<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courses
            </h2>
        </template>

        <div class="pt-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <Link :href="route('courses.create')" class="shadow rounded-lg bg-blue-600 text-indigo-50 p-2">Create</Link>
        </div>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <courses-table :courses='courses'></courses-table>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CoursesTable from '@/Components/CoursesTable.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CoursesTable
        },
      
        props: {
            courses: Object,
        },
    }
</script>
