<?php
/**
 * Users settings template
 */

if (!defined('ABSPATH')) {
    exit; // return if called directly
}

$user_token = get_option('enjoyinstagram_access_token', '');

if ($user_token) : ?>
    <div>
        <h2><?php _e('Your Instagram Profile', 'enjoyinstagram'); ?></h2>
        <hr/>

        <div id="enjoy_user_profile">
            <img class="enjoy_user_profile" src="<?php echo get_option('enjoyinstagram_user_profile_picture'); ?>">
            <form method="post">
                <input type="hidden" name="action" value="enjoyinstagram_remove_user">
                <input type="submit" id="button_logout"
                       value="<?php _e( 'Unlink Profile', 'enjoyinstagram' ); ?>" class="button-primary ei_top"/>
            </form>
        </div>

        <div id="enjoy_user_block">
            <h3><?php echo get_option('enjoyinstagram_user_username'); ?></h3>
            <p><i><?php echo get_option('enjoyinstagram_user_bio'); ?></i></p>
            <hr/>
            <?php printf(__('Customize the plugin with our <a href="%s">settings</a> tab.', 'enjoyinstagram'), EnjoyInstagram_Admin()->get_tab_url('enjoyinstagram_advanced_settings')); ?>
            <hr/>
        </div>
    </div>
    <div class="wrap" style="
    float: left;
    width: 95%;
    background: rgba(79, 173, 26, 0.45);
    padding: 20px;
    margin-top: 20px;
    border: 2px solid green;">
        <h3><?php _e('Shortocodes to use', 'enjoyinstagram'); ?>:</h3>
        <b>[enjoyinstagram_mb]</b> -> <?php _e('Carousel View', 'enjoyinstagram'); ?><br/>
        <b>[enjoyinstagram_mb_grid]</b> -> <?php _e('Grid View', 'enjoyinstagram'); ?>
    </div>

<?php else : ?>

    <p style="font-size:14px;">
        <?php printf(__('Thank you for you choice! <strong>Enjoy Plugin for Instagram - Responsive gallery</strong> is a plugin lovingly developed for you by <a href="%s" target="_blank"> Mediabeta</a>.', 'enjoyinstagram'), 'http://www.mediabeta.com'); ?>
    </p>
    <p style="font-size:14px;">
        <?php printf(__('By using this plugin, you are agreeing to the <a href="%s" target="_blank">Instagram API Terms of Use</a>.', 'enjoyinstagram'), 'http://instagram.com/about/legal/terms/api/'); ?>
    </p>

    <a href="<?php echo EnjoyInstagram_Admin()->get_instagram_login_url() ?>" class="button-primary">
        <?php _e('Connect your Account', 'enjoyinstagram'); ?>
    </a>

<?php endif; ?>
