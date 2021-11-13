<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Plans
            </h2>
        </template>

		<div class="grid grid-cols-3">
            <div>
            	<plan-sections></plan-sections>
            </div>
            <div class="col-span-2 my-10 pr-3">
                <plans-table :plans='plans'/>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import PlanSections from '@/Components/Plans/Sections.vue'
    import PlansTable from '@/Components/Plans/Table.vue'

    export default {
        components: {
            AppLayout,
            PlanSections,
            PlansTable,
        },
        props: {
            'plans' : Object,
        },
    }
</script>


	
