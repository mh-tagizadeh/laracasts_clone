<template>
<div class="flex flex-col my-10 mx-7 rounded-lg bg-indigo-600">
    <Link :href="route('teacher.requests')" class="ring-1 ring-white text-white py-2 text-center">
        Requests
    </Link>
    <Link :href="route('courses.index')" class="ring-1 ring-white text-white py-2 text-center">
        Teachers
    </Link>
    <Link :href="route('teacher.requests')" class="ring-1 ring-white text-white py-2 text-center">
        Banned Teachers
    </Link>
</div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link
    }
}
</script>