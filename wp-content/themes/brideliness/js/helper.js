/*Content:
           1.  Cart hover effect
           2.  Star rating update
           3.  Shipping-calculator-form
           4.  List/Grid Switcher for Shop page
           5.  Product dropdown filters animation
           6.  Select2 init
           7.  Cattegory colappse
           8.  Owl Carousel Init
           9. Isotope Init
           10. Adding Carousel to cross-sells
           11. Magnific Pop-up init(for gallery, product)
           12. Products tooltips for list product init
           13. Magnific Pop-up for Image size
           14. Sticky Menu
*/

/*1. Cart hover effect (start)*/
jQuery(document).ready(function($){
    $(window).load(function(){
    "use strict";
        var settings = {
            interval: 100,
            timeout: 100,
            over: mousein_triger,
            out: mouseout_triger
        };
        function mousein_triger(){
            $("header .widget_shopping_cart").addClass("hovered").find(".widget_shopping_cart_content").fadeIn(350, "easeInSine");
        }
        function mouseout_triger() {
            $("header .widget_shopping_cart").removeClass("hovered").find(".widget_shopping_cart_content").fadeOut(400, "easeOutSine");
        }
        $("header .widget_shopping_cart").hoverIntent(settings);
    });
});
/*1. Cart hover effect (end)*/

/*2. Star rating update (start)*/
jQuery(document).ready(function($){
    "use strict";
    $("p.stars span").replaceWith( '<span><a href="#" class="star-5">5</a><a href="#" class="star-4">4</a><a href="#" class="star-3">3</a><a href="#" class="star-2">2</a><a href="#" class="star-1">1</a></span>' );
});
/*2. Star rating update (end)*/

/*3. Shipping-calculator-form show(start)*/
jQuery(document).ready(function($){
    $(window).load(function(){
        "use strict";
            var ship_cart = $(".shipping-calculator-form");
            if(ship_cart.length > 0){
               ship_cart.show();
            }
    });
});
/*3. Shipping-calculator-form show(end)*/

/*4. List/Grid Switcher for Shop page (start)*/
jQuery(document).ready(function($){
    "use strict";
        if ($(".pt-view-switcher span.pt-list").hasClass("active")) {
            $("ul.products").find(".product").each(function() {
                if ($(".pt-view-switcher span.pt-list").not(".list-view")) {
                    $(".pt-view-switcher span.pt-list").addClass("list-view");
                }
            });
        }

        $(".pt-view-switcher").on( "click", "span", function(e) {
            e.preventDefault();
            if ( (e.currentTarget.className == "pt-grid active") || (e.currentTarget.className == "pt-list active") ) {
                return false;
            }

        var iso_container = $("[data-isotope=container]");
        var iso_object = $("[data-isotope=container]").data("isotope");

        iso_container.css({"opacity": "0", "transition":"none"}).before("<div class='switcher-animation-wrapper'></div>");

            if ( $(this).hasClass("pt-grid") && $(this).not(".active") ) {
                $(".pt-view-switcher .pt-list").removeClass("active");
                $(".pt-view-switcher .pt-grid").addClass("active");
                iso_container.find(".isotope-item").each(function(){
                    $(this).removeClass("list-view");
                    $(this).addClass("grid-view");
                });
                iso_container.imagesLoaded( function() {
                    iso_object.layout();
                });
            }

            if ( $(this).hasClass("pt-list") && $(this).not(".active") ) {
                $(".pt-view-switcher .pt-grid").removeClass("active");
                $(".pt-view-switcher .pt-list").addClass("active");
                iso_container.find(".isotope-item").each(function(){
                    $(this).addClass("list-view");
                    $(this).removeClass("grid-view");
                    $(this).find(".inner-product-content").css({
                        "width": "auto",
                        "height": "auto"
                    });
                });
                iso_container.imagesLoaded( function() {
                    iso_object.layout();
                });
            }
             iso_container.isotope( "on", "layoutComplete", function() {
                iso_container.css({"opacity":"1", "transition":"opacity .3s ease-in-out"});
                $(".switcher-animation-wrapper").remove();
           });
    });
});
/*4. List/Grid Switcher for Shop page (end)*/

/*5. Product dropdown filters animation (start)*/
jQuery(document).ready(function($){
    "use strict";
    /* Product dropdown filters animation */
        $(".widget_brideliness_shop_filters_widget .dropdown-filters").hoverIntent({
        interval: 100,
        timeout: 200,
        over: function mousein_triger(){
              $(this).find(".filters-group").css("visibility", "visible");
              $(this).addClass("hovered");
        },
        out:  function mouseout_triger() {
              $(this).removeClass("hovered");
              $(this).find(".filters-group").delay(300).queue(function() {
              $(this).css("visibility", "hidden").dequeue();
              });
        }
        });
});
/*5. Product dropdown filters animation (end)*/

/*6. Select2 init  (start)*/
jQuery(document).ready(function($){
    $(function() {
        "use strict";
        var select = $("select:not(#rating):not(.country_select)");
        select.each(function(){
            if ( $(this).hasClass("orderby") ||
                $(this).hasClass("filters-group") ||
                $(this).parent().hasClass("value")
            ){
                $(this).select2({
                    minimumResultsForSearch: -1,
                });
            } else {
                $(this).select2();
            }
        });
    });
});
/*6. Select2 init  (end)*/

/*7. Cattegory colappse (start)*/
jQuery(document).ready(function($){
    $(window).load(function(){
        if($("ul.collapse-categories li").hasClass("current-cat")){
                $("ul.collapse-categories > li.current-cat > a.show-children").removeClass("collapsed");
                $("ul.collapse-categories  li.current-cat > ul.children").removeClass("collapse").addClass("in");
            }
    });
});
/*7.  Cattegory colappse(end)*/

/*8. Owl Carousel Init (start)*/
jQuery(document).ready(function($) {
    "use strict";
    function center(number,sync2){
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for(var i in sync2visible){
                if(num === sync2visible[i]){
                    var found = true;
                }
            }
            if(found===false){
                 if(num>sync2visible[sync2visible.length-1]){
                     sync2.trigger("owl.goTo", num - sync2visible.length+2);
                }else{
                    if(num - 1 === -1){
                        num = 0;
                    }
                     sync2.trigger("owl.goTo", num);
                }
            } else if(num === sync2visible[sync2visible.length-1]){
                 sync2.trigger("owl.goTo", sync2visible[1]);
            } else if(num === sync2visible[0]){
             sync2.trigger("owl.goTo", num-1);
        }
    }

    function afterOWLinit() {
            $(".owl-controls .owl-page").append("<div class='item-link'></div>");
            var paginatorsLink = $(".owl-controls .item-link");

            $.each(this.owl.userItems, function (i) {
                $(paginatorsLink[i])
                // i - counter
                // Give some styles and set background image for pagination item
                .css({
                    "background": "url(" + $(this).find("img").attr("src") + ") center center no-repeat",
                    "-webkit-background-size": "cover",
                    "-moz-background-size": "cover",
                    "-o-background-size": "cover",
                    "background-size": "cover"
                })
             // set Custom Event for pagination item
            .click(function () {
                 $(this).trigger("owl.goTo", i);
            });
        });
    }

/*Owl Object*/
    var owlContainer = $("[data-owl=container]");

     $(owlContainer).each(function(){
/* Variables */
        var owlSlidesQty = $(this).data("owl-slides");
        var owlType = $(this).data("owl-type");
        var owlTransition = $(this).data("owl-transition");
        if ( owlSlidesQty !== 1 ) {
            owlTransition = false;
        }
        var owlNavigation = $(this).data("owl-navi");
        var owlPagination = $(this).data("owl-pagi");

/* Simple Carousel */
        if ( owlType == "simple" ) {
/* One Slide Gallery */
            if ( owlSlidesQty == 1 ) {
                $(this).owlCarousel({
                    navigation : owlNavigation,
                    navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    pagination : owlPagination,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    transitionStyle : owlTransition,
            });
        }
    }

/* Carousel with thumbs */
        if ( owlType == "with-thumbs" ) {
            var sync1 = $(this);
            var sync2 = $(this).parent().find("[data-owl-thumbs='container']");

            sync2.on("click", ".owl-item", function(e){
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync1.trigger("owl.goTo",number);
            });

            sync1.owlCarousel({
                singleItem : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                navigation : false,
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                pagination : true,
                afterAction : function(el){
                    var current = this.currentItem;
                    sync2
                        .find(".owl-item")
                        .removeClass("synced")
                        .eq(current)
                        .addClass("synced");
                         if(sync2.data("owlCarousel") !== undefined){
                           center(current,sync2);
                    }
                },
                responsiveRefreshRate : 200,
                transitionStyle : owlTransition,
            });

            sync2.owlCarousel({
                pagination : false,
                responsiveRefreshRate : 100,
                afterInit : function(el){
                    el.find(".owl-item").eq(0).addClass("synced");
            }
        });

            $(".slider-navi").find(".next").click(function(){
                owlContainer.trigger("owl.next");
            });
            $(".slider-navi").find(".prev").click(function(){
                owlContainer.trigger("owl.prev");
        });
    }

        /* Simple Carousel with icon-pagination */
        if ( owlType == "with-icons" ) {
            $(this).owlCarousel({
                navigation : true, // Show next and prev buttons
                pagination : true,
                navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
                transitionStyle : owlTransition,
                afterInit: afterOWLinit
            });
// Custom Navigation Events
            $(".slider-navi").find(".next").click(function(){
                owlContainer.trigger("owl.next");
            });
            $(".slider-navi").find(".prev").click(function(){
                owlContainer.trigger("owl.prev");
            });
        }
    });
});
/* 8. Owl Carousel Init (end) */

/* 9. Isotope Init (start) */
jQuery(document).ready(function($) {
    "use strict";
    var isotopeContainer = $("[data-isotope=container]");
    var isotopeFilters = $("[data-isotope=filters]");

    isotopeContainer.each(function(){
        var isotopeLayout = $(this).data("isotope-layout").toLowerCase();
        var isotopeElements = $(this).data("isotope-elements");
        var layout="";
        switch(isotopeLayout){
            case "fitrows"          : layout = "fitRows"; break;
            case "masonry"          : layout = "masonry"; break;
            case "vertical"         : layout = "vertical"; break;
            default                 : layout = "fitRows"; break;
        }
        // initialize Isotope after all images have loaded
        var container = $(this).imagesLoaded( function() {
            /* Add isotope special class */
            container.find("."+isotopeElements).each(function(){
                $(this).addClass("isotope-item");
            });

            /* Init Isotope */
            container.isotope({
                itemSelector : ".isotope-item",
                layoutMode : layout,
            });
        });
    });

    /* Isotope filters */
    if (isotopeFilters) {
        // store filter for each group
        var filters = {};

        isotopeFilters.on( "click", ".filter", function() {
            // get all available filters
            var all_filters = {};
            isotopeFilters.each(function(){
                $(this).children().each(function(){
                    filter = $(this).attr("data-filter");
                    if ( ($.inArray(filter, all_filters) == -1) && filter!=="" ) all_filters[filter] = 0;
                });
            });
            var updated_counters = {};
            var filtered_elements = {};

            var $this = $(this);
            // get group key
            var buttonGroup = $this.parents(".filters-group");
            var filterGroup = buttonGroup.attr("data-filter-group");
            // set filter for group
            filters[ filterGroup ] = $this.attr("data-filter");
            // combine filters
            var filterValue = "";
            for ( var prop in filters ) {
                filterValue += filters[ prop ];
            }
            // set filter for Isotope
            isotopeContainer.isotope({ filter: filterValue });
            // get filtered elements
            var filtered = isotopeContainer.data("isotope").filteredItems;
            var filtered_elements = jQuery.map( filtered, function( a ) {
                return a.element;
            });
            // get updated counters
            var updated_counters = all_filters;
             //console.log(updated_counters);
            $.each( updated_counters, function (key, value) {
                //console.log(key+' '+value);
                $.each( filtered_elements, function (i, dom_element) {
                    if( ($(dom_element).filter(key).length)!==0 ) {
                        value++;
                        updated_counters[key] = value;
                        //console.log(key+' '+value);
                    }
                });
            });
            // update counters
            $.each( updated_counters, function (key, value) {
                $(".filter").each(function(){
                    if ( $(this).attr("data-filter") == key ) {
                        $(this).find(".counter").text(value);
                    }
                });
            });
        });

        // change is-checked class on buttons
        $(".filters-group").each( function( i, buttonGroup ) {
            var buttonGroup = $( buttonGroup );
            buttonGroup.on( "click", ".filter", function() {
                buttonGroup.find(".is-checked").removeClass("is-checked");
                $( this ).addClass("is-checked");
            });
        });

        // Portfolio, Gallery special select trigger
        var select = $("ul.filters-group");

        select.find("[data-filter]").click(function(){
            var selected_selector = select.find(".selected");
             selected_selector.removeClass("selected");
             $(this).addClass("selected");
            var filters =$(this).attr("data-filter");
            if(filters!="*")
                 isotopeContainer.isotope({ filter: filters });
            else isotopeContainer.isotope({ filter: "*" });
                return false;
        });
    }
});
/* 9. Isotope Init (end) */

/* 10. Adding Carousel to cross-sells (start)*/
jQuery(document).ready(function($) {
    "use strict";
    var owl = $(".cross-sells ul.products");
        owl.owlCarousel({
        navigation : false,
        pagination : true,
        autoPlay   : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        transitionStyle : "fade",
    });
});
/* 10. Adding Carousel to cross-sells (end)*/

/* 11. Magnific Pop-up init(for gallery, product) (start)*/
jQuery(document).ready(function($) {
    "use strict";
    var magnificContainer = $("[data-magnific=container]");
	//For Single Product
    magnificContainer.each(function() {
        $(this).magnificPopup({
            removalDelay: 500,
            delegate: "a",
            type: "image",
            closeOnContentClick: false,
            closeBtnInside: true,
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    var img_desc = item.el.attr("title");
                    return img_desc + '<a class="image-source-link" href="' + item.el.attr("href") + '" target="_blank">source</a>';
                }
            },
            gallery: {
                enabled: true,
            },
            callbacks: {
                buildControls: function() {
                    // re-appends controls inside the main container
                    if (this.arrowLeft && this.arrowRight) {
                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            },
            beforeOpen: function() {
                // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
    });
});

/* Gallery Page init */
    $('.pt-gallery').each( function(){

    $(this).magnificPopup({
        mainClass: 'mfp-with-fade',
        removalDelay: 100,
        delegate: '.quick-view',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: true,
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                var img_desc = item.el.parent().parent().find('h3').html();
                return img_desc + '<a class="image-source-link" href="'+item.el.attr('href')+'" target="_blank">Source</a>';
            }
        },
        gallery: {
            enabled:true,
        },
        callbacks: {
            buildControls: function() {
            if ( this.arrowLeft && this.arrowRight ) {
                // re-appends controls inside the main container
                this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
            };
            },
        },
    });
});

});
/* 11. Magnific Pop-up init(for gallery, product) (end)*/

/* 12. Products tooltips for list product init (start)*/
jQuery(document).ready(function($) {
    "use strict";
        function product_tooltips() {
            $(".product-tooltip").hide().empty();
            $(".buttons-wrapper a").each(function() {
                $(this).hoverIntent(mousein_triger, mouseout_triger);

                function mousein_triger() {
                    if ($(this).hasClass("compare")) {
                        $(this).parent().find(".product-tooltip").css("right", "-16px").html(msg_compare).show();
                    }
                    if ($(this).hasClass("compare") && $(this).hasClass("added")) {
                        $(this).parent().find(".product-tooltip").css("right", "-16px").html(msg_added).show();
                    }
                    if ($(this).hasClass("add_to_wishlist")) {
                        $(this).parent().parent().parent().find(".product-tooltip").css("right", "28px").html(msg_wish).show();
                    }
                    if ($(this).parent().hasClass("yith-wcwl-wishlistaddedbrowse")) {
                        $(this).parent().parent().parent().find(".product-tooltip").css("right", "25px").html(msg_wish_details).show();
                    }
                    if ($(this).parent().hasClass("yith-wcwl-wishlistexistsbrowse")) {
                        $(this).parent().parent().parent().find(".product-tooltip").css("right", "34px").html(msg_wish_view).show();
                    }
                    if ($(this).hasClass("yith-wcqv-button")) {
                        $(this).parent().find(".product-tooltip").css("right", "12px").html(msg_quick).show();
                    }
                }

                function mouseout_triger() {
                    $(this).parent().find(".product-tooltip").hide().empty();
                    if ($(this).hasClass("add_to_wishlist") || $(this).parent().hasClass("add_to_wishlist") || $(this).parent().hasClass("yith-wcwl-wishlistexistsbrowse") || $(this).parent().hasClass("yith-wcwl-wishlistaddedbrowse")) {
                        $(this).parent().parent().parent().find(".product-tooltip").hide().css("right", "12px").empty();
                    }
                }
            });
        }
    product_tooltips();
});
/* 12. Products tooltips for list product init (end)*/

/*13. Magnific Pop-up for Image size (start)*/
jQuery(document).ready(function($) {
    "use strict";
    $("#wrapper-size-guide").magnificPopup({
        delegate: "a",
        type: "image",
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
        beforeOpen: function() {
            this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim");
            this.st.mainClass = this.st.el.attr("data-effect");
            }
        },
        closeOnContentClick: true,
        midClick: true
});
});
/*13. Magnific Pop-up for Image size (end)*/

/* 14. Sticky Menu (start)*/
jQuery(document).ready(function($) {

    "use strict";
    var $menu = $("nav.primary-nav");
    var $hd_h = $("header.site-header").height();
    var $hd_w = $("header.site-header").width();
    var $menu_h = $("nav.primary-nav").height();
    var $menu_sticky_h = $(".main-menu").css({'height': $menu_h});

if($hd_w > 800){
    $(window).scroll(function(){
        if ( $(this).scrollTop() > $hd_h && $menu.hasClass("default") ){
            $menu.fadeOut('fast',function(){
                $(this).removeClass("default")
                       .addClass("sticky-menu")
                       .fadeIn(500);
            });
        }

		else if($(this).scrollTop() <= $hd_h && $menu.hasClass("sticky-menu")) {
            $menu.fadeOut('fast',function(){
                $(this).removeClass("sticky-menu")
                        .addClass("default")
                        .fadeIn(300);
            });
        }
    });//scroll
}

});
/* 14. Sticky Menu  (end)*/

jQuery(document).ready(function($) {
    "use strict";
if($('body').hasClass('single_type_3')){
        setTimeout(function() {
            var $tabs = $( '.wc-tabs, ul.tabs' ).first();
            $tabs.parent().find('#tab-description').hide();
            $tabs.parent().find( '.active' ).removeClass('active');
        }, 5);
   }
});

jQuery(document).ready(function($){
    $("#toTop").click(function(){
    $("html, body").animate({scrollTop : 0},1500);
   });
})

jQuery(document).ready(function($){
$(window).load(function(){

    function SearchPT(container, s_click, s_width){

        var position='closed';
        var closedWidth = 0;

        function srchAnimate(){
                if(position != 'opened'){
                        $(container).animate({
                           width:s_width, opacity:'1'}, 400, 'easeInOutQuad', function(){
                           position = 'opened';
                        });
                        $('#brideliness-searchform-container').removeClass('close');
                        $('#brideliness-searchform-container').addClass('open');
                    }
                    else {
                        $(container).animate({
                        width:closedWidth, opacity:'0'}, 400, 'easeInOutQuad', function(){
                        position = 'closed';
                    })
                $('#brideliness-searchform-container').removeClass('open');
                $('#brideliness-searchform-container').addClass('close');
            }
        };
        $(s_click).click(srchAnimate);
    };
        SearchPT('#brideliness-searchform-container', '.show-search', 320);
    });
});