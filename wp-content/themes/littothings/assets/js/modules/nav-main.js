// Top Nav control & dropdown toggle
// --------------------------------------------------

// Nav control
function navToggle() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $target = $('.js-nav-toggle'),
        $target_contain = $target.parent().parent();

    $target.each(function() {

        var $button_object = $(this),

            $dropdowns = $button_object.parent().find('.js-nav-dropdown'),

            // State classes
            state = {
                open: 's-show-nav',
                close: 's-close-nav'
            };

            var nav_open = false;

        // Toggle the nav
        function toggleTags() {

            $target_contain.toggleClass(state.open);

            // If we don't have the open class we need the close class
            if(!$target_contain.hasClass(state.open)) {
                $target_contain.addClass(state.close);
                $button_object.removeClass(state.close);
                $dropdowns.find('.nav-item-sub-wrap').css({
                    'opacity': 1
                });
            } else {
                $target_contain.removeClass(state.close);
            }

        }

        // Bind the events
        function bindEvents() {

            // Bind click to button
            $button_object.on('click', function() {

                toggleTags();
            });

        }

        bindEvents();

    });
}

// Nav control
function navDropDown() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $target = $('.js-nav-dropdown');

    $target.each(function() {

        var $button_object = $(this),
            $dropdown = $button_object.find($('.nav-item-sub-wrap')),

            // State classes
            state = {
                open: 's-show-nav-dropdown',
                close: 's-close-nav-dropdown'
            };

        // Toggle the nav
        function toggleTags() {

            // Find siblings with the open class
            var $button_object_sibs = $button_object.siblings('.s-show-nav-dropdown'),
                $button_object_sibs_dropdowns = $button_object_sibs.find($('.nav-item-sub-wrap'));

            // Remove the open class and add the close class to all open items
            $button_object_sibs.addClass(state.close).removeClass(state.open);
            $button_object_sibs_dropdowns.css('height', '');

            // Open the current item
            $button_object.toggleClass(state.open);

            $dropdown.css('height', $dropdown[0].scrollHeight);

            // If we don't have the open class we need the close class
            if(!$button_object.hasClass(state.open)) {
                $button_object.addClass(state.close);
                $dropdown.css('height', '');
            } else {
                $button_object.removeClass(state.close);
            }

        }

        // Bind the events
        function bindEvents() {

            // Bind click to button
            $button_object.on('click', function() {

                toggleTags();
            });

        }

        bindEvents();

    });
}

// Woocommerce doesn't set an active state on the tabs content
// This fixes that
function wooTabsUpdate() {

    // Define jQuery (Wordpress uses no conflict)
    var $ = jQuery;

    var $tabs_wrapper = $('.tabs-wrap'),
        $tabs_buttons_wrap = $('.tabs '),
        $tabs = $tabs_wrapper.find('.woocommerce-Tabs-panel'),
        $tabs_buttons = $tabs_buttons_wrap.find('li');


    $tabs_buttons.each(function() {
        var $el = $(this),
            $el_aria = $el.attr('aria-controls');
        $el.on('click', function() {
            findTab($el_aria);
        });
    });

    function findTab(trigger) {
        $tabs.each(function() {
            var $tab = $(this);
            if($tab.attr('id') === trigger) {
                $tab.addClass('active');
            } else {
                $tab.removeClass('active');
            }
        })
    }
}

jQuery(document).ready(function() {

    navToggle();
    navDropDown();
    wooTabsUpdate();

});