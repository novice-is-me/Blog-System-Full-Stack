<script setup>
import { Link } from '@inertiajs/vue3';
import PostComponent from '../Pages/PostComponent.vue';


const props = defineProps({
    posts: {
        type: Object,
        required: true,
    }
})

console.log(props.posts);

</script>

<template>
    <div class=" mb-5 flex gap-3 items-center">
        <h1 class=" text-2xl uppercase">Post Section</h1>
        <Link
            :href="route('posts.create')"
            class="cursor-pointer bg-blue-500 text-white px-6 py-2 rounded-lg border-blue-600 border-b-[4px] ">
            Create Post +
        </Link>
    </div>
    <div>
        <ul v-if="posts && posts.length != 0 ">
            <li v-for="post in posts" :key="post.id">
                <PostComponent :post="post" />
            </li>
        </ul>
        <p v-else >No data Available</p>
    </div>
</template>