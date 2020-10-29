<template>
    <div class="pop-out-msg">
        <p>{{message}}</p>
    </div>
</template>

<script>
export default {
    props:['showMsg', 'message']
}
</script>
