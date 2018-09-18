<?php /* Brideliness Search Widget*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'widgets_init', create_function( '', 'register_widget( "brideliness_search_widget");' ) );

class brideliness_search_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
	 		'brideliness_search_widget', // Base ID
			esc_html__('Brideliness Search', 'brideliness'), // Name
			array('description' => esc_html__( "Brideliness special widget. A search form for your site.", "brideliness" ), ) 
		);
	}

	public function form($instance) {
		$defaults = array(
			'title' => '',
			'search-input' => esc_html__('Text here...', 'brideliness'),
			'search-button' => '',
			'search-product' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title: ', 'brideliness' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Input Text: ', 'brideliness' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('search-input') ); ?>" name="<?php echo esc_attr( $this->get_field_name('search-input') ); ?>" type="text" value="<?php echo esc_attr( $instance['search-input'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Button Title Text: ', 'brideliness' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('search-button') ); ?>" name="<?php echo esc_attr( $this->get_field_name('search-button') ); ?>" type="text" value="<?php echo esc_attr( $instance['search-button'] ); ?>" />
		</p>
		<p>
		    <input type="checkbox" name="<?php echo wp_kses_post($this->get_field_name('search-product')); ?>" <?php if (esc_attr( $instance['search-product'] )) {
		                    echo 'checked="checked"';
		                } ?> class=""  size="4"  id="<?php echo esc_attr($this->get_field_id('search-product')); ?>" />
		    <label for ="<?php echo wp_kses_post($this->get_field_id('search-product')); ?>"><?php esc_html_e('Product search only','brideliness'); ?></label>
		</p>
	<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['search-input'] = strip_tags( $new_instance['search-input'] );
		$instance['search-button'] = strip_tags( $new_instance['search-button'] );
		$instance['search-product'] = strip_tags( $new_instance['search-product'] );
		
		return $instance;
	}

	public function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$text = ( isset($instance['search-input']) ? $instance['search-input'] : '' );
		$button = ( isset($instance['search-button']) ? $instance['search-button'] : '' );
		$search_product = $instance['search-product'];

		echo $before_widget;
		if ($title) { echo $before_title . $title . $after_title; }
	?>
	
		<div class="search-wrapper">
			<div class="show-search" title="Click to show search-field"><i class="icon-search"></i></div>
			<div id="brideliness-searchform-container" class="close">
				<form class="brideliness-searchform" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
					<input id="s" name="s" type="text" class="searchtext" value="" title="<?php echo esc_attr( $text ); ?>" placeholder="<?php echo esc_attr( $text ); ?>" tabindex="1" />
					
					<?php if($button!=='') : ?>
					<input id="searchsubmit" type="submit" class="search-button" value="<?php echo esc_attr( $button ); ?>" title="Click to search" tabindex="2" />
					<?php endif; ?>
					
					<?php if($search_product) : ?>
						<input type="hidden" name="post_type" value="product" />
					<?php endif; ?>
				</form>
			</div>
		</div>

	<?php
		echo $after_widget;
	}
}
