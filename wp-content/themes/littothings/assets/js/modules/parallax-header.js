// Nav control
function parrallaxHeader() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $window = $(window),
        $target = $('.js-image-parallax');

    $target.each(function() {

        var $image_el = $(this);
        var pos = $window.scrollTop()/2;

        $image_el.animate({
            'opacity': '1'
        }, {
            step: function (now, fx) {
                $(this).css({
                    '-webkit-transform':'translate3d(0,' + pos + 'px, 0)',
                    '-o-transform':'translate3d(0,' + pos + 'px, 0)',
                    '-ms-transform':'translate3d(0,' + pos + 'px, 0)'
                });
            },
            duration: 200,
            easing: 'linear',
            queue: false,
            complete: function () {
                // alert('Animation is done');
            }
        }, 'linear');

        $window.on('scroll', function() {

            pos = $window.scrollTop()/2;

            $image_el.animate({
                'opacity': '1'
            }, {
                step: function (now, fx) {
                    $(this).css({
                        '-webkit-transform':'translate3d(0,' + pos + 'px, 0)',
                        '-o-transform':'translate3d(0,' + pos + 'px, 0)',
                        '-ms-transform':'translate3d(0,' + pos + 'px, 0)'
                    });
                },
                duration: 200,
                easing: 'linear',
                queue: false,
                complete: function () {
                    // alert('Animation is done');
                }
            }, 'linear');
        });

    });
}

jQuery(document).ready(function() {

    parrallaxHeader();

});