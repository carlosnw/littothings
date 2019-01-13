<?php
/**
 * Carousel widget shortcode template
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<script>
    jQuery(function () {
        jQuery(document.body)
            .on('click touchend', '#swipebox-slider .current img', function (e) {
                jQuery('#swipebox-next').click();
                return false;
            })
            .on('click touchend', '#swipebox-slider .current', function (e) {
                jQuery('#swipebox-close').trigger('click');
            });
    });
    jQuery(function ($) {
        $(".swipebox").swipebox({
            hideBarsDelay: 0
        });

    });
    jQuery(document).ready(function () {
        jQuery("#owl-<?php echo "{$id}"; ?>").owlCarousel({
            items: <?php echo "{$n}"; ?>,
            navigation: <?php echo "{$n_y_n}"; ?>,
            afterAction: callback_height
        });
        function callback_height() {
            let it = jQuery("#owl-<?php echo $i; ?>").find('.owl-item a');
            it.css( 'height', it.first().outerWidth() );
        }
        jQuery("#owl-<?php echo "{$id}"; ?>").fadeIn('slow');
    });
</script>
<div id="owl-<?php echo "{$id}"; ?>" class="owl-example enjoy-instagram-carousel">
    <?php foreach( $result as $entry ) :
        $url = ($n > 3) ? $entry['images']['thumbnail']['url'] : $entry['images']['standard_resolution']['url'];
        $link_style = "style=\"background-image: url('{$entry['images']['standard_resolution']['url']}'); background-size: cover; display: block; opacity: 1;\"";
        ?>
        <div class="box">
            <a title="<?php echo $entry['caption']['text'] ?>" rel="gallery_swypebox" class="swipebox"
               href="<?php echo $entry['images']['standard_resolution']['url'] ?>" <?php echo $link_style ?>>
                <img  src="<?php echo $url ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>