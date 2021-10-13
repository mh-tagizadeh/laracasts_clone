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
            <div class="col-span-2 my-10 pr-3">
                <teachers-table :teachers="teachers.data"></teachers-table>
                <div class="w-full grid grid-cols-8">
                    <div class="col-start-2 col-span-6">
                        <pagination class="mt-6" :links="teachers.links" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import TeachersSections from '@/Components/Teachers/Sections'
    import TeachersTable from '@/Components/Teachers/Table'
    import Pagination from '@/Components/Pagination'

    export default {
        components: {
            AppLayout,
            TeachersSections,
            TeachersTable,
            Pagination,
        },
        props: {
            teachers: Object,
        }
    }
</script>
