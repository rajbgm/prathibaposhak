<?php get_header(); ?>

<!-- Banner -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/background-09.jpg');">
    <div class="container"></div>
</section>

<section class="space-ptb" style="padding-top: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 class="text-dark">Latest News and Updates</h4>
            </div>
        </div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row pt-5">
                <div class="col-sm-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid shadow-sm"
                            style="border: solid 15px #ededed; border-radius: 10px;" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                </div>
                <div class="col-sm-8" style="font-size: 17px;">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 35, '...'); ?></p>
                    <a class="mt-4" href="<?php the_permalink(); ?>">Read more..</a>
                </div>
            </div>
        <?php endwhile; else : ?>
            <div class="row pt-5">
                <div class="col-sm-12 text-center">
                    <p>No updates found.</p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Optional Pagination -->
        <div class="row pt-5">
            <div class="col-sm-12 text-center">
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« Prev'),
                    'next_text' => __('Next »'),
                )); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
