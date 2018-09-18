<?php /* Template Name: Gallery page */ 


// Custom Gallery shortcode output
function brideliness_gallery( $blank = NULL, $attr ) {

	$post = get_post();

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => '3',
        'size'       => 'brideliness-portfolio-thumb',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
	
    $selector = "pt-gallery";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
        <style type='text/css' scoped>
            #{$selector} .gallery-item {
                float: {$float};
                width: {$itemwidth}%;
            }
            /* see gallery_shortcode() in wp-includes/media.php */
        </style>";
    $size_class = sanitize_html_class( $size );

	$hover_eff =brideliness_get_option('gallery_hover');
	
    $gallery_div = "<div id='$selector' data-isotope=container data-isotope-layout=fitrows data-isotope-elements=gallery-item class='pt-gallery {$hover_eff} gallery columns-{$columns} galleryid-{$id}'>";

    // Get isotope filters
    $filters = array();

    foreach ( $attachments as $id => $attachment ) {
        if ( !empty($attachment->portfolio_filter) ) {
            $filters = array_merge($filters, explode(',' ,$attachment->portfolio_filter));
        }
    }
            
    $filters_cleared = array();
            
    foreach($filters as $filter){
        array_push($filters_cleared, trim($filter));
    }
            
    $filters = array_unique($filters_cleared);
            
    $output_filters = '';
                        
    if (!empty($filters)) {

        $output_filters = '<div class="portfolio-filters-wrapper">';
        
        $output_filters .= '<ul id="pt-image-filters" data-isotope="filters" class="filters-group"><li data-filter="*" class="selected">'.esc_html__('All','brideliness').'</li>';
                
        foreach($filters as $filter){
            $output_filters .= '<li data-filter=".'.strtolower($filter).'">'.$filter.'</li>';
        }

        $output_filters .= '</ul></div>';

    }

    $output = apply_filters( 'gallery_style', /*$gallery_style . "\n\t\t" .*/ $output_filters . $gallery_div );

    $i = 0;
	
    foreach ( $attachments as $id => $attachment ) {
        if ( ! empty( $link ) && 'file' === $link )
            $image_output = wp_get_attachment_link( $id, $size, false, false );
        elseif ( ! empty( $link ) && 'none' === $link )
            $image_output = wp_get_attachment_image( $id, $size, false );
        else
            $image_output = wp_get_attachment_link( $id, $size, true, false );

        $image_meta = wp_get_attachment_metadata( $id );

        $image_src = wp_get_attachment_url( $id ); 

        // Adding special isotope attr
        $special_filters = get_post_meta( $id, 'portfolio_filter', true );

        $attr = '';

        if( ! empty( $special_filters ) ) {
            $arr = explode( ",", $special_filters);

            $special_filter_cleared = array();
            
            foreach($arr as $special_filter){
                array_push($special_filter_cleared, trim($special_filter));
            }

            $special_filters = implode(" ", $special_filter_cleared);

            $attr = strtolower( $special_filters );
        } 

        /* Add responsive bootstrap classes */
        $classes = '';

		switch ($columns) {
            case '2':
                $classes = ' col-md-6 col-sm-12 col-xs-12';
            break;
            case '3':
                $classes = ' col-md-4 col-sm-6 col-xs-12';
            break;
            case '4':
                $classes = ' col-lg-3 col-md-4 col-sm-6 col-xs-12';
            break;
            case '6':
                $classes = ' col-lg-2 col-md-4 col-sm-6 col-xs-12';
            break;
        }

		$wrapper_button ='';
		$wrapper_button.='<div class="wrapper-buttons-gallery">
                    <a class="quick-view" rel="nofollow" href="'.$attachment->guid.'" title="'.esc_html__('Quick View', 'brideliness').'"><i class="icon-search"></i></a>';
        $wrapper_button .= brideliness_output_like_button( $attachment->ID );
        $wrapper_button.='</div>' ;


        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) )
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

        $output .= "<{$itemtag} class='gallery-item ". $attr . $classes ."'>";
        $output .= "<{$icontag} class='gallery-icon {$orientation}'>".$image_output;
		if($hover_eff=='hover-2'){
			$output .= $wrapper_button;
		}
		$output .= " </{$icontag}>";
        if ( $captiontag && trim($attachment->post_title) ) {
            $output .= "<{$captiontag} class='gallery-item-description'>";
			$output .="<div class='wrapper-info'><h3><a href='".get_permalink($attachment->ID)."' title='".esc_html__( 'Click to learn more', 'brideliness')."'>" . wptexturize($attachment->post_title) . "</a></h3>";
            $output .='<div class="caption-item-gallery">'.wptexturize($attachment->post_excerpt).'</div>';
            $output .= "</div>";
			if($hover_eff=='hover-1'){$output .= $wrapper_button;}
			$output .="</{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div>\n";

    return $output;

}
add_filter( 'post_gallery', 'brideliness_gallery', 10, 2);
?>


<?php get_header(); ?>

    <main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
		
		<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'brideliness' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
		) ); ?>
		
    </main><!-- end of Main content -->

    <?php get_sidebar(); ?>

<?php get_footer(); ?>