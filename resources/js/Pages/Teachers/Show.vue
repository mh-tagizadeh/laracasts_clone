<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ teacher.username}}
            </h2>
        </template>


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-indigo-600 overflow-hidden shadow-xl sm:rounded-lg">
                    <show :teacher="teacher" :email="email" />
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import Show from '@/Components/Teachers/Show.vue'

    export default {
        components: {
            AppLayout,
            Head,
            Link,
            Show
        },
        props: {
            teacher: Object,
            email: String,
        },
    }
</script>
