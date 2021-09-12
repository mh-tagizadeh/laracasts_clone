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
            <div class="col-span-2 my-10 mr-5">
                <request-data :request='request' :email='email'></request-data>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import TeachersSections from '@/Components/Teachers/Sections'
    import RequestData from '@/Components/Teachers/RequestData.vue'

    export default {
        components: {
            AppLayout,
            TeachersSections,
            RequestData,
        },
        props: {
            request: Object,
            email: String,
        }
    }
</script>
