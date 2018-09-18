<?php /* Brideliness Shopping Cart Widget */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Brideliness_Widget_Cart extends WP_Widget {

		/**
	 * constructor
	 *
	 * @access public
	 * @return void
	 */
	function __construct() {
		parent::__construct(
			'brideliness_woocommerce_widget_cart', // Base ID
			 esc_html__( 'WooCommerce Cart (Brideliness)', 'brideliness' ), // Name
			array( 'description' => esc_html__( "Display the user's Cart in the sidebar.", 'brideliness' ),
					'classname' => 'woocommerce widget_shopping_cart',
			) // Args
		);
	}


	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		global $woocommerce;

		extract( $args );

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		$cart_style = empty( $instance['cart_style'] ) ? 0 : 1;
		$cart_style_css='';
		$cart_count = '';
		$cart_icon='';
		if($cart_style){$cart_style_css ='style1';}else{ $cart_style_css='standart-style';};
		
        if (brideliness_get_option('catalog_mode') == 'on') return;

		if ( is_cart() || is_checkout()) return;
		
			$title = apply_filters('widget_title', empty( $instance['title'] ) ? esc_html__( 'Cart', 'brideliness' ) : $instance['title'], $instance, $this->id_base );
		
		echo $before_widget;
		
		if( brideliness_get_option('cart_count') == 'on'){
			$cart_count = '<a class="cart-contents"><span class="count">'. WC()->cart->cart_contents_count .' ITEMS - '. WC()->cart->get_cart_subtotal().'</span></a>';
        }
		else{
			$cart_count = '<a class="cart-contents"><span class="count"></span></a>';
		}
		
		$cart_icon.='<div class="cart-icon"><i class="icon-shopping_bag"></i></div>';
		
        echo '<div class="inner-cart-content">';
		
		echo '<div class="heading '.$cart_style_css.'"><div class="heading-content"><div class="cart-widget-title">' .$title. '</div>'.$cart_count.'</div>'.$cart_icon.'</div>';

		if ( $hide_if_empty )
			echo '<div class="hide_cart_widget_if_empty">';

		
			// Insert cart widget placeholder - code in woocommerce.js will update this on page load
			echo '<div class="widget_shopping_cart_content"></div>';
	

		if ( $hide_if_empty )
			echo '</div>';

		echo '</div>';

		?>

		<?php echo $after_widget;

	}


	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;
		$instance['cart_style'] = empty( $new_instance['cart_style'] ) ? 0 : 1;
		return $instance;
	}


	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		$cart_style = empty( $instance['cart_style'] ) ? 0 : 1;
		?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'brideliness' ) ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_if_empty') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_if_empty') ); ?>"<?php checked( $hide_if_empty ); ?> />
		<label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php esc_html_e( 'Hide if cart is empty', 'brideliness' ); ?></label></p>
		
		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('cart_style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('cart_style') ); ?>"<?php checked( $cart_style ); ?> />
		<label for="<?php echo $this->get_field_id('cart_style'); ?>"><?php esc_html_e( 'Cart style 1', 'brideliness' ); ?></label></p>
		
		<?php
	}

}

function register_brideliness_widget_cart() {  
    register_widget( 'Brideliness_Widget_Cart' );  
} 

if (class_exists('Woocommerce'))
add_action( 'widgets_init', 'register_brideliness_widget_cart' );

/**
 * Adding product counter.
 */

function brideliness_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
    <?php if ( brideliness_get_option('cart_count') == 'on' ) : ?>
	<span class="count-icon"><?php echo(WC()->cart->cart_contents_count)?></span>
    <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'brideliness'); ?>"><?php echo sprintf(esc_html(_n('%d ITEM', '%d ITEMS', WC()->cart->cart_contents_count, 'brideliness')), WC()->cart->cart_contents_count);?> - <?php echo WC()->cart->get_cart_total(); ?></a>
	<?php else : ?>
    <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'brideliness'); ?>"><?php echo WC()->cart->get_cart_total(); ?></a>
	<?php endif; ?>
    <?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}

if (class_exists('Woocommerce'))
add_filter('woocommerce_add_to_cart_fragments', 'brideliness_header_add_to_cart_fragment');

