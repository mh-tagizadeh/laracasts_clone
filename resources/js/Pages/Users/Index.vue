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
                    <users-table :users='users.data'/>
                </div>
                <div class="w-full grid grid-cols-8">
                    <div class="col-start-2 col-span-6">
                        <pagination class="mt-6" :links="users.links" />
                    </div>
                </div>
            </div>
        </div>


    </app-layout>
</template>

<script>
    import Pagination from '@/Components/Pagination'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import UsersTable from '@/Components/UsersTable.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            UsersTable,
            Pagination
        },
      
        props: {
            users: Object,
        },
    }
</script>
