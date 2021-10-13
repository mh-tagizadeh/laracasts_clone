<template>
    <app-layout title="Dashboard">
        <template #header >
            <div class="w-full flex flex-row justify-between ">

                <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
                    Courses
                </h2>
                <div>
                    <Link :href="route('courses.create')" class="shadow rounded-lg bg-blue-600 text-indigo-50 p-2">Create</Link>
                </div>
            </div>
        </template>


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <courses-table :courses='courses.data'></courses-table>
                </div>
                <div class="w-full grid grid-cols-8">
                    <div class="col-start-2 col-span-6">
                        <pagination class="mt-6" :links="courses.links" />
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CoursesTable from '@/Components/CoursesTable.vue'
    import Pagination from '@/Components/Pagination'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CoursesTable,
            Pagination
        },
      
        props: {
            courses: Object,
        },
    }
</script>
