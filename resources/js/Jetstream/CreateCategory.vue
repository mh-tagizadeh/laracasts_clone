<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="flex flex-col m-10 p-5">
                            <div class="flex flex-row">
                                <label for="name">Name:</label>
                                <input id="name" class="w-full border-2 rounded-lg shadow-lg mx-2 focus:border-blue-600" v-model="form.name" />
                            </div>
                            <div class="flex flex-col">
                                <label for="description" class="py-1">Description:</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="rounded-xl shadow-lg z-10" v-model="form.description"></textarea>
                            </div>
                            <button type="submit" class="shadow-lg   bg-blue-700 rounded-full w-20 h-10 text-indigo-100 my-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    setup () {
        const form = reactive({
        name: null,
        description: null,
        })

        function submit() {
            Inertia.post('/admin/categories', form)
        }

    return { form, submit }
  },
}
</script>