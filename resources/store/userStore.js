import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
    state: () => ({
        user: null,
    }),
    getters: {
        isAdmin(){
            if(this.user === 0){
                return false
            }else{
                return true
            }
        }
    },
    actions: {
        setUser(data){
            this.user = data;
        }
    }

})