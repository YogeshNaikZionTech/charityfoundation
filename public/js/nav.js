
$(document).ready(function(){
     $('#activity li a').addClass('greycolor');
        $(this).scrollTop(0);
});

$(document).ready(function(){
    var scroll_start = 1;
    var startChange = $('.nav1');
    var offset = startChange.offset();
    $(document).scroll(function() {
        scroll_start = ($(this).scrollTop()>0);
        if(scroll_start > offset.top) {
            $('.nav1').addClass('grad');
            $('#activity li a').addClass('fontcolor');
            $('#activity li a').removeClass('greycolor');
        } 
        else {
            $('.nav1').removeClass('grad');
            $('#activity li a').removeClass('fontcolor');
            $('#activity li a').addClass('greycolor');
        }
    });
    
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},1000);
        return false;
    });
});
