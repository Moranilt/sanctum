<template>
    <div>
        <comment v-for="(comment, index) in postComments" v-bind:key="index" :comment="comment">
            <button v-if="showDelete || user_id == comment.user.id" v-on:click="deleteComment(comment.id, index)" class="reply delete-comment">delete</button>
        </comment>
        <create-comment></create-comment>

    </div>
</template>

<script>
import Comment from './Comment.vue'
import CreateComment from './CreateComment.vue'
import PopOutMsg from './PopOutMsg.vue'

export default {
    props:['post', 'isadmin', 'user_id'],
    components: {Comment, CreateComment, PopOutMsg},
    data(){
        return{
            postComments: '',
            showDelete: this.isadmin,
        }
    },
    mounted(){
        axios.get('/api/post/'+this.post+'/comments').then(response => {
            this.postComments = response.data.comments
        })
    },
    methods:{
        deleteComment: function(id, index){
            axios.delete('/api/comment/'+id+'/delete').then(response => {
                this.postComments.splice(index, 1)
                this.updateComments(response.data.message)
            })
        },
        updateComments:function(value){
            axios.get('/api/post/'+this.post+'/comments').then(response => {
                this.postComments = response.data.comments
                this.showForm = false
                this.$parent.message = value
                this.$parent.showMsg = true
                setTimeout(() => this.$parent.showMsg = false, 2000)
            })

        }
    }
}
</script>
