<?php
/**
 * Carousel shortcode template
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<script>
    jQuery(function(){
        jQuery(document.body)
            .on('click touchend','#swipebox-slider .current img', function(e){
                jQuery('#swipebox-next').click();
                return false;
            })
            .on('click touchend','#swipebox-slider .current', function(e){
                jQuery('#swipebox-close').trigger('click');
            });
    });
    jQuery(function($) {
        $(".swipebox").swipebox({
            hideBarsDelay: 0
        });
    });
    jQuery(document).ready(function() {
        jQuery("#owl-<?php echo $i; ?>").owlCarousel({
            lazyLoad: true,
            items: <?php echo $items_num ?>,
            itemsDesktop: [1199,<?php echo $items_num ?>],
            itemsDesktopSmall: [980,<?php echo $items_num ?>],
            itemsTablet: [768,<?php echo $items_num ?>],
            itemsMobile: [479,<?php echo $items_num ?>],
            stopOnHover: true,
            navigation: <?php echo $nav ?>,
            afterAction: callback_height
        });
        function callback_height() {
            let it = jQuery("#owl-<?php echo $i; ?>").find('.owl-item a');
            it.css( 'height', it.first().outerWidth() );
        }
        jQuery("#owl-<?php echo $i; ?>").fadeIn();
    });
</script>

<div id="owl-<?php echo $i ?>" class="owl-example enjoy-instagram-carousel" style="display:none;">
    <?php foreach( $result as $entry ) :
        $link = $entry['images']['standard_resolution']['url'];
        $url = ($items_num > 3) ? $entry['images']['thumbnail']['url'] : $entry['images']['standard_resolution']['url'];
        $entry['type'] == 'video' && $link = $entry['videos']['standard_resolution']['url'];
        $link_style = "style=\"background-image: url('{$entry['images']['standard_resolution']['url']}'); background-size: cover; display: block; opacity: 1;\"";
        ?>
        <div class="box">
            <a title="<?php echo $entry['caption']['text'] ?>" rel="gallery_swypebox" class="swipebox" href="<?php echo $link ?>" <?php echo $link_style ?>>
                <img alt="<?php echo $entry['caption']['text'] ?>" src="<?php echo $url ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>