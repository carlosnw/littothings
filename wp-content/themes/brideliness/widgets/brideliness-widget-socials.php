<?php  /* Brideliness Social Networks Widget*/
 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'widgets_init', create_function( '', 'register_widget( "brideliness_socials_widget" );' ) );

class brideliness_socials_widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'brideliness-socials-widget', // Base ID
			esc_html__('Brideliness Social Icons', 'brideliness'), // Widget Name
			array(
				'classname' => 'brideliness-socials-widget',
				'description' => esc_html__('Brideliness special widget. Displays a list of social media website icons and a link to your profile.', 'brideliness'),
			),
			array(
				'width' => 600,
			)
		);
			// Register Stylesheets
	add_action('admin_print_styles', array($this, 'register_admin_styles'));
	}
		
	function register_admin_styles() {
		wp_enqueue_style( 'brideliness-social-icons-widget-admin', get_template_directory_uri() .'/css/widget_socials_admin.css', true); }


	public function form( $instance ) {
		
		$defaults = array(
			'socials_title'=> '',
			'socials_show_title'=>'',
			'socials_layout_type'=>'',
			'socials_size'=>'',
			'social_networks' =>array(
					'facebook' => array(
						'icon' => 'facebook',
						'url' => ''
					),
					'linkedin' => array(
						'icon' => 'linkedin',
						'url' => ''
					),
					'twitter' => array(
						'icon' => 'twitter',
						'url' => ''
					),
					'google-plus' => array(
						'icon' => 'google-plus',
						'url' => ''
					),
					'youtube' => array(
						'icon' => 'youtube',
						'url' => ''
					),
					'instagram' => array(
						'icon' => 'instagram',
						'url' => ''
					),
					'github' => array(
						'icon' => 'github',
						'url' => ''
					),
					'rss' => array(
						'icon' => 'rss',
						'url' => ''
					),
					'pinterest' => array(
						'icon' => 'pinterest',
						'url' => ''
					),
					'flickr' => array(
						'icon' => 'flickr',
						'url' => ''
					),
					'bitbucket' => array(
						'icon' => 'bitbucket',
						'url' => ''
					),
					'tumblr' => array(
						'icon' => 'tumblr',
						'url' => ''
					),
					'dribbble' => array(
						'icon' => 'dribbble',
						'url' => ''
					),
					'vimeo' => array(
						'icon' => 'vimeo',
						'url' => ''
					),
					'wordpress' => array(
						'icon' => 'wordpress',
						'url' => ''
					),
					'delicious' => array(
						'icon' => 'delicious',
						'url' => ''
					),
					'digg' => array(
						'icon' => 'digg',
						'url' => ''
					),
					'behance' => array(
						'icon' => 'behance',
						'url' => ''
					),
				),
			);
		
		$instance = wp_parse_args((array) $instance, $defaults);
		$social_networks = $instance['social_networks'];
		
	?>
		<div class="social_icons_widget">

			<p><label for="<?php echo esc_attr($this->get_field_id('socials_title')); ?>"><?php esc_html_e('Title:', 'brideliness'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('socials_title')); ?>" name="<?php echo esc_attr($this->get_field_name('socials_title')); ?>" value="<?php echo sanitize_text_field( $instance['socials_title'] ); ?>" /></p>

			<?php
			$icon_sizes = array(
				'Small (16px)' => 'small',
				'Medium (24px)' => 'medium',
				'Large (32px)' => 'large',
			);
			?>

			<p class="icon_options"><label for="<?php echo esc_attr($this->get_field_id('socials_size')); ?>"><?php esc_html_e('Icon Size:', 'brideliness'); ?></label>
				<select id="<?php echo esc_attr($this->get_field_id('socials_size')); ?>" name="<?php echo esc_attr($this->get_field_name('socials_size')); ?>">
				<?php
				foreach($icon_sizes as $option => $value) :

					if(esc_attr($instance['socials_size'] == $value)) { $selected = ' selected="selected"'; }
					else { $selected = ''; }
				?>
				
					<option value="<?php echo esc_attr($value); ?>"<?php echo esc_attr($selected); ?>><?php echo esc_attr($option); ?></option>
				
				<?php endforeach; ?>
				</select>
			</p>

			<?php if(esc_attr($instance['socials_show_title']) == 'show') { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
			<p class="label_options"><input type="checkbox" id="<?php echo esc_attr($this->get_field_id('socials_show_title')); ?>" name="<?php echo esc_attr($this->get_field_name('socials_show_title')); ?>" value="show"<?php echo esc_attr($checked); ?> /> <label for="<?php echo esc_attr($this->get_field_id('socials_show_title')); ?>"><?php esc_html_e('Hide Title', 'brideliness'); ?></label></p>

			<?php if(esc_attr($instance['socials_layout_type'] == 'inline')) { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
			<p class="label_options"><input type="checkbox" id="<?php echo esc_attr($this->get_field_id('socials_layout_type')); ?>" name="<?php echo esc_attr($this->get_field_name('socials_layout_type')); ?>" value="inline"<?php echo esc_attr($checked); ?> /> <label for="<?php echo esc_attr($this->get_field_id('socials_layout_type')); ?>"><?php esc_html_e('Inline Mode', 'brideliness'); ?></label></p>

			<?php if($social_networks){ ?>
			<ul class="social_accounts">

				<?php foreach ($social_networks as $key => $value) : ?>
					<li>
						<h4><?php echo esc_attr($key); ?></h4>
					
						<label for="<?php echo esc_attr($this->get_field_name('social_networks')); ?>[<?php echo esc_attr($key); ?>][url]"><?php esc_html_e('URL:', 'brideliness'); ?></label>
						<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_name('social_networks')); ?>[<?php echo esc_attr($key); ?>][url]" name="<?php echo esc_attr($this->get_field_name('social_networks')); ?>[<?php echo esc_attr($key); ?>][url]" value="<?php echo esc_url( $value['url'] ); ?>" />
						<input class="widefat" type="hidden" id="<?php echo esc_attr($this->get_field_name('social_networks')); ?>[<?php echo esc_attr($key); ?>][icon]" name="<?php echo esc_attr($this->get_field_name('social_networks')); ?>[<?php echo esc_attr($key); ?>][icon]" value="<?php echo esc_attr( $value['icon'] ); ?>" />
					</li>
				<?php endforeach; ?>
			</ul>
			<?php } ?>
		</div>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['socials_title'] = $new_instance['socials_title'];
		$instance['socials_size'] = $new_instance['socials_size'];
		$instance['socials_show_title'] = $new_instance['socials_show_title'];
		$instance['socials_layout_type'] = $new_instance['socials_layout_type'];
		$instance['social_networks'] = $new_instance['social_networks'];
		
		return $instance;
	}

	public function widget( $args, $instance ) {
	
		extract($args);

		$title = empty($instance['socials_title']) ? '' : apply_filters('widget_title', $instance['socials_title']);
		$socials_size = empty($instance['socials_size']) ? 'small' : $instance['socials_size'];
		$show_title = $instance['socials_show_title'];
		$layout_type = $instance['socials_layout_type'];
		$social_networks = $instance['social_networks'];
		
		echo $before_widget;

		if($show_title == '') {
			echo $before_title;
			echo esc_attr($title);
			echo $after_title;
		}

		if($layout_type == 'inline') { $ul_class = 'inline-mode '; }
		else { $ul_class = ''; }
		
		$ul_class .= 'icons-'.esc_attr($socials_size);

		echo '<ul class="'.esc_attr($ul_class).'">'; 

		foreach($social_networks as $networks_socials=>$key) : 
			if($key['url'] != '') :
				$url = $key['url'];
				echo '<li class="social-network">';
					echo '<a href="'.esc_url($url).'" target="_blank" title="'.esc_html__('Connect us on ', 'brideliness').esc_attr($networks_socials).'"><i class="fa fa-'.esc_attr($key['icon']).'"></i></a>';
				echo '</li>';
									
			endif;
		endforeach; 

		echo '</ul>'; 

		echo $after_widget;
	}
}
