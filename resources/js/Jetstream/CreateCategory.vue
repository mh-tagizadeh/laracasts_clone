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
                            <div class="flex flex-col mt-4">
                                <Listbox v-model="form.parent_category">
                                    <ListboxLabel>Select Parent Category:</ListboxLabel>
                                    <ListboxButton class="w-full my-2 pl-4 py-2 bg-blue-700 text-white text-left rounded-lg shadow-md">
                                        {{ form.parent_category.name }}
                                        <SelectorIcon class="w-5 h-5  text-white float-right mr-2" aria-hidden="true" />
                                    </ListboxButton>
                                                <transition
                                                    enter-active-class="transition duration-100 ease-out"
                                                    enter-from-class="transform scale-95 opacity-0"
                                                    enter-to-class="transform scale-100 opacity-100"
                                                    leave-active-class="transition duration-75 ease-out"
                                                    leave-from-class="transform scale-100 opacity-100"
                                                    leave-to-class="transform scale-95 opacity-0"
                                                    >
                                    <ListboxOptions class="rounded-2xl bg ring-1 ring-black ring-opacity-5 shadow-2xl">
                                    <ListboxOption
                                        v-for="category in categories"
                                        v-slot="{ active, selected }"
                                        :key="category.id"
                                        :value="category.id"
                                    >
                                            <li
                                                :class="{
                                                    'bg-blue-500 text-white': active,
                                                    'bg-white text-black': !active
                                                }"
                                                class="flex flex-row"
                                                >
                                                <div class="w-6 h-12">
                                                    <CheckIcon v-show="selected" />
                                                </div>
                                                {{ category.name }}
                                            </li>
                                    </ListboxOption>
                                    </ListboxOptions>
                                           </transition>
                                </Listbox>
                            </div>
                            <button type="submit" class="shadow-lg   bg-blue-700 rounded-full w-20 h-10 text-indigo-100 my-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
</template>

<script>
import { ref } from 'vue'
import {
    Listbox,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    ListboxLabel,
} from '@headlessui/vue'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import {usePage} from "@inertiajs/inertia-vue3";
import { CheckIcon, SelectorIcon} from '@heroicons/vue/solid'


export default {
    components: { Listbox, ListboxButton, ListboxOptions, ListboxOption, CheckIcon,
        SelectorIcon,
        ListboxLabel, 
    },

    setup () {

        const categories = usePage().props.value.categories;


        const form = reactive({
            name: null,
            description: null,
            parent_category: ref(categories[0].id),
        })


        function submit( ) {
            console.log(form);
            Inertia.post('/admin/categories', form)
        }
        

        return { form, submit }
    },
    props: [
        'categories',
    ]
}
</script>