<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="flex flex-row px-4 py-5 sm:px-6">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Request Information
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Request data for apply teacher
        </p>
      </div>
      <div class="flex-grow">
        <div class="flex flex-row gap-2 text-white justify-end">
          <form @submit.prevent="accept">
            <button type="submit" class="bg-green-600 py-1 px-3 rounded">Accept</button>
          </form>
          <form @submit.prevent="reject">
            <button type="submit" class="bg-red-600 py-1 px-3 rounded">Reject</button>
          </form>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Title
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.title }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Username
          </dt>
          <dd class="flex flex-row  mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ request.teacher.username }}
          <div class="flex-grow  text-right ">
            <Link class="text-indigo-600 hover:text-indigo-900 pr-6" :href="route('users.show', request.teacher.user.id)">show</Link>
          </div>
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
              Email
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{request.teacher.user.email}}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Description
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.description }}
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
              Message for Admin
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.description_for_admin}}
          </dd>
        </div>
      </dl>
    </div>
  </div>
</template>

<script>
import { PaperClipIcon } from '@heroicons/vue/solid'
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'
import {usePage} from "@inertiajs/inertia-vue3";

export default {
  setup() {
    const request = usePage().props.value.request;

    function reject() {
      Inertia.delete(`/admin/teacher/request/course/${request.id}`);
    }
    
    function accept() {
      Inertia.post(`/admin/teacher/request/course/${request.id}`);
    }

    return { reject, accept }
  },
  components: {
    PaperClipIcon,
    Link
  },
  props: {
      request: Object
  }
}
</script>