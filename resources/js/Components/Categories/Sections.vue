<template>
<div class="flex flex-col my-10 mx-7 rounded-lg bg-indigo-600">
    <Link :href="route('categories.parents')" class="ring-1 ring-white text-white py-2 text-center">
        Parent Categories
    </Link>
    <Link :href="route('categories.index')" class="ring-1 ring-white text-white py-2 text-center">
        Categories
    </Link>
    <Link :href="route('categories.create')" class="ring-1 ring-white text-white py-2 text-center">
        Create Category
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