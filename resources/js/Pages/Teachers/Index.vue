<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Teacher
            </h2>
        </template>
        <div class="grid grid-cols-3">
            <div>
                <teachers-sections></teachers-sections>
            </div>
            <div></div>
            <div></div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import TeachersSections from '@/Components/Teachers/Sections'

    export default {
        components: {
            AppLayout,
            TeachersSections
        },
        props: {
        }
    }
</script>
