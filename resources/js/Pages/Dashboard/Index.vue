<template>
    <div>
        <h1 class="mb-8 font-bold text-3xl">Dashboard</h1>
        <p class="mb-12 leading-normal">{{ greeting }} Welcome to Inertia Sample</p>
    </div>
</template>

<script>
	import Layout from '@/Shared/Layout'
	export default {
		layout: Layout,
		props: {
			greeting: String,
		},
	}
</script>