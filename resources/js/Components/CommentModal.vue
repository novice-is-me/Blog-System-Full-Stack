<script setup>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import { comment } from 'postcss';
import { ref } from 'vue';

const modalOpen = ref(false);

const props = defineProps({
    post: {
        type: Object,
        required: true,
    }
})

// For form
const form = useForm({
    content: "",
})

const toggleModal = () => {
    modalOpen.value = !modalOpen.value;
    console.log(modalOpen.value);
}

const addComment = () => {
    console.log('Comment added');
    // Route for comment. We have form so use the form
    form.post(route('posts.comment', { index: props.post.id}))
}

const formatDate = (date) => {
    return new Date(date).toLocaleDateString();
}

const deleteComment = (commentId) => {
    alert('Are you sure you want to delete this comment?');
    Inertia.delete(route('posts.delete', { index: commentId }))
}

console.log(props.post.comments);

</script>

<template>
    <button @click.prevent="toggleModal">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M3 5.983C3 4.888 3.895 4 5 4h14c1.105 0 2 .888 2 1.983v8.923a1.992 1.992 0 0 1-2 1.983h-6.6l-2.867 2.7c-.955.899-2.533.228-2.533-1.08v-1.62H5c-1.105 0-2-.888-2-1.983V5.983Zm5.706 3.809a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Zm2.585.002a1 1 0 1 1 .003 1.414 1 1 0 0 1-.003-1.414Zm5.415-.002a1 1 0 1 0-1.412 1.417 1 1 0 1 0 1.412-1.417Z" clip-rule="evenodd"/>
        </svg>
    </button>
    
    <div v-if="modalOpen" class="size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div 
        class="transition-all transform ease-in-out duration-300 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center"
        :class="{
            'opacity-100 scale-100': modalOpen,
            'opacity-0 scale-95': !modalOpen
        }"
    >
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="font-bold text-gray-800">
                    Comments
                </h3>
                <button @click.prevent="toggleModal" type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form>
                <!-- Section -->
                    <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                        <!-- Comment Content -->
                        <div class=" ">
                            <ul v-if="post.comments" >
                                <li v-for="comment in post.comments" :key="comment.id">
                                    <div class="  border border-blue-400 rounded p-4 mb-2">
                                        <div class=" flex justify-between items-center">
                                            <p>{{ comment.user.name }}</p>
                                            <p class=" text-sm text-gray-500">{{ formatDate(comment.user.created_at) }}</p>
                                        </div>
                                        <p class="mt-2 text-gray-800">{{ comment.content}}</p>
                                        <button class=" bg-red-300 px-2 py-1 rounded mt-4" @click.prevent="deleteComment(comment.id)">Delete this post</button>
                                    </div>
                                </li>
                            </ul>
                            <p v-else>No Comments Yet...</p>
                        </div>
                        <!-- Creating A Comment -->
                        <div class="mt-2 space-y-3">
                            <input 
                                v-model="form.content"
                                placeholder="Add your comment here..."
                                type="text" 
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        </div>
                    </div>
                    <!-- End Section -->
                </form>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                <button @click.prevent="toggleModal" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50">
                    Back
                </button>
                <button @click.prevent="addComment" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50">
                    Comment
                </button>
            </div>
        </div>
    </div>
    </div>

</template>