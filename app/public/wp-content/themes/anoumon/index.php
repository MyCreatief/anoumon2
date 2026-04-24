<?php get_header('header'); ?>

    <main>

    <!--<h1>--><?php //bloginfo( 'name' ); ?><!--</h1> -->
    <!--<h2>--><?php //bloginfo( 'description' ); ?><!--</h2>-->
    <!--get_footer( 'your_custom_template' );-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <section class="featured-image-section"
             style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');">
        <div class="wave">
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <span class="image-title"><?php the_title(); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!--    <h3 class="title-divider"></h3>-->
    <section class="content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <?php edit_post_link(); ?>

    </section>
<?php endwhile; ?>

    <?php
    if (get_next_posts_link()) {
        next_posts_link();
    }
    ?>
    <?php
    if (get_previous_posts_link()) {
        previous_posts_link();
    }
    ?>

<?php else: ?>

    <p>No posts found. :(</p>

<?php endif; ?>
<?php get_footer('footer'); ?>