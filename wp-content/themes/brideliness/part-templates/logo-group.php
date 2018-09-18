<?php  	
	// Logo Position
	$logo_position_fixed = esc_attr(brideliness_get_option('site_logo_position_fixed'));
	$logo_position_standart = esc_attr(brideliness_get_option('site_logo_position_standart'));
	
	// Check if logo img exists 
	$img_url = brideliness_get_option('site_logo');
	
	if (brideliness_get_option('site_header')=='standart' || isset( $_GET['home_type'] ) || !brideliness_get_option('site_header')) {	
		switch ($logo_position_standart) {
			case 'left':
				$logo_class = 'col-md-6 col-sm-12 col-md-pull-3';
				$sidebar_class_left = 'col-md-3 col-sm-6 col-md-push-6';	
				$sidebar_class_right = 'col-md-3 col-sm-6 ';	
				break;
			case 'center':
				$logo_class = 'col-md-6 col-sm-12';
				$sidebar_class_left = 'col-md-3 col-sm-12';	
				$sidebar_class_right = 'col-md-3 col-sm-12';		
				break;
			case 'right':
				$logo_class = 'col-md-6 col-sm-12 col-md-push-3';
				$sidebar_class_left = 'col-md-3 col-sm-6';	
				$sidebar_class_right = 'col-md-3 col-sm-6 col-md-pull-6';	
				break;
			default:
				$logo_class = 'col-md-6 col-sm-12';
				$sidebar_class_left = 'col-md-3 col-sm-6';	
				$sidebar_class_right = 'col-md-3 col-sm-6';		
		}
	}
	
	if (brideliness_get_option('site_header')=='fixed' || (isset( $_GET['home_type'] )&& $_GET['home_type']=='home1')){	
		switch ($logo_position_fixed) {
			case 'left':
				$logo_class_fixed = 'col-md-3 col-sm-12 left';
				$menu_class = 'menu main-menu col-md-7 col-sm-6 col-xs-9';	
				$sidebar_class = 'header-group-sidebar col-md-2 col-sm-6 col-xs-3';	
				break;
			case 'center':
				$logo_class_fixed = 'col-md-3 col-sm-12 col-md-push-7 center';
				$menu_class = 'menu col-md-7 col-sm-6 col-xs-6 col-md-pull-3';	
				$sidebar_class = 'header-group-sidebar col-md-2 col-sm-6 col-xs-6';		
				break;
			case 'right':
				$logo_class_fixed = 'col-md-3 col-sm-12 col-md-push-9 right';
				$menu_class = 'menu col-md-7 col-sm-6 col-xs-6 col-md-pull-3';	
				$sidebar_class = 'header-group-sidebar col-md-2 col-sm-6 col-xs-6 col-md-pull-3';	
				break;
			default:
				$logo_class_fixed = 'col-md-3 col-sm-12 left';
				$menu_class = 'menu col-md-7 col-sm-12';	
				$sidebar_class = 'header-group-sidebar col-md-2 col-sm-12 ';		
		}
	}	
	
	$menu_background='';
	
	if( isset( $_GET['home_type'] ) ){ 
		$home_type = esc_attr($_GET['home_type']);
		switch ($home_type) {
			case 'home1':
				$menu_background="rgba(255,255,255,0)";
			break;
			case 'home2':
				$menu_background="#111518";
			break;
			case 'home3':
				$menu_background="#f6f2ef";
			break;
			case 'home4':
				$menu_background="#f4f0e6";
			break;
		}
	}
	else{
		$home_type='';
		$menu_background=brideliness_get_option('menu_background');
	}

?>

<?php if ((brideliness_get_option('site_header')=='standart' || (brideliness_get_option('site_header')=='fixed' && isset( $_GET['home_type'] )) || !brideliness_get_option('site_header')) && $home_type!=='home1' ) :?>

	<div  class="aside-logo-left <?php echo esc_attr($sidebar_class_left);?>">
        <?php if ( is_active_sidebar( 'aside-logo-left-sidebar' ) ) : ?>
            <div class="hgroup-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <?php dynamic_sidebar( 'aside-logo-left-sidebar' ); ?>	
            </div>
        <?php endif; ?>
	</div>	
	
	<?php if (brideliness_get_option('site_logo')): ?>
		<div class="site-logo <?php echo esc_attr($logo_class);?>" itemscope itemtype="http://schema.org/Organization">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo get_bloginfo( 'name', 'display' ); ?>">
				<img src="<?php echo esc_url(brideliness_get_option('site_logo')) ?>" alt="<?php esc_html(bloginfo( 'description' )); ?>" itemprop="logo"/>
			</a>
		</div>
	<?php else: ?>
		<div class="header-group site-logo <?php echo esc_attr($logo_class); ?>">
			<h1 id="the-title" class="site-title" itemprop="headline">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemprop="url">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<h2 class="site-description" itemprop="description"><?php esc_html(bloginfo( 'description' )); ?></h2>
		</div>
	<?php endif; ?>
	
	<div  class="aside-logo-right <?php echo esc_attr($sidebar_class_right);?>">
        <?php if ( is_active_sidebar( 'aside-logo-right-sidebar' ) ) : ?>
            <div class="hgroup-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                 <?php dynamic_sidebar( 'aside-logo-right-sidebar' ); ?>	
            </div>
        <?php endif; ?>
	</div>
	
	<?php if (has_nav_menu( 'primary-nav' )) : ?>
		<div class="col-md-12 col-sm-12 main-menu">
			<nav class="primary-nav <?php echo esc_attr(brideliness_sticky_menu());?> <?php if(brideliness_get_option('navi_border_top') && !isset( $_GET['home_type'])){	echo 'bordered';}?> <?php if(brideliness_get_option('navi_item_border_right') || (isset( $_GET['home_type'] )&& $_GET['home_type']!=='home2')){	echo 'bordered-right';}?> " itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" <?php if($menu_background!=='') echo 'style="background:'.esc_attr($menu_background).'; "' ?>>
				<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'brideliness' ); ?></a>
				<?php wp_nav_menu( array('theme_location'  => 'primary-nav') ); ?>	
				<div class="menu-sidebar">
				    <?php if ( is_active_sidebar( 'menu-sidebar' ) ) : ?>
						<div class="hgroup-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
							<?php dynamic_sidebar( 'menu-sidebar' ); ?>	
						</div>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	<?php endif;?>
			
<?php endif;?>	


<?php if (brideliness_get_option('site_header')=='fixed' && !isset( $_GET['home_type'] ) || (isset( $_GET['home_type'] )&& $_GET['home_type']=='home1')) :?>

	<?php if (brideliness_get_option('site_logo')): ?>
		<div class="site-logo <?php echo esc_attr($logo_class_fixed); ?>" itemscope itemtype="http://schema.org/Organization">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo esc_attr(get_bloginfo( 'name', 'display' )); ?>" itemprop="url">
				<img src="<?php echo esc_url(brideliness_get_option('site_logo')) ?>" alt="<?php esc_html(bloginfo( 'description' )); ?>" itemprop="logo" />
			</a>
		</div>
	<?php else: ?>
		<div class="header-group site-logo <?php echo esc_attr($logo_class_fixed); ?>">
			<h1 id="the-title" class="site-title" itemprop="headline">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" itemprop="url">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<h2 class="site-description" itemprop="description"><?php esc_html(bloginfo( 'description' )); ?></h2>
		</div>
	<?php endif; ?>

	<?php if (has_nav_menu( 'primary-nav' )) : ?>
		
		<div class="<?php echo esc_attr($menu_class);?>">
			<nav class="primary-nav <?php echo esc_attr(brideliness_sticky_menu());?>"  <?php if($menu_background!=='') echo 'style="background:'.esc_attr($menu_background).'; "' ?> itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'brideliness' ); ?></a>
				<?php wp_nav_menu( array('theme_location'  => 'primary-nav') ); ?>	
			</nav>
		</div>
		
	<?php endif;?>
	
	<div class="<?php echo esc_attr($sidebar_class); ?>">
		<div class="logo-group-sidebar">
			<?php if ( is_active_sidebar( 'fixed-header' ) ) : ?>
				<div class="hgroup-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
					<?php dynamic_sidebar( 'fixed-header' ); ?>	
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif;?>	

	