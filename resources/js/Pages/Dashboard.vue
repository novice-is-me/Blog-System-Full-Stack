<script setup>
import PostSection from '@/Components/PostSection.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Object,
        required: true,
    }
})

</script>

<template>
    <Head title="Dashboard" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2
            class="text-xl font-semibold leading-tight text-gray-800"
            >
            Welcome to Blog Post!
        </h2>
    </template>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <PostSection :posts="posts"/>
        </div>
    </div>
    </AuthenticatedLayout>
</template>
