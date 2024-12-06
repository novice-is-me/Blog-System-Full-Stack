import { defineStore } from 'pinia'

export const usePostStore = defineStore('post', {
    state: () => ({
        countLike: 0,
    }),
    actions: {
        getCountLike(data){
            this.countLike = data
        }
    }
})