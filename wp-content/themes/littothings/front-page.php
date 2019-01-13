<?php /* Template Name: Front Page */

get_header(); ?>

    <main id="content" class="site-content <?php brideliness_main_content_class(); ?>" itemscope="itemscope"
          itemprop="mainContentOfPage">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="entry-content--top">

                    <div class="l-row u-box-margin--bottom">
                        <div class="l-col-md-4">
                            <figure class="brideliness-banner banner-with-effects effect-bubba2"
                                    style="background: url('http://littothings.local/wp-content/uploads/2018/12/Litto-Things-bridal-2-1.jpg') no-repeat center; background-size: cover; height:474px; position: relative; overflow: hidden; width: 100%;">
                                <div class="background-overlay"
                                     style="background-color: rgb(80,80,80,0.3); height: 100%;"></div>
                                <a href="http://littothings.local/shop/">
                                    <figcaption>
                                        <h3 class="main-caption main-caption--vertical u-text-white">
                                            Wedding
                                        </h3>
                                        <h4 class="small-caption u-text-white">Celebration of Love</h4>
                                    </figcaption>
                                </a>
                                <!--                                    <a class="button-banner button1" style="left:10%; top:62%;" href="http://littothings.local/shop/" title="SHOP NOW" target="">SHOP NOW</a>-->
                            </figure>
                        </div>

                        <div class="l-col-md-4">
                            <figure class="brideliness-banner banner-with-effects effect-bubba2"
                                    style="background: url('http://littothings.local/wp-content/uploads/2018/12/Photo-07-12-2018-13-46-27.jpg') no-repeat center; background-size: cover; height:474px; position: relative; overflow: hidden; width: 100%;">
                                <div class="background-overlay"
                                     style="background-color: rgb(80,80,80,0.3); height: 100%;"></div>
                                <a href="http://littothings.local/shop/">
                                    <figcaption>
                                        <h3 class="main-caption main-caption--vertical u-text-white">Homemade Soap</h3>
                                        <h4 class="small-caption u-text-white">Natural Ingredients</h4>
                                    </figcaption>
                                </a>
                                <!--                                    <a class="button-banner button1" style="left:10%; top:62%;" href="http://littothings.local/shop/" title="SHOP NOW" target="">SHOP NOW</a>-->
                            </figure>
                        </div>

                        <div class="l-col-md-4">
                            <figure class="brideliness-banner banner-with-effects effect-bubba2"
                                    style="background: url('http://littothings.local/wp-content/uploads/2018/12/Photo-31-12-2018-19-54-052.jpg') no-repeat center; background-size: cover; height:474px; position: relative; overflow: hidden; width: 100%;">
                                <div class="background-overlay"
                                     style="background-color: rgb(80,80,80,0.3); height: 100%;"></div>
                                <a href="http://littothings.local/shop/">
                                    <figcaption>
                                        <h3 class="main-caption main-caption--vertical u-text-white">Calligraphy</h3>
                                        <h4 class="small-caption u-text-white">Adding a Personal Touch</h4>
                                    </figcaption>
                                </a>
                                <!--                                    <a class="button-banner button1" style="left:10%; top:62%;" href="http://littothings.local/shop/" title="SHOP NOW" target="">SHOP NOW</a>-->
                            </figure>
                        </div>
                    </div>

                    <div class="l-row u-box-margin--bottom">
                        <div class="l-col-md-12">
                            <figure class="brideliness-banner banner-with-effects effect-bubba2"
                                    style="background: url('http://littothings.local/wp-content/uploads/2019/01/Litto-Things-bridesmaid.jpg') no-repeat center; background-size: cover; height:173px; position: relative; overflow: hidden; width: 100%;">
                                <div class="background-overlay"
                                     style="background-color: rgb(80,80,80,0.3); height: 100%;"></div>
                                <a href="http://littothings.local/shop/">
                                    <figcaption>
                                        <h3 class="main-caption main-caption--banner u-text-white">
                                            Get a £5 Off Voucher for Your Next Order over £50
                                        </h3>
                                    </figcaption>
                                </a>
                                <a class="button-banner small-caption-cta button1" href="http://littothings.local/shop/"
                                   title="SHOP NOW" target="">SUBSCRIBE NOW</a>
                            </figure>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-md-12">
                            <div class="br-wrap-title">
                                <h2 style="font-size: 28px;text-align: center;font-family:EB Garamond;font-weight:400;font-style:normal"
                                    class="br-title ">
                                    <span>FROM THE BLOG</span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="brideliness-posts-shortcode">
                        <div class="title-wrapper">
                            <h3><span></span></h3>
                        </div>
                        <ul class="post-list columns-2 owl-carousel owl-theme"
                            style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper" style="display: block;">
                                    <?php
                                    $args = array(
                                        'posts_per_page' => 2,
                                        'post_status' => 'draft, publish'
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
                                                                <div class="entry-excerpt"><?php the_excerpt();?></div>
                                                                <div class="buttons-wrapper">
                                                                    <div class="comments-qty"><i
                                                                                class="icon-speech-bubble"></i><?= get_comments_number(get_the_ID());?>
                                                                    </div>
                                                                    <?php if (function_exists('brideliness_output_likes_counter')) : ?>
                                                                    <span class="delimeter">|</span>
                                                                    <div class="wrapper-likes">
                                                                        <i class="icon-shapes"></i>
                                                                        <div class="likes-counter"><?= brideliness_output_likes_counter(get_the_ID());?><span> likes</span>
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

                                    </div>
                            </div>
                        </ul>
                    </div>

                <?php the_content(); ?>
                </div><!-- .entry-content -->
            <?php endwhile; ?>
        <?php endif; ?>

    </main><!--.site-content-->

<?php get_footer(); ?>