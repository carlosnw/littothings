<?php /* Brideliness Shop Filters Widget*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( class_exists('Woocommerce') ) {

add_action( 'widgets_init', create_function( '', 'register_widget( "brideliness_shop_filters_widget" );' ) );

class brideliness_shop_filters_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
	 		'brideliness_shop_filters_widget', // Base ID
			esc_html__('Brideliness Shop Filters', 'themeszone-add-vc-shortcodes'), // Name
			array('description' => esc_html__( "Brideliness special widget. Woocommerce shop filters based on attributes of your products.", 'themeszone-add-vc-shortcodes' ), ) 
		);
	}

	public function form($instance) {
		$defaults = array(
			'title' => '',
			'show-count' => false,
			'dropdown-mode' => false,
			'precontent'=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title: ', 'themeszone-add-vc-shortcodes' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id ('precontent'); ?>"><?php esc_html_e('Pre-Content', 'themeszone-add-vc-shortcodes'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('precontent')); ?>" name="<?php echo esc_attr($this->get_field_name('precontent')); ?>" rows="2" cols="25"><?php echo sanitize_textarea_field($instance['precontent']); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'attribute' )); ?>"><?php esc_html_e( 'Attribute:', 'themeszone-add-vc-shortcodes' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'attribute' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'attribute' ) ); ?>">
				<?php
				$attribute_taxonomies = wc_get_attribute_taxonomies();
				if ( $attribute_taxonomies )
					foreach ( $attribute_taxonomies as $tax )
						if ( taxonomy_exists( wc_attribute_taxonomy_name( $tax->attribute_name ) ) )
							echo '<option value="' . esc_attr($tax->attribute_name) . '" ' . selected( ( isset( $instance['attribute'] ) && $instance['attribute'] == $tax->attribute_name ), true, false ) . '>' . esc_attr($tax->attribute_label) . '</option>';
				?></select>
		</p>
		<p>
            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('show-count')); ?>" name="<?php echo esc_html($this->get_field_name('show-count')); ?>"<?php checked( (bool) $instance['show-count'] ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('show-count')); ?>"><?php esc_html_e( 'Show products count?', 'themeszone-add-vc-shortcodes' ); ?></label>
        </p>
		<p>
            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('dropdown-mode')); ?>" name="<?php echo esc_attr($this->get_field_name('dropdown-mode')); ?>"<?php checked( (bool) $instance['dropdown-mode'] ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('dropdown-mode')); ?>"><?php esc_html_e( 'Show as dropdown?', 'themeszone-add-vc-shortcodes' ); ?></label>
        </p>
		<p>
            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('gride-mode')); ?>" name="<?php echo esc_attr($this->get_field_name('gride-mode')); ?>"<?php checked( (bool) $instance['gride-mode'] ); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('gride-mode')); ?>"><?php esc_html_e( 'Show as Gride?', 'themeszone-add-vc-shortcodes' ); ?></label>
        </p>
	<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['attribute'] = stripslashes( $new_instance['attribute'] );
		$instance['show-count'] = $new_instance['show-count'];
		$instance['dropdown-mode'] = $new_instance['dropdown-mode'];
		$instance['gride-mode'] = $new_instance['gride-mode'];
		$instance['precontent'] = $new_instance['precontent'];
		return $instance;
	}

	public function widget($args, $instance) {

		global $woocommerce, $wp_query;
		
		extract($args);

		if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) )
			return;

		$title 			= apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		$taxonomy 		= wc_attribute_taxonomy_name($instance['attribute']);
		$taxonomy_label	= $instance['attribute'];
		$show_count     = ( isset($instance['show-count']) ? $instance['show-count'] : false );
		$dropdown_mode  = ( isset($instance['dropdown-mode']) ? $instance['dropdown-mode'] : false );
		$gride_mode  = ( isset($instance['gride-mode']) ? 'gride-mode' : '' );
		$precontent_filter  = ( isset($instance['precontent']) ? $instance['precontent'] : '' );

		if ( ! taxonomy_exists( $taxonomy ) )
			return;

		$terms = get_terms( $taxonomy, array( 'hide_empty' => '1' ) );

		// Get id's of displayed products
		$product_list = $wp_query->posts; 
		$product_ids = array();
		foreach ($product_list as $product) {
		   $product_ids[] += $product->ID;
		}

		// Output data
		if ( count( $terms ) == 0 ) {
			echo $before_widget;
			echo '<p class="no-attributes">'.esc_html__('No attributes specified', 'themeszone-add-vc-shortcodes').'</p>';
			echo $after_widget;
		}
		elseif ( count( $terms ) > 0 ) {

			$before_filters = $before_widget;
			if(! empty($precontent_filter)){
				$before_filters .= '<span class="precontent-filters">';
				$before_filters .=$precontent_filter;
				$before_filters .= '</span>';
			}
			if ($dropdown_mode) {
				$before_filters .= '<div class="dropdown-filters">';
			}
			if ( empty( $title ) && !$dropdown_mode ) {
				$before_filters .=  $before_title . esc_html__('Shop by ', 'themeszone-add-vc-shortcodes') .'<span class="filter-name">'. $taxonomy_label .'</span>'. $after_title;
			}
			elseif ( ! empty( $title ) ) {
				$before_filters .=  $before_title . $title . $after_title;
			}
			$str = mb_strtolower($taxonomy_label);

			$before_filters .=  '<ul data-isotope="filters" class="filters-group '.esc_attr($gride_mode).'" data-filter-group="'.esc_attr($str).'">';
			$before_filters .=  '<li data-filter="" class="filter selected is-checked"><span class="bullet"></span>All</li>';						

			$filters = '';
			foreach ( $terms as $term ) {

				// Get count based on current view - uses transients
				$transient_name = 'wc_ln_count_' . md5( sanitize_key( $taxonomy ) . sanitize_key( $term->term_taxonomy_id ) );
				if ( false === ( $_products_in_term = get_transient( $transient_name ) ) ) {
					$_products_in_term = get_objects_in_term( $term->term_id, $taxonomy );
					set_transient( $transient_name, $_products_in_term, YEAR_IN_SECONDS );
				}

				$count = sizeof( array_intersect( $_products_in_term, $product_ids ) );

				if ( $count > 0 ) {
					if (!$show_count) { $additioal_class = ' grid'; } else { $additioal_class = ''; }
					$filters .= '<li class="filter'.esc_attr($additioal_class).'" data-filter=".'.esc_attr($term->slug).'">';
					$filters .= '<span class="bullet"></span>';
					$filters .= '<span>'.esc_attr($term->name).'</span>';
					if ($show_count) {
						$filters .= '<span class="counter">('.esc_attr($count).')</span>';
					}
					$filters .= '</li>';	
				}

			}

			$after_filters = '</ul>';
			if ($dropdown_mode) {
				$after_filters .= '</div>';
			}
			$after_filters .= $after_widget;

			if ($filters !== '') {
				echo $before_filters.$filters.$after_filters;
			}

		}

	}
}
}