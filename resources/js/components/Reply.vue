<template>
  <div class="media media-author">
    <div class="media-left">
      <img class="media-object" :src="reply.user.avatar" alt="" />
    </div>
    <div class="media-body">
      <div class="media-heading">
        <h4>
          <a
            href="#"
            >{{reply.user.name}}</a
          >
        </h4>
        <span class="time">{{createdDate}}</span>
      </div>
      <p>{{reply.body}}</p>
    </div>
  </div>
</template>

<script>
import moment from 'moment'

export default {
    props:['reply'],
    computed:{
        createdDate:function(){
            return moment(this.reply.created_at).fromNow()
        }
    }
}
</script>
