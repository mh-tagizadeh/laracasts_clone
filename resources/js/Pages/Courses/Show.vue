<template>
    <app-layout title="Dashboard">
        <template #header >
            <div class="w-full flex flex-row justify-between ">

                <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
                    {{ course.title }}
                </h2>
            </div>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <show-course :course='course' :teacher='teacher'></show-course>
                </div>
            </div>
        </div>



        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <lessons-table :lessons='lessons'></lessons-table>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import LessonsTable from '@/Components/Lessons/Table.vue'
    import ShowCourse from '@/Components/Courses/Show.vue'


    export default {
        components: {
            AppLayout,
            Head,
            Link,
            LessonsTable,
            ShowCourse
        },
      
        props: {
            course: Object,
            lessons: Object,
            teacher: String,
        },
    }
</script>
