<template>
    <div>
    <form action="#" method="POST"  @submit.prevent="addFavoritePost">
        <button type="submit" class="primary-button"><i  v-bind:class="{far : !isActive2, 'fas' : isActive2}" class=" fa-star" style="margin-right:5px;"></i>{{textComputed}}</button>
    </form>
    </div>

</template>
<script>
import PopOutMsg from './PopOutMsg.vue'

export default {
    props: ['data', 'user_id', 'isactive'],
    components:{PopOutMsg},
    data(){
        return{
            text: '',
            isActive2: this.isactive.trim() === 'true'
        }
    },
    computed:{
        textComputed:function(){
            if(this.isActive2){
                return 'Remove from favorite'
            }else{
                return 'Add to favorite'
            }
        }
    },
    methods:{
        addFavoritePost:function(){
            axios.post('/api/post/'+this.data+'/favorite', {
                user_id:this.user_id
            }).then(response => {

                if(response.data.message){
                    this.isActive2 = true
                    this.$parent.showMsg = true
                    setTimeout(() => this.$parent.showMsg = false, 2000)
                    this.$parent.message = 'Added to favorite posts'
                }else{
                    this.isActive2 = false
                    this.$parent.showMsg = true
                    setTimeout(() => this.$parent.showMsg = false, 2000)
                    this.$parent.message = 'Removed from favorite posts'
                }

            })
        }
    }
}
</script>
