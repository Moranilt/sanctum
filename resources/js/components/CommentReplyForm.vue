<template>
                <form class="post-reply comment-reply" action="{{route('comment.store', $post->slug)}}">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="input" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="primary-button">Submit</button>
                        </div>

                    </div>
                </form>
</template>
