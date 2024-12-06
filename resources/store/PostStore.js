import { defineStore } from 'pinia'

export const usePostStore = defineStore('post', {
    state: () => ({
        comments: [],
    }),
    getters: {
        getComments(){
            return this.comments
        }
    },

})