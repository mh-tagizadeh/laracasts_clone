<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="lesson in lessons" :key="lesson.id" class="flex flex-row justify-between">
                <div>
                <td class="px-6 py-3 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ lesson.title }}
                      </div>
                    </div>
                  </div>
                </td>
                </div >
                <div class="">
                <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a :href="route('lessons.show', lesson.id)" class="text-green-600 hover:text-green-900">Show</a>
                </td>
                <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
                <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button @click="delete_lesson(lesson.id)" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
                </div>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    methods: {
        delete_lesson(id) {
            Inertia.delete(`/admin/lessons/${id}`)
        }
    },
    props: [
        'lessons'
    ]
}
</script>