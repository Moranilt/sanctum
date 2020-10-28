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

export default {
    props:['post', 'isadmin', 'user_id'],
    components: {Comment, CreateComment},
    data(){
        return{
            postComments: '',
            showDelete: this.isadmin
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
                console.log(response.data.message)
                this.postComments.splice(index, 1)
            })
        },
        updateComments:function(){
            axios.get('/api/post/'+this.post+'/comments').then(response => {
                this.postComments = response.data.comments
                this.showForm = false
            })

        }
    }
}
</script>
