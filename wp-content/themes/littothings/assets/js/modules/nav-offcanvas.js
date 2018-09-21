// Nav control
function navOffCanvas() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $body = $('body'),
        $target = $('.js-nav-offcanvas');

    $target.each(function() {


        var $this = $(this),
            $button = $this.find('.js-nav-offcanvas-button'),

            // State classes
            state = {
                open: 's-show-offcanvas-nav',
                close: 's-close-offcanvas-nav',
                blur: 's-blur-content'
            };

        // Toggle the nav
        function toggleTags() {

            $this.toggleClass(state.open);
            $body.toggleClass(state.blur);


            // If we don't have the open class we need the close class
            if(!$this.hasClass(state.open)) {
                $this.addClass(state.close);
            } else {
                $this.removeClass(state.close);
            }

        }

        // Bind the events
        function bindEvents() {

            // Bind click to button
            $button.on('click', function(event) {

                event.stopPropagation();
                toggleTags();
                // navOpen();
            });

        }

        bindEvents();

    });
}

jQuery(document).ready(navOffCanvas);