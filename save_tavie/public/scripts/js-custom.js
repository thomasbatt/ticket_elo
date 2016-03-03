// $(document).ready(function(){

// $(function(){
 
//     $(document).on( 'scroll', function(){
 
//     	if ($(window).scrollTop() > 100) {
// 			$('.scroll-top-wrapper').addClass('show');
// 		} else {
// 			$('.scroll-top-wrapper').removeClass('show');
// 		}
// 	});
 
// 	$('.scroll-top-wrapper').on('click', scrollToTop);
// });
 
// function scrollToTop() {
// 	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
// 	element = $('body');
// 	offset = element.offset();
// 	offsetTop = offset.top;
// 	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
// }

// });


 $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });