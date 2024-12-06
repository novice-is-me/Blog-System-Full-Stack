<script setup>
import { onMounted, ref } from 'vue';
import CommentModal from '../Components/CommentModal.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    post: {
        type: Object,
        required: true,
    }
})

// State for liking the post
const isLiked = ref(false);
const countLike = ref(0);
const countComment = ref(0);


// Function to like the post
const likePost = () => {
    
        Inertia.post(route('posts.like', { index: props.post.id }))
        .then((response) => {
            // Update the isLiked value with the new state from the backend
            isLiked.value = response.props.liked;
            // Update the likes count with the updated count from the backend
            countLike.value = isLiked.value ? countLike.value + 1 : countLike.value - 1;
        })
        .catch((error) => {
            console.log(error);
        });
};


</script>

<template>
    <div class="flex flex-col bg-white border shadow-sm rounded-xl mb-2">
        <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800">
                {{post.user.name}}
            </h3>
            <p class="mt-1 text-gray-500">
                {{ post.content }}
            </p>
            <div class=" flex gap-4 mt-4">
                <!-- Like -->
                <div class=" flex items-center gap-1">
                    <a @click.prevent="likePost" class="inline-flex justify-center items-center gap-x-2 text-sm font-medium" href="#">
                        <svg 
                            class="w-6 h-6"
                            aria-hidden="true" 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="24" 
                            height="24"
                            :fill="isLiked ? 'red' : 'none'"
                            :class="isLiked ? 'text-red-500' : 'text-gray-800'"
                            stroke="black"  
                            viewBox="0 0 24 24"
                        >
                            <path d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z"/>
                        </svg>
                    </a>
                    <p>{{ post.likes_count }}</p>
                </div>
                <!-- Comment -->
                <div class=" items-center flex gap-1">
                    <CommentModal :post="post"/>
                    <p>{{ countComment }}</p>
                </div>
            </div>
        </div>
    </div>
</template>