<?php  get_header( 'header' );?>

<main>

<!--<h1>--><?php //bloginfo( 'name' ); ?><!--</h1> -->
<!--<h2>--><?php //bloginfo( 'description' ); ?><!--</h2>-->
<!--get_footer( 'your_custom_template' );-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="featured-image">
       <span><?php the_title(); ?></span>
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>

<!--    <h3 class="title-divider"></h3>-->
  <section class="content">
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
    <?php edit_post_link(); ?>

  </section>
<?php endwhile; ?>

    <?php
    if ( get_next_posts_link() ) {
        next_posts_link();
    }
    ?>
    <?php
    if ( get_previous_posts_link() ) {
        previous_posts_link();
    }
    ?>

<?php else: ?>

    <p>No posts found. :(</p>

<?php endif; ?>
<?php  get_footer( 'footer' );?>