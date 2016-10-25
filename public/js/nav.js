/**
 * Created by vJay on 10/25/2016.
 */

    $(document).ready(function(){
        $(this).scrollTop(0);
    });
$(document).ready(function(){
    var scroll_start = 1;
    var startChange = $('.nav1');
    var offset = startChange.offset();
    $(document).scroll(function() {
        scroll_start = ($(this).scrollTop()>0);
        if(scroll_start > offset.top) {
            $('.nav1').css('background-color', '#2c7873');
        } else {
            $('.nav1').css('background-color', 'transparent');
        }
    });
//        });
//        $(document).ready(function(){

//Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
//Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},1000);
        return false;
    });
});
