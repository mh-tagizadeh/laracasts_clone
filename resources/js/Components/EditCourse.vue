<template>
<div class="grid grid-cols-6 my-16">
    <div class="col-start-2 col-span-4 bg-white shadow-lg">
        <div class="p-8">
            <form @submit.prevent="submit" enctype="multipart/form-data" >
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col p-3 gap-2">
                        <label for="title" class="text-base font-bold">Title</label>
                        <input type="text" v-model="form.title" name="title" class="w-1/2 rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        <div v-if="errors.title" class="text-red-600">{{ errors.title }}</div>
                    </div>
                    <div class="flex flex-col p-3 gap-2">
                        <label for="slug" class="text-base font-bold">Slug</label>
                        <input type="text" v-model="form.slug" name="slug" class="w-1/2 rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        <div v-if="errors.slug" class="text-red-600">{{ errors.slug}}</div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 p-3">
                        <div class="">
                            <Listbox v-model="form.category">
                                <label class="text-base font-bold">Category</label>
                                <ListboxButton class="w-full p-2 rounded ring-1 ring-blue-400">{{ form.category.name }}</ListboxButton>
                                <ListboxOptions>
                                <ListboxOption
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </ListboxOption>
                                </ListboxOptions>
                            </Listbox>
                            <div v-if="errors.category" class="text-red-600">{{ errors.category}}</div>
                        </div>
                        <div class="col-start-2">
                            <label class="text-base font-bold">Teacher</label>
                            <Listbox v-model="form.teacher">
                                <ListboxButton class="w-full p-2 rounded ring-1 ring-blue-400">{{ form.teacher.username}}</ListboxButton>
                                <ListboxOptions>
                                <ListboxOption
                                    v-for="teacher in teachers"
                                    :key="teacher.id"
                                    :value="teacher.id"
                                >
                                    {{ teacher.username }}
                                </ListboxOption>
                                </ListboxOptions>
                            </Listbox>
                            <div v-if="errors.teacher" class="text-red-600">{{ errors.teacher}}</div>
                        </div>
                    </div>
                    <div class="flex flex-col p-3 gap-2">
                        <label for="description" class="text-base font-bold">Description</label>
                        <textarea type="text" v-model="form.description" name="description" rows="5"  class="rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        </textarea>
                        <div v-if="errors.description" class="text-red-600">{{ errors.description}}</div>
                    </div>
                    <div class="flex flex-col p-3 gap-2">
                        <label for="puinshed_at" class="text-base font-bold">Punished_at</label>
                        <input type="date" v-model="form.punished_at" name="punished_at" class="w-1/2 rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        <div v-if="errors.punished_at" class="text-red-600">{{ errors.punished_at}}</div>
                    </div>
                    <div class="flex flex-col p-3 gap-2">
                        <label for="price" class="text-base font-bold">Price</label>
                        <input type="number" name="price" v-model="form.price" class="w-1/2 rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        <div v-if="errors.price" class="text-red-600">{{ errors.price}}</div>
                    </div>
                    <div class="flex flex-col p-3 gap-2">
                        <label for="image" class="text-base font-bold">Image</label>
                        <input  type="file" name="image" @input="form.image = $event.target.files[0]"   class="w-1/2 rounded-md border-none shadow-2xl ring-1 ring-blue-400 focus:ring-blue-700 focus:ring-2">
                        <div v-if="errors.image" class="text-red-600">{{ errors.image}}</div>
                    </div>
                    <!-- <div class="flex flex-col p-3 gap-2">
                        <img v-if="form.image == null" :src="image"  alt="old image">
                        <img v-else :src="url" alt="new image">
                    </div> -->
                    <button type="submit" class="shadow-lg   bg-blue-700 rounded-full w-20 h-10 text-indigo-100 my-4">Submit</button>
                </div>
                <div>{{ errors }}</div>
                <div>{{ $page.props.image_course }}</div>
            </form>
        </div>
    </div>
</div>
</template>
<script>
import { ref } from 'vue'
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import {usePage} from "@inertiajs/inertia-vue3";
    
export default {
    components: {
        Listbox,
        ListboxLabel,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        CheckIcon,
        SelectorIcon,
    },
    setup() {

        const course = usePage().props.value.course;

        const form = reactive({
            title: course.title,
            slug: course.slug,
            category: ref(course.category_id),
            teacher: ref(course.teacher_id),
            description: course.description,
            punished_at: course.punished_at,
            price: course.price,
            image: null,
        })

        function submit() {
            Inertia.put(`/admin/courses/${course.id}`,  
                form,
                );
        }


        return {
            form,
            submit,
        }
  },
  props: {
      'categories': Object,
      'teachers': Object,
      'errors': Object,
      'course': Object,
      'image_course': String,
  },
  methods: {
    // onFileChange(e) {
    //   const file = e.target.files[0];
    //   this.url = URL.createObjectURL(file);
    // }
  }
}
</script>