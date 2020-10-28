<template>
  <div class="section-row create-comment">
    <div class="section-title">
      <h3 class="title">Leave a reply</h3>
    </div>
    <form
      class="post-reply"
      action="#"
      method="post"
      @submit.prevent="createComment"
    >
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <textarea
              class="input"
              ref="messageTextearea"
              name="message"
              v-model="message"
              placeholder="Message"
            ></textarea>
          </div>
        </div>

        <div class="col-md-12">
          <button class="primary-button">Submit</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: '',
    }
  },
  methods: {
    createComment: function () {
      axios.post("/post/" + this.$parent.post + "/comment/store", {
          message: this.message,
        }).then(response => {
          this.$parent.updateComments()
          this.message = ''
        })
    }
  }
}
</script>
