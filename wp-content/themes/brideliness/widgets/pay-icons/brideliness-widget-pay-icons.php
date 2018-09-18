<?php /* Brideliness Payment Icons Widget*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'widgets_init', create_function( '', 'register_widget( "brideliness_pay_icons_widget" );' ) );

class brideliness_pay_icons_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
	 		'brideliness_pay_icons_widget', // Base ID
			esc_html__('Brideliness Payment Icons', 'brideliness'), // Name
			array( 'description' => esc_html__( 'Plum Tree special widget. Add payment methods icons', 'brideliness' ), ) 
		);
	}

	public function form( $instance ) {

		$defaults = array( 
			'title' 		=> esc_html__('We Accept', 'brideliness'),
			'precontent'    => '',
			'postcontent'   => '',
			'americanexpress'	=> false,
			'discover'			=> false,
			'maestro'			=> false,
			'mastercard'		=> false,
			'paypal'			=> false,
			'visa'				=> false,
			'westernunion'		=> false,
			'giftcards'			=> false,
			'cash'				=> false,
			'bitcoin'			=> false,
			'amazon'			=> false,
			'skrill'			=> false,
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'brideliness' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id ('precontent')); ?>"><?php esc_html_e('Pre-Content', 'brideliness'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('precontent')); ?>" name="<?php echo esc_attr($this->get_field_name('precontent')); ?>" rows="2" cols="25"><?php echo esc_attr($instance['precontent']); ?></textarea>
		</p>

		<?php 
		$params = array( 
			'americanexpress' 		=> esc_html__( 'American Express', 'brideliness' ), 
			'discover'				=> esc_html__( 'Discover', 'brideliness' ),
			'maestro'				=> esc_html__( 'Maestro', 'brideliness' ),
			'mastercard'			=> esc_html__( 'Mastercard', 'brideliness' ),
			'paypal'				=> esc_html__( 'PayPal', 'brideliness' ),
			'visa'					=> esc_html__( 'Visa', 'brideliness' ),
			'westernunion'			=> esc_html__( 'Western Union', 'brideliness' ),
			'giftcards'				=> esc_html__( 'Gift Cards', 'brideliness' ),
			'cash'					=> esc_html__( 'Cash', 'brideliness' ),
			'bitcoin'				=> esc_html__( 'Bitcoin', 'brideliness' ),
			'amazon'				=> esc_html__( 'Amazon', 'brideliness' ),
			'skrill'				=> esc_html__( 'Skrill', 'brideliness' ),
		);

		foreach ($params as $key => $value) { ?>
			<p style="display:inline-block; width:40%; padding-right:5%; margin:0;">
				<input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id( $key )); ?>" name="<?php echo esc_attr($this->get_field_name( $key )); ?>" <?php checked( (bool) $instance[ $key ] ); ?> />
				<label for="<?php echo esc_attr($this->get_field_id( $key )); ?>"><?php echo esc_attr($value); ?></label>
			</p>
		<?php } ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id ('postcontent')); ?>"><?php esc_html_e('Post-Content', 'brideliness'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('postcontent')); ?>" name="<?php echo esc_attr($this->get_field_name('postcontent')); ?>" rows="2" cols="25"><?php echo esc_attr($instance['postcontent']); ?></textarea>
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['precontent'] = stripslashes( $new_instance['precontent'] );
		$instance['postcontent'] = stripslashes( $new_instance['postcontent'] );
		$instance['americanexpress'] = ( $new_instance['americanexpress'] );
		$instance['discover'] = ( $new_instance['discover'] );
		$instance['maestro'] = ( $new_instance['maestro'] );
		$instance['mastercard'] = ( $new_instance['mastercard'] );
		$instance['paypal'] = ( $new_instance['paypal'] );
		$instance['visa'] = ( $new_instance['visa'] );
		$instance['westernunion'] = ( $new_instance['westernunion'] );
		$instance['giftcards'] = ( $new_instance['giftcards'] );
		$instance['cash'] = ( $new_instance['cash'] );
		$instance['bitcoin'] = ( $new_instance['bitcoin'] );
		$instance['amazon'] = ( $new_instance['amazon'] );
		$instance['skrill'] = ( $new_instance['skrill'] );
		return $instance;
	}

	public function widget( $args, $instance ) {

		global $wpdb;

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$americanexpress = (isset($instance['americanexpress']) ? $instance['americanexpress'] : false );
		$discover = (isset($instance['discover']) ? $instance['discover'] : false );
		$maestro = (isset($instance['maestro']) ? $instance['maestro'] : false );
		$mastercard = (isset($instance['mastercard']) ? $instance['mastercard'] : false );
		$paypal = (isset($instance['paypal']) ? $instance['paypal'] : false );
		$visa = (isset($instance['visa']) ? $instance['visa'] : false );
		$westernunion = (isset($instance['westernunion']) ? $instance['westernunion'] : false );
		$giftcards = (isset($instance['giftcards']) ? $instance['giftcards'] : false );
		$cash = (isset($instance['cash']) ? $instance['cash'] : false );
		$bitcoin = (isset($instance['bitcoin']) ? $instance['bitcoin'] : false );
		$amazon = (isset($instance['amazon']) ? $instance['amazon'] : false );
		$skrill = (isset($instance['skrill']) ? $instance['skrill'] : false );
		$precontent = (isset($instance['precontent']) ? $instance['precontent'] : '' );
		$postcontent = (isset($instance['postcontent']) ? $instance['postcontent'] : '' );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		if ( ! empty( $precontent ) ) 
			echo '<div class="precontent">'.$precontent.'</div>';
		?>

			<ul class="brideliness-widget-pay-icons">
				<?php if( $americanexpress ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/americanexpress-icon.png'; ?>" alt="<?php esc_html_e('American Express', 'brideliness'); ?>" title="<?php esc_html_e('American Express', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $discover ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/discover-icon.png'; ?>" alt="<?php esc_html_e('Discover', 'brideliness'); ?>" title="<?php esc_html_e('Discover', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $maestro ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/maestro-icon.png';?>" alt="<?php esc_html_e('Maestro', 'brideliness'); ?>" title="<?php esc_html_e('Maestro', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $mastercard ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/mastercard-icon.png';?>" alt="<?php esc_html_e('MasterCard', 'brideliness'); ?>" title="<?php esc_html_e('MasterCard', 'brideliness'); ?>"/>
					</li>
				<?php endif; ?>
				<?php if( $paypal ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/paypal-icon.png'?>" alt="<?php esc_html_e('PayPal', 'brideliness'); ?>" title="<?php esc_html_e('PayPal', 'brideliness'); ?>"/>
					</li>
				<?php endif; ?>
				<?php if( $visa ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/visa-icon.png'?>" alt="<?php esc_html_e('Visa', 'brideliness'); ?>" title="<?php esc_html_e('Visa', 'brideliness'); ?>"/>
					</li>
				<?php endif; ?>
				<?php if( $westernunion ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/westernunion-icon.png'?>" alt="<?php esc_html_e('Western Union', 'brideliness'); ?>" title="<?php esc_html_e('Western Union', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $giftcards ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/giftcards-icon.png'?>" alt="<?php esc_html_e('Gift Cards', 'brideliness'); ?>" title="<?php esc_html_e('Gift Cards', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $cash ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/cash-icon.png'?>" alt="<?php esc_html_e('Cash', 'brideliness'); ?>" title="<?php esc_html_e('Cash', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $bitcoin ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/bitcoin-icon.png'?>" alt="<?php esc_html_e('Bitcoin', 'brideliness'); ?>" title="<?php esc_html_e('Bitcoin', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $amazon ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/amazon-icon.png'?>" alt="<?php esc_html_e('Amazon', 'brideliness'); ?>" title="<?php esc_html_e('Amazon', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
				<?php if( $skrill ) : ?>
					<li class="option-title">
						<img src="<?php echo get_template_directory_uri() .'/widgets/pay-icons/img/skrill-icon.png'?>" alt="<?php esc_html_e('Skrill', 'brideliness'); ?>" title="<?php esc_html_e('Skrill', 'brideliness'); ?>"  />
					</li>
				<?php endif; ?>
			</ul>

		<?php 
		if ( ! empty( $postcontent ) )
			echo '<div class="postcontent">'.$postcontent.'</div>';

		echo $after_widget;
	}
}


