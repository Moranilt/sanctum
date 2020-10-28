<template>

<div class="media">
            <div class="media-left">
                <img class="media-object" :src="item.user.avatar" alt="">
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h4><a href="#">{{item.user.name}}</a></h4>
                    <span class="time" >{{createdDate}}</span>
                </div>
                <p>{{item.body}}</p>

                <div class="button-group">
                <a href="#" class="reply" v-on:click.prevent="showForm = !showForm">Reply</a>

                    <slot></slot>
            </div>

                <comment-reply-form v-if="showForm" :comment="item"></comment-reply-form>
                <reply-component v-for="reply in comment.replies" :key="reply.id" :reply="reply"></reply-component>
            </div>
        </div>

</template>


<script>
import moment from 'moment'
import CommentReplyForm from './CommentReplyForm.vue'
import ReplyComponent from './Reply.vue'

export default {
    props: ['comment'],
    components:{CommentReplyForm, ReplyComponent},
    data(){
        return{
            item: this.comment,
            showForm: false
        }
    },
    computed:{
        createdDate:function(){
            return moment(this.item.created_at).fromNow()
        }
    },
    methods:{
        addReply:function(){
            this.$parent.updateComments()
            this.showForm = false
        }
    }

}
</script>
