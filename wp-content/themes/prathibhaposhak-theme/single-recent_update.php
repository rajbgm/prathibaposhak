<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Banner -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/background-10.jpg');">
    <div class="container"></div>
</section>

<!-- Post Content -->
<section class="space-ptb" style="padding-top: 25px; padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 class="text-dark"><?php the_title(); ?></h4>
            </div>
        </div>

        <div class="row pt-5">
            <?php if (has_post_thumbnail()) : ?>
                <div class="col-md-12">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid shadow-sm"
                        style="border-radius: 6px; border: solid 15px #ededed;" alt="<?php the_title(); ?>">
                </div>
            <?php endif; ?>

            <div class="col-sm-12" style="font-size: 17px; padding-top: 15px;">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<!-- More Recent Updates -->
<section class="space-ptb bg-gray" style="padding-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>More recent updates</h4>
            </div>
        </div>

        <div class="row pt-lg-3">
            <?php
            $current_id = get_the_ID();
            $recent_posts = new WP_Query(array(
                'post_type'      => 'recent_update',
                'posts_per_page' => 2,
                'post__not_in'   => array($current_id),
            ));
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="col-sm-6 text-center">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid"
                            style="border: solid 15px #ededed;">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h5><?php the_title(); ?></h5>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-12 align-content-center text-center">
                <a href="<?php echo get_post_type_archive_link('recent_update'); ?>"
                    class="btn btn-primary btn-roundup">Read More Updates</a>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
