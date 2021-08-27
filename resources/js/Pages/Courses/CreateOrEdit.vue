<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Course
            </h2>
        </template>

        <create-course v-if="course == null" :teachers="teachers" :errors="errors" :categories="categories"></create-course>
        <edit-course v-else :teachers="teachers" :errors="errors" :categories="categories" :course="course" :image="image"></edit-course>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import CreateCourse from '@/Components/CreateCourse.vue'
    import EditCourse from '@/Components/EditCourse.vue'


    export default {
        components: {
            AppLayout,
            Head,
            Link,
            CreateCourse,
            EditCourse,
        },
      
        props: {
            teachers: Object,
            categories: Object,
            errors: Object,
            course: Object,
            image: String,
        },
    }
</script>
