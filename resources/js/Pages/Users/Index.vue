<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <users-table :users='users'/>
                </div>
            </div>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import UsersTable from '@/Components/UsersTable.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            UsersTable
        },
      
        props: {
            users: Object,
        },
    }
</script>
