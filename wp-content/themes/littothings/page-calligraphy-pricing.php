<?php /* The template for displaying all pages */

get_header(); ?>

<?php
$pricing_title = get_field('pricing_title');
$pricing_content = get_field('pricing_content');
$booking_title = get_field('booking_title');
$booking_content = get_field('booking_content');
$order_details_title = get_field('order_details_title');
$order_details_content = get_field('order_details_content');
$payment_details_title = get_field('payment_details_title');
$payment_details_content = get_field('payment_details_content');
?>

<main class="site-content<?php if (function_exists('brideliness_main_content_class')) brideliness_main_content_class(); ?>"
      itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

    <div class="l-contrainer">
        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-8 l-col-md-offset-2">
                <h3><?= $pricing_title; ?></h3>
                <?= $pricing_content; ?>
            </div>
        </div>

        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-8 l-col-md-offset-2">
                <h3><?= $booking_title; ?></h3>
                <?= $booking_content; ?>
            </div>
        </div>

        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-8 l-col-md-offset-2">
                <div class="tabsy">

                    <input type="radio" id="tab1" name="tab" checked>
                    <label class="tabButton" for="tab1">Calligraphy</label>

                    <div class="tab">
                        <div class="content">
                            <div class="l-row">
                                <?php if (have_rows('calligraphy_pricing')) : ?>
                                    <?php while (have_rows('calligraphy_pricing')) : the_row(); ?>

                                        <?php
                                        $service_title = get_sub_field('service_title');
                                        ?>

                                        <div class="l-col-md-12 u-text-center pricing">
                                            <h4><?= $service_title; ?></h4>
                                            <?php if (have_rows('service_price_list')) : ?>
                                                <?php while (have_rows('service_price_list')) : the_row(); ?>

                                                    <?php
                                                    $pricing_item = get_sub_field('pricing_item');
                                                    ?>

                                                    <p><?= $pricing_item; ?></p>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!--                        <h3>Envelope Addressing</h3>-->
                    <!--                        <p>£2 to £4 per envelope</p>-->
                    <!--                        <p>or higher for special requests</p>-->
                    <!---->
                    <!--                        <h3>Envelope Addressing</h3>-->
                    <!--                        <p>£2 to £4 per envelope</p>-->
                    <!--                        <p>or higher for special requests</p>-->

                    <input type="radio" id="tab2" name="tab">
                    <label class="tabButton" for="tab2">The Collection</label>

                    <div class="tab">
                        <div class="content">
                            <div class="l-row">
                                <?php if (have_rows('the_collection_pricing')) : ?>
                                    <?php while (have_rows('the_collection_pricing')) : the_row(); ?>

                                        <?php
                                        $service_title = get_sub_field('service_title');
                                        ?>

                                        <div class="l-col-md-12 u-text-center pricing">
                                            <h4><?= $service_title; ?></h4>
                                            <?php if (have_rows('service_price_list')) : ?>
                                                <?php while (have_rows('service_price_list')) : the_row(); ?>

                                                    <?php
                                                    $pricing_item = get_sub_field('pricing_item');
                                                    ?>

                                                    <p><?= $pricing_item; ?></p>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <input type="radio" id="tab3" name="tab">
                    <label class="tabButton" for="tab3">Bespoke</label>

                    <div class="tab">
                        <div class="content">
                            <div class="l-row">
                                <?php if (have_rows('bespoke_pricing')) : ?>
                                    <?php while (have_rows('bespoke_pricing')) : the_row(); ?>

                                        <?php
                                        $service_title = get_sub_field('service_title');
                                        ?>

                                        <div class="l-col-md-12 u-text-center pricing">
                                            <h4><?= $service_title; ?></h4>
                                            <?php if (have_rows('service_price_list')) : ?>
                                                <?php while (have_rows('service_price_list')) : the_row(); ?>

                                                    <?php
                                                    $pricing_item = get_sub_field('pricing_item');
                                                    ?>

                                                    <p><?= $pricing_item; ?></p>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-8 l-col-md-offset-2">
                <h3><?= $order_details_title; ?></h3>
                <?= $order_details_content; ?>
            </div>
        </div>

        <div class="l-row u-box-margin--bottom">
            <div class="l-col-md-8 l-col-md-offset-2">
                <h3><?= $payment_details_title; ?></h3>
                <?= $payment_details_content; ?>
            </div>
        </div>

    </div>

    <form class="form-section-wrap">
        <div class="l-contrainer">
            <div class="l-row">
                <div class="l-col-md-8 l-col-md-offset-2">
                    <?php echo do_shortcode( '[contact-form-7 id="4700" title="Calligraphy & Design"]' ); ?>
                </div>
            </div>
        </div>
    </form>
</main><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
