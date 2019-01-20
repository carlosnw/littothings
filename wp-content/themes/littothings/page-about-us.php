<?php /* The template for displaying all pages */

get_header(); ?>

<?php
$main_img_url = get_field('main_image');
$main_img = $main_img_url['sizes']['full-landscape'];
$who_we_are_left_text = get_field('who_we_are_left_section');
$who_we_are_right_text = get_field('who_we_are_right_section');
$promo_boxes = get_field('promo_boxes');
?>

<main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>"
      itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

    <div class="l-contrainer">

        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-12">
                <img class="u-responsive-img" src="<?= $main_img; ?>">
            </div>
        </div>

        <div class="l-row">
            <div class="l-col-md-12">
                <div class="br-wrap-title">
                    <div class="br-wrap-title">
                        <h2 class="br-title u-fancy-title u-text-center">
                            <span>Who we are</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="l-row u-box-margin--bottom u-text-center">
            <div class="l-col-md-6 u-box-padding">
                <?= $who_we_are_left_text; ?>
            </div>
            <div class="l-col-md-6 u-box-padding">
                <?= $who_we_are_right_text; ?>
            </div>
        </div>

        <div class="l-breakout-wrap u-section-mid u-box-padding--tall-top">
            <div class="l-row l-row-flex">

                <?php if (have_rows('promo_boxes')) : ?>
                    <?php while (have_rows('promo_boxes')) : the_row(); ?>

                        <?php
                        $promo_box_icon = get_sub_field('promo_box_icon');
                        $promo_box_title = get_sub_field('promo_box_title');
                        $promo_box_text = get_sub_field('promo_box_text');
                        ?>
                        <div class="l-col-sm-6 l-col-md-4 u-box-margin--bottom">
                            <div class="brideliness-promo-text">
                                <div class="promo-wrapper">
                                    <div class="brideliness-promo-icon"><?= $promo_box_icon; ?></div>
                                    <div class="promo-text">
                                        <h4 class="u-promo-text">
                                            <?= $promo_box_title; ?></h4>
                                        <span class="u-text-muted"><?= $promo_box_text; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
