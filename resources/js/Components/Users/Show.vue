<template>
    <div class="col-start-2 col-span-4 px-10">
        <div class="grid grid-rows-3 grid-flow-col text-white">
            <div class="row-span-3 col-span-1 my-5" >
                <img class="bg-auto rounded-full h-48 w-48 p-4" :src="user.profile_image" alt="" />
            </div>
            <div class="col-span-2 my-10" >
                <div class="text-xl font-bold">{{ user.email}}</div>
                <div class="text-sm font-light">{{ user.name }}</div>
            </div>
            <div class="col-span-2 my-10" >
                <div class="text-xl font-bold">Role</div>
                <div class="text-sm font-light">{{ user.role[0] }}{{ user.role[1] ? ' ,'+user.role[1] : ''}}</div>
            </div>
            <div class="row-span-2 col-span-10 my-10 bg-white rounded-2xl shadow-xl text-black">
                <div class="flex justify-between my-6 ">
                    <div class="px-4 text-base font-semibold">Email Verify</div>
                    <span class="mr-4 px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ get_status(user.email_verify)}}
                    </span>
                </div>
                <div class="flex justify-between my-6">
                    <div class="px-4 text-base font-semibold">Two Factor Auth</div>
                    <span class="mr-4 px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ get_status(user.two_factor_status)}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'user'
    ],
    methods: {
        get_status(Verify){
            return Verify ? 'active' : 'not active';
        }
    }
}
</script>