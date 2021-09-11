<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Requests for apply teacher
            </h2>
        </template>
        <div class="grid grid-cols-3">
            <div>
                <teachers-sections></teachers-sections>
            </div>
            <div class="col-span-2 my-10 mx-7">
                <requests-table :users='users' class="w-full bg-white overflow-hidden shadow-xl rounded-lg"/>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import RequestsTable from '@/Components/Teachers/RequestsTable.vue'
    import TeachersSections from '@/Components/Teachers/Sections.vue'

    export default {
        components: {
            AppLayout,
            RequestsTable,
            TeachersSections
        },
        props: {
            users: Object,
        }
    }
</script>
