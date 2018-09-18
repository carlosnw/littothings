<?php
if ( class_exists( 'WPBakeryShortCode' ) ) :

add_action( 'vc_before_init', 'brideliness_carousel' );

function brideliness_carousel(){

vc_map( array(
		"name" => esc_html__( 'Configurable Carousel', 'themeszone-add-vc-shortcodes' ),
		"base" => "handy_carousel",
		'category' => esc_html__( 'Brideliness', 'themeszone-add-vc-shortcodes'),
		"description" => esc_html__( 'Carousel with awesome options', 'themeszone-add-vc-shortcodes' ),
		'icon' => plugin_dir_url(__FILE__) . 'images/vc-icon.png',
		"params" => array(
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title text', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'el_title',
            'value' => __('Title goes here', 'themeszone-add-vc-shortcodes'),
          ),
          array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use as banners rotator?', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'rotator',
            'description' => '',
          ),
      		array(
      			'type' => 'param_group',
      			'heading' => esc_html__( 'Carousel Images', 'themeszone-add-vc-shortcodes' ),
      			'param_name' => 'slides',
      			'value' => urlencode( json_encode( array(
      				array(
      					'label' => esc_html__( 'Facebook', 'themeszone-add-vc-shortcodes' ),
      					'url' => 'https://www.facebook.com/',
      				),
      				array(
      					'label' => esc_html__( 'Twitter', 'themeszone-add-vc-shortcodes' ),
      					'url' => 'https://twitter.com',
      				),
      				array(
      					'label' =>esc_html__( 'Google Plus', 'themeszone-add-vc-shortcodes' ),
      					'url' => 'https://plus.google.com',
      				),
      			) ) ),
      			'params' => array(
              array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'themeszone-add-vc-shortcodes' ),
                'param_name' => 'slide_img',
                'description' => esc_html__( 'Add image from Media library', 'themeszone-add-vc-shortcodes' ),
              ),
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image size', 'themeszone-add-vc-shortcodes' ),
                'param_name' => 'slide_img_size',
                'value' => array(
                  'Thumbnail' => 'thumbnail',
                  'Medium' => 'medium',
                  'Large' => 'large',
                  'Full' => 'full',
                  ),
                'std'=> 'full',
                'description' => esc_html__( "Enter image size. You can change these images' dimensions in wordpress media settings.", 'themeszone-add-vc-shortcodes' ),
              ),
      				array(
      					'type' => 'textfield',
      					'heading' => esc_html__( 'Title', 'themeszone-add-vc-shortcodes' ),
      					'param_name' => 'heading',
      					'description' => esc_html__( 'Enter heading text for item', 'themeszone-add-vc-shortcodes' ),
      					'admin_label' => true,
      				),
      				array(
      					'type' => 'textfield',
      					'heading' => esc_html__( 'Short Description', 'themeszone-add-vc-shortcodes' ),
      					'param_name' => 'description',
      					'description' => esc_html__( 'Enter description text for item', 'themeszone-add-vc-shortcodes' ),
      				),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'URL for detailed view', 'themeszone-add-vc-shortcodes' ),
                'param_name' => 'url',
                'description' => esc_html__( 'Url of a link for detailed view button', 'themeszone-add-vc-shortcodes' ),
				'value'=> 'https://www.google.com',
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Button Text (shown with banner rotator)', 'themeszone-add-vc-shortcodes' ),
                'param_name' => 'btn_txt',
                'description' => esc_html__( 'Enter text for button', 'themeszone-add-vc-shortcodes' ),
                'dependency' => array(
                  'element' => 'rotator',
                  'value' => array( 'true' ),
                ),
              ),
      			),
      		),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Items per Slide', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'per_slide',
            'value' => array(
              esc_html__( '1 item in row', 'themeszone-add-vc-shortcodes' ) => '1',
              esc_html__( '2 items in row', 'themeszone-add-vc-shortcodes' ) => '2',
              esc_html__( '3 items in row', 'themeszone-add-vc-shortcodes' ) => '3',
              esc_html__( '6 items in 2 rows', 'themeszone-add-vc-shortcodes' ) => '6',
              esc_html__( 'n items in row', 'themeszone-add-vc-shortcodes' ) => 'n',
              ),
            'std'=> '1',
            'description' => '',
            'dependency' => array(
              'element' => 'rotator',
              'value_not_equal_to' => array('true'),
            ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'How many slides to show in one moment', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'slides_qty',
            'value' => array(
              esc_html__( '2 Slides', 'themeszone-add-vc-shortcodes' ) => '2',
              esc_html__( '3 Slides', 'themeszone-add-vc-shortcodes' ) => '3',
              esc_html__( '4 Slides', 'themeszone-add-vc-shortcodes' ) => '4',
              esc_html__( '5 Slides', 'themeszone-add-vc-shortcodes' ) => '5',
              esc_html__( '6 Slides', 'themeszone-add-vc-shortcodes' ) => '6'
              ),
            'std'=> '4',
            'description' => '',
            'dependency' => array(
              'element' => 'per_slide',
              'value' => array( 'n' ),
            ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation on hover', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'hover_animation',
            'value' => array(
              esc_html__( 'Full height shift', 'themeszone-add-vc-shortcodes' ) => 'shift',
              esc_html__( 'Full height fading', 'themeszone-add-vc-shortcodes' ) => 'fading',
              esc_html__( 'Sliding from bottom', 'themeszone-add-vc-shortcodes' ) => 'bottom-sliding',
              esc_html__( 'No animation', 'themeszone-add-vc-shortcodes' ) => 'none',
              ),
            'std'=> 'shift',
            'description' => '',
            'dependency' => array(
              'element' => 'rotator',
              'value_not_equal_to' => array('true'),
            ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Transition Type', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'transition_type',
            'value' => array(
                'Fade' => 'fade',
                'Back Slide' => 'backSlide',
                'Go Down' => 'goDown',
                'Fade Up' => 'fadeUp',
              ),
            'std'=> 'fade',
            'dependency' => array(
              'element' => 'rotator',
              'value' => array( 'true' ),
            ),
          ),
          array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Autoplay', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'autoplay',
            'description' => esc_html__( 'Whether to running your carousel automatically or not', 'themeszone-add-vc-shortcodes' ),
          ),
          array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Show Arrows', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'show_arrows',
            'description' => esc_html__( 'Show/hide arrow buttons', 'themeszone-add-vc-shortcodes' ),
          ),
          array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Show Page Navigation', 'themeszone-add-vc-shortcodes' ),
            'param_name' => 'page_navi',
            'description' => esc_html__( 'Show/hide navigation buttons under your carousel', 'themeszone-add-vc-shortcodes' ),
          ),
      		array(
      			'type' => 'textfield',
      			'heading' => esc_html__( 'Extra class name', 'themeszone-add-vc-shortcodes' ),
      			'param_name' => 'el_class',
      			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'themeszone-add-vc-shortcodes' ),
      		),
      		array(
      			'type' => 'css_editor',
      			'heading' => esc_html__( 'CSS box', 'themeszone-add-vc-shortcodes' ),
      			'param_name' => 'css',
      			'group' => esc_html__( 'Design Options', 'themeszone-add-vc-shortcodes' ),
      		),
        )
   ) );
}

class WPBakeryShortCode_handy_carousel extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'el_title' => '',
			'rotator' => 'false',
			'slides' => '',
			'per_slide' => '1',
			'slides_qty' => '4',
			'hover_animation' => 'shift',
			'transition_type' => 'fade',
			'autoplay' => 'false',
			'show_arrows' => '',
			'page_navi' => 'false',
			'css' => '',
			'el_class'=> '',
		), $atts ) );

	$output = '';
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'pt-carousel animation-'.esc_attr($hover_animation).' wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
    $container_id = uniqid('owl',false);

    /* Responsive qty */
    if ( $slides_qty=='2' && (brideliness_show_layout()!='layout-one-col') ) {
      $qty_sm = $qty_xs = 1;
      $qty_md = 2;
    } elseif ( $slides_qty=='2' && (brideliness_show_layout()=='layout-one-col') ) {
      $qty_sm = $qty_xs = 1;
      $qty_md = 2;
    } elseif ( $slides_qty!='2' && (brideliness_show_layout()!='layout-one-col') ) {
      $qty_md = 3;
      $qty_sm = 2;
      $qty_xs = 2;
    } elseif ( $slides_qty!='2' && (brideliness_show_layout()=='layout-one-col') ) {
      $qty_md = $slides_qty;
      $qty_sm = 2;
      $qty_xs = 1;
    }

    /* Get Carousel images */
    $carousel_imgs = '';
    $carousel_imgs_attributes =  vc_param_group_parse_atts( $slides );

	
	
    if( $carousel_imgs_attributes ){
      foreach ( $carousel_imgs_attributes as $data ) {
        if( ! empty($data['slide_img']) ) {
          $image_attributes = wp_get_attachment_image_src( $data['slide_img'], $data['slide_img_size'] );
          $img = wp_get_attachment_image( $data['slide_img'], $data['slide_img_size'] );
        }
        $header = ! empty( $data['heading'] ) ? '<h3>'.esc_attr($data['heading']).'</h3>' : '';
        $text = ! empty( $data['description'] ) ? '<span>'.esc_attr($data['description']).'</span>' : '';
        $btn_txt = ! empty( $data['btn_txt'] ) ? esc_attr($data['btn_txt']) : esc_html__('Learn More', 'themeszone-add-vc-shortcodes');

        if ($rotator == 'true') {
          $carousel_imgs .= '<div class="item-wrapper rotator"><figure><figcaption>';
          $carousel_imgs .= $header.$text.'</figcaption>';
          $carousel_imgs .= $img;
          $carousel_imgs .= '<a href="'.esc_url($data['url']).'" title="'.__('Learn More', 'themeszone-add-vc-shortcodes').'" rel="bookmark">'.$btn_txt.'</a>';
          $carousel_imgs .= '</figure></div><!--divider-->';
        } else {
          $carousel_imgs .= '<div class="item-wrapper">';
		  if($data['url'] && $data['url']!==''){
			  $carousel_imgs .= '<a href="'.esc_url($data['url']).'">';
		  }
		  $carousel_imgs .= '<figure>';
          $carousel_imgs .= $img;
          $carousel_imgs .= '<figcaption>';
          $carousel_imgs .= '<div class="caption-wrapper">'.$header.$text.'</div>';
          $carousel_imgs .= '<div class="vertical-helper"></div></figcaption>';
		  $carousel_imgs .= '</figure>';
		  if($data['url'] && $data['url']!==''){
			  $carousel_imgs .= '</a>';
		  }
		  $carousel_imgs .= '</div><!--divider-->';
		  
        }

      }
    }

    /* Wrap Carousel Items to slides */
    $items = explode( '<!--divider-->', $carousel_imgs );
    array_pop($items);
    $total = count($items);
    $resulting_items = '';

    if ( $total<(int)$per_slide || (int)$per_slide==1 || $per_slide=='n' ) {
      foreach ($items as $position => $item) {
        $resulting_items .= '<div class="carousel-item">'.$item.'</div>';
      }
      unset($item);
    } else {
      foreach ($items as $position => $item) {
        $current_position = $position + 1;
        if ( ($current_position == 1) || ($current_position % (int)$per_slide == 1) ) {
          $resulting_items .= '<div class="carousel-item">'.$item;
          if ($current_position == $total) {
            $resulting_items .= '</div>';
          }
        } elseif ( $current_position == $total ) {
          $resulting_items .= $item.'</div>';
        } elseif ( $current_position % (int)$per_slide == 0 ) {
          $resulting_items .= $item.'</div>';
        } else {
          $resulting_items .= $item;
        }
      }
      unset($item);
    }

    /* Output Carousel */
    $owlSingleItem = 'false';
    if ($per_slide!='n') {
      $owlSingleItem = 'true';
    }

    $output .= '<div class="'.esc_attr($css_class).'" id="'.$container_id. '">';
    if ( $el_title && $el_title !='' ) { $output .= "<div class='title-wrapper'><h3>{$el_title}</h3>"; }
    if ( $show_arrows == 'true' ) { $output .= "<span class='prev'></span><span class='next'></span>"; }
    if ( $el_title && $el_title !='' ) { $output .= "</div>"; }
    $output .= "<div class='carousel-container per-slide-{$per_slide}'>";
    $output .= $resulting_items;
    $output .= "</div></div>";

    $output.='
      <script type="text/javascript">
        (function($) {
          $(document).ready(function() {
            var owl = $("#'.$container_id.' .carousel-container");

            owl.owlCarousel({
              navigation : false,
              pagination : '.$page_navi.',
              autoPlay   : '.$autoplay.',
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : '.$owlSingleItem.',
              transitionStyle : "'.$transition_type.'",';
              if ($per_slide=='n') {
                $output.= 'items : '.$slides_qty.',
                itemsDesktop : [1199,'.$qty_md.'],
                itemsDesktopSmall : [979,'.$qty_sm.'],
                itemsTablet: [768,'.$qty_xs.'],
                itemsMobile : [479,1],';
              }
 $output.= '});
            // Custom Navigation Events
            $("#'.$container_id.'").find(".next").click(function(){
              owl.trigger("owl.next");
            })
            $("#'.$container_id.'").find(".prev").click(function(){
              owl.trigger("owl.prev");
            })
          });
        })(jQuery);
      </script>';

		return $output;
	}
}


endif;
