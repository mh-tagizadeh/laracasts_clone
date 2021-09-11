<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Requests for apply teacher
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <requests-table :users='users'/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import RequestsTable from '@/Components/Teachers/RequestsTable.vue'

    export default {
        components: {
            AppLayout,
            RequestsTable,
        },
        props: {
            users: Object,
        }
    }
</script>
