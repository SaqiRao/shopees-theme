<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage shopees
 */

get_header(); ?>
<main id="main" class="site-main" role="main">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
                'after'  => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
<?php
get_footer();
