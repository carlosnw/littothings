jQuery(document).ready(function($){
    $(".scroll-to-subscribe").click(function(){
        $("html, body").animate({
            scrollTop: $('#mailpoet_form-4').offset().top
        }, 1000);
    });
})