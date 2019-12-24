<template>
    <div>
        <h1 class="mb-8 font-bold text-3xl">Users</h1>
        <div class="mb-6 flex justify-between items-center">
        </div>
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">Name</th>
                    <th class="px-6 pt-6 pb-4">Email</th>
                </tr>
                <tr v-for="user in users" :key="user.id" class="hover:bg-grey-lightest focus-within:bg-grey-lightest">
                    <td class="border-t">
                        <a class="px-6 py-4 flex items-center focus:text-indigo" href="#">
                            {{ user.name }}
                            <icon v-if="user.deleted_at" name="trash" class="flex-no-shrink w-3 h-3 fill-grey ml-2" />
                        </a>
                    </td>
                    <td class="border-t">
                        <a class="px-6 py-4 flex items-center" href="#" tabindex="-1">
                            {{ user.email }}
                        </a>
                    </td>
                </tr>
                <tr v-if="users.length === 0">
                    <td class="border-t px-6 py-4" colspan="4">No users found.</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
	import Icon from '@/Shared/Icon'
	import Layout from '@/Shared/Layout'
	export default {
		metaInfo: { title: 'Users' },
		layout: Layout,
		components: {
			Icon,
		},
		props: {
			users: Array,
		},
	}
</script>