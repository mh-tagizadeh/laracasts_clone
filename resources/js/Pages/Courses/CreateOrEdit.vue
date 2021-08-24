<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Course
            </h2>
        </template>

        <create-course :teachers="teachers" :categories="categories"></create-course>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CreateCourse from '@/Components/CreateCourse.vue'


    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CreateCourse
        },
      
        props: {
            teachers: Object,
            categories: Object,
        },
    }
</script>
