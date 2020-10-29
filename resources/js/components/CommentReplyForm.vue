<template>
  <form class="post-reply comment-reply" @submit.prevent="newReply">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <textarea
            class="input"
            placeholder="Message"
            v-model="message"
          ></textarea>
        </div>
      </div>

      <div class="col-md-12">
        <button class="primary-button">Submit</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  props: ["comment"],
  data(){
      return{
          message: ''
      }
  },
  methods:{
      newReply:function(){
          axios.post('/post/'+this.comment.post.id+'/comment/store', {
              parent_id: this.comment.id,
              message: this.message
          }).then(response => {
              console.log(response.data.message)
              this.$parent.addReply(response.data.message)
          })
      }
  }
};
</script>
