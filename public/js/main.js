

(function($) {


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
