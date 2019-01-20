<?php /* Template Name: Front Page */

get_header(); ?>

<?php
$subscription_img_url = get_field('subscription_image');
$subscription_img = $subscription_img_url['sizes']['tile-landscape'];
$subscription_text = get_field('subscription_text');
$subscription_btn_text = get_field('subscription_button_text');
?>

    <main id="content" class="site-content <?php brideliness_main_content_class(); ?>" itemscope="itemscope"
          itemprop="mainContentOfPage">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="entry-content--top">

                    <div class="l-row u-box-margin--bottom">

                        <?php if (have_rows('service_categories')) : ?>
                            <?php while (have_rows('service_categories')) : the_row(); ?>

                                <?php
                                $service_img_url = get_sub_field('service_image');
                                $service_img = $service_img_url['sizes']['tile-portrait'];
                                $service_title = get_sub_field('service_title');
                                $service_tagline = get_sub_field('service_tagline');
                                $service_link = get_sub_field('service_link');
                                ?>

                                <div class="l-col-md-4">
                                    <figure class="brideliness-banner banner-with-effects effect-bubba2 tiles-bg tiles-bg--portrait"
                                            style="background-image: url('<?= $service_img; ?>')">
                                        <div class="tile-bg-overlay"></div>
                                        <a href="<?= $service_link; ?>">
                                            <figcaption>
                                                <h3 class="main-caption main-caption--vertical u-text-white">
                                                    <?= $service_title; ?>
                                                </h3>
                                                <h4 class="small-caption u-text-white"><?= $service_tagline; ?></h4>
                                            </figcaption>
                                        </a>
                                        <!--                                    <a class="button-banner button1" style="left:10%; top:62%;" href="http://littothings.local/shop/" title="SHOP NOW" target="">SHOP NOW</a>-->
                                    </figure>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="l-row u-box-margin--bottom">
                        <div class="l-col-md-12">
                            <figure class="brideliness-banner banner-with-effects effect-bubba2 tiles-bg tiles-bg--landscape"
                                    style="background-image: url('<?= $subscription_img; ?>')">
                                <div class="tile-bg-overlay"></div>
                                <a href="#">
                                    <figcaption>
                                        <h3 class="main-caption main-caption--banner u-text-white">
                                            <?= $subscription_text; ?>
                                        </h3>
                                    </figcaption>
                                </a>
                                <a class="button-banner small-caption-cta button1" href="http://littothings.local/shop/"
                                   title="SHOP NOW" target=""><?= $subscription_btn_text; ?></a>
                            </figure>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-md-12">
                            <div class="br-wrap-title">
                                <h2 class="br-title u-fancy-title u-text-center">
                                    <span>From the blog</span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="brideliness-posts-shortcode">
                        <div class="title-wrapper">
                            <h3><span></span></h3>
                        </div>
                        <ul class="post-list">
                            <?php
                            $args = array(
                                'posts_per_page' => 2,
                                'post_status' => 'publish'
                            );

                            $recent_posts = new WP_Query($args);
                            ?>

                            <?php
                            $post_month = esc_html(get_the_time('M'));
                            $post_day = esc_html(get_the_time('d'));
                            ?>

                            <div class="l-row">

                                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                    <div class="l-col-md-6">
                                        <div class="owl-item">
                                            <li>
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-background"></div>
                                                    <div class="date">
                                                        <span class="day"><?= $post_day; ?></span>
                                                        <span class="month"><?= $post_month; ?></span>
                                                    </div>
                                                    <?php
                                                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                        the_post_thumbnail('blog-thumb');
                                                    } ?>
                                                </div>

                                                <div class="item-content-wrapper ">
                                                    <div class="item-content">
                                                        <h3><a rel="bookmark"
                                                               href="<?= get_permalink(); ?>"
                                                               title="Click to read more"><?= the_title() ?></a>
                                                        </h3>
                                                        <div class="meta-wrapper">
                                                            <div class="author">by Litto Things</div>
                                                        </div>
                                                        <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                                                        <div class="buttons-wrapper">
                                                            <div class="comments-qty"><i
                                                                        class="icon-speech-bubble"></i><?= get_comments_number(get_the_ID()); ?>
                                                            </div>
                                                            <?php if (function_exists('brideliness_output_likes_counter')) : ?>
                                                                <span class="delimeter">|</span>
                                                                <div class="wrapper-likes">
                                                                    <i class="icon-shapes"></i>
                                                                    <div class="likes-counter"><?= brideliness_output_likes_counter(get_the_ID()); ?>
                                                                        <span> likes</span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <a class="posts-img-link button" rel="bookmark"
                                                               href="<?= get_permalink(); ?>"
                                                               title="Click to read more"><i
                                                                        class="fa fa-long-arrow-right"
                                                                        aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_query(); ?>
                            </div>

                        </ul>
                    </div>

                    <?php the_content(); ?>
                </div><!-- .entry-content -->
            <?php endwhile; ?>
        <?php endif; ?>

    </main><!--.site-content-->

<?php get_footer(); ?>