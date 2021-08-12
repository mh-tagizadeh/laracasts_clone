<template>
<div class="container mx-10">
  <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
              <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                  </th>
              </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="category in categories" :key="category.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                          {{ category.name }}
                      </div>
                      </div>
                  </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <Link :href="'/admin/categories/'+category.id+'/edit'" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                  </td>
              </tr>
              </tbody>
          </table>
          </div>
      </div>
      </div>
  </div>
</div>
</template> 

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
export default {
    components:{
        Head,
        Link
    },
    props: [
      'categories' 
    ]
}
</script>