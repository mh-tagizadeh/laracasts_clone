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
          <button class="bg-green-600 py-1 px-3 rounded">Accept</button>
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
            Full name
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ request.first_name+' '+request.last_name }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Username
          </dt>
          <dd class="flex flex-row  mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ request.username }}
          <div class="flex-grow  text-right ">
            <Link class="text-indigo-600 hover:text-indigo-900 pr-6" :href="route('users.show', request.user.id)">show</Link>
          </div>
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
              Email
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.user.email }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Phone Number
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.phone_number}}
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
              Address
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ request.address}}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Attachments
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                <div class="w-0 flex-1 flex items-center">
                  <PaperClipIcon class="flex-shrink-0 h-5 w-5 text-gray-400" aria-hidden="true" />
                  <span class="ml-2 flex-1 w-0 truncate">
                    {{ request.documents }}
                  </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <a :href="request.documents" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Download
                  </a>
                </div>
              </li>
            </ul>
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
      Inertia.delete(`/admin/teacher/request/${request.id}`);
    }

    return { reject }
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