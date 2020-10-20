

(function($) {



let commentReply = `
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
`
$('.reply').click(function(e){
    e.preventDefault()
    let comment_id = $(this).parent().data('comment-id')
    let route = $(this).parent().data('route')
    let token = $(this).parent().data('token')
    console.log(route)
    $(this).after(`
    <form class="post-reply comment-reply" action="`+route+`">
    <input type="hidden" name="_token" value="`+token+`">
    <input type="hidden" name="parent_id" value="`+comment_id+`">
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
    `)
})

	// Mobile dropdown
	$('.has-dropdown>a').on('click', function() {
		$(this).parent().toggleClass('active');
    });



	// // Aside Nav
	// $(document).click(function(event) {
	// 	if (!$(event.target).closest($('#nav-aside')).length) {
	// 		if ( $('#nav-aside').hasClass('active') ) {
	// 			$('#nav-aside').removeClass('active');
	// 			$('#nav').removeClass('shadow-active');
	// 		} else {
	// 			if ($(event.target).closest('#aside-btn').length) {
	// 				$('#nav-aside').addClass('active');
	// 				$('#nav').addClass('shadow-active');
	// 			}
	// 		}
	// 	}
	// });

	$('.nav-aside-close').on('click', function () {
		$('#nav-aside').removeClass('active');
		$('#nav').removeClass('shadow-active');
	});


	$('.search-btn').on('click', function() {
		$('#nav-search').toggleClass('active');
	});

	$('.search-close').on('click', function () {
		$('#nav-search').removeClass('active');
	});

	// Parallax Background
	$.stellar({
		responsive: true
	});
})(jQuery);

const nav_aside = document.getElementById('nav-aside')
const nav = document.getElementById('nav')
const aside_btn = document.getElementById('aside-btn')

aside_btn.addEventListener('click', function(e){
    e.preventDefault()
    nav_aside.classList.toggle('active')
    nav.classList.toggle('shadow-active')
})
