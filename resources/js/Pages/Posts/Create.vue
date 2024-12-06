<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toast-notification';

const toast = useToast();
const form = useForm({
    content: "",
})

const createPost = () => {
    console.log('Post Created');
    form.post(route('posts.store'));
    toast.success('Post Created Successfully');
}

</script>

<template>
    <Head title="Dashboard" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2
            class="text-xl font-semibold leading-tight text-gray-800">
            Create a Post
        </h2>
    </template>
    
    <!-- Card Section -->
    <div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Post
                </h2>
                <p class="text-sm text-gray-600">
                    What's on your mind?
                </p>
            </div>
            
            <form>
                <!-- Section -->
                <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                    <label for="af-payment-billing-contact" class="inline-block text-sm font-medium">
                        Be Free! Share your thoughts.
                    </label>
                    
                    <div class="mt-2 space-y-3">
                        <textarea 
                            v-model="form.content"
                            type="text" 
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"> </textarea>
                    </div>
                </div>
                <!-- End Section -->
            </form>
            
            <div class="mt-5 flex justify-end gap-x-2">
                <a :href="route('dashboard')" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    Cancel
                </a>
                <button @click.prevent="createPost" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Post
                </button>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
    </AuthenticatedLayout>
</template>