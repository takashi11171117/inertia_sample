<template>
    <div>
        <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-indigo-light hover:text-indigo-dark" href="/users">Users</inertia-link>
            <span class="text-indigo-light font-medium">/</span> Create
        </h1>
        <div class="bg-white rounded shadow overflow-hidden max-w-lg">
            <form @submit.prevent="submit">
                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                    <text-input v-model="form.name" :errors="$page.errors.name" class="pr-6 pb-8 w-full lg:w-1/2" label="Name" />
                    <text-input v-model="form.email" :errors="$page.errors.email" class="pr-6 pb-8 w-full lg:w-1/2" label="Email" />
                    <text-input v-model="form.password" :errors="$page.errors.password" class="pr-6 pb-8 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
                </div>
                <div class="px-8 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-end items-center">
                    <loading-button :loading="sending" class="btn-indigo" type="submit">Create User</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
	import Layout from '@/Shared/Layout'
	import LoadingButton from '@/Shared/LoadingButton'
	import TextInput from '@/Shared/TextInput'

	export default {
		layout: Layout,
		components: {
			LoadingButton,
			TextInput,
		},
		remember: 'form',
		data() {
			return {
				sending: false,
				form: {
					name: null,
					email: null,
					password: null,
				},
			}
		},
		methods: {
			submit() {
				this.sending = true
				const data = new FormData()
				data.append('name', this.form.name || '')
				data.append('email', this.form.email || '')
				data.append('password', this.form.password || '')
				this.$inertia.post('/users', data)
				.then(() => this.sending = false)
			},
		},
	}
</script>