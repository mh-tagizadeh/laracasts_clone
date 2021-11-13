<template>
<div class="flex flex-col my-10 mx-7 rounded-lg bg-indigo-600">
    <Link :href="route('plans.index')" class="ring-1 ring-white text-white py-2 text-center">
        Plans
    </Link>
    <Link :href="route('team-plans.index')" class="ring-1 ring-white text-white py-2 text-center">
        Team Plans
    </Link>
    <Link :href="route('plans.create')" class="ring-1 ring-white text-white py-2 text-center">
        Create Plan
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