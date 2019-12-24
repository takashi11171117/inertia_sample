<template>
    <div>
        <div class="mb-8 flex justify-start max-w-lg">
            <h1 class="font-bold text-3xl">
                <inertia-link class="text-indigo-light hover:text-indigo-dark" href="/users">Users</inertia-link>
                <span class="text-indigo-light font-medium">/</span>
                {{ form.name }}
            </h1>
        </div>
        <div class="bg-white rounded shadow overflow-hidden max-w-lg">
            <form @submit.prevent="submit">
                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                    <text-input v-model="form.name" :errors="$page.errors.name" class="pr-6 pb-8 w-full lg:w-1/2" label="First name" />
                    <text-input v-model="form.email" :errors="$page.errors.email" class="pr-6 pb-8 w-full lg:w-1/2" label="Email" />
                    <text-input v-model="form.password" :errors="$page.errors.password" class="pr-6 pb-8 w-full lg:w-1/2" type="password" autocomplete="new-password" label="Password" />
                </div>
                <div class="px-8 py-4 bg-grey-lightest border-t border-grey-lighter flex items-center">
                    <loading-button :loading="sending" class="btn-indigo ml-auto" type="submit">Update User</loading-button>
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
		metaInfo() {
			return {
				title: `${this.form.first_name} ${this.form.last_name}`,
			}
		},
		layout: Layout,
		components: {
			LoadingButton,
			TextInput,
		},
		props: {
			user: Object,
		},
		remember: 'form',
		data() {
			return {
				sending: false,
				form: {
					name: this.user.name,
					email: this.user.email,
					password: this.user.password,
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
				data.append('_method', 'put')

				this.$inertia.post(`/users/${this.user.id}`, data)
				.then(() => {
					this.sending = false
					if (Object.keys(this.$page.errors).length === 0) {
						this.form.password = null
					}
				})
			},
		},
	}
</script>