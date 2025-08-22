<?php get_header(); ?>

<!-- Inner Header Banner -->
<section class="inner-banner bg-overlay-black-70 bg-holder"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/background-09.jpg');">
    <div class="container">
        <div class="row d-flex justify-content-center"></div>
    </div>
</section>

<!-- Latest Updates Listing -->
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
                            style="border: solid 15px #ededed; border-radius: 10px;">
                    <?php endif; ?>
                </div>
                <div class="col-sm-8" style="font-size: 17px;">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                    <a class="mt-4" href="<?php the_permalink(); ?>">Read more..</a>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p class="text-center pt-5">No updates found.</p>
        <?php endif; ?>

        <!-- Pagination -->
        <div class="row pt-5">
            <div class="col text-center">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« Prev', 'textdomain'),
                    'next_text' => __('Next »', 'textdomain'),
                ));
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
