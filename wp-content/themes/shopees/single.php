<?php

/**
 * The template for displaying default single posts.
 *
 * @package YourTheme
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            while (have_posts()) :
                the_post();
            ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                    <header class="entry-header mb-4">
                        <?php the_title('<h1 class="entry-title display-4">', '</h1>'); ?>
                        <p class="text-muted">
                            <small>Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></small>
                        </p>
                    </header><!-- .entry-header -->

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer mt-4">
                        <?php
                        // Display post categories
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<p class="categories"><strong>Categories:</strong> ';
                            foreach ($categories as $category) {
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="badge badge-primary">' . esc_html($category->name) . '</a> ';
                            }
                            echo '</p>';
                        }

                        // Display post tags
                        $tags = get_the_tags();
                        if (!empty($tags)) {
                            echo '<p class="tags"><strong>Tags:</strong> ';
                            foreach ($tags as $tag) {
                                echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="badge badge-secondary">' . esc_html($tag->name) . '</a> ';
                            }
                            echo '</p>';
                        }
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

            <?php
                // If comments are open or there is at least one comment, load the comment template
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

            <?php
            // Display related posts
            $categories = wp_get_post_categories(get_the_ID());
            if ($categories) {
                $args = array(
                    'category__in' => $categories,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3, // Number of related posts to display
                    'caller_get_posts' => 1
                );
                $related_posts_query = new WP_Query($args);
                if ($related_posts_query->have_posts()) : ?>
                    <div class="related-posts mt-5">
                        <h3>Related Posts</h3>
                        <div class="row">
                            <?php while ($related_posts_query->have_posts()) : $related_posts_query->the_post(); ?>
                                <div class="col-md-4">
                                    <div class="related-post card mb-4">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('related-post-thumb', array('class' => 'card-img-top')); ?></a>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="card-author">
                                                <p class="text-muted">
                                                    <small>By <?php the_author(); ?></small>
                                                </p>
                                            </div>
                                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

            <?php
                    wp_reset_postdata();
                endif;
            }
            ?>

        </div><!-- .col-lg-8 -->

        <div class="col-lg-4">
            <?php // get_sidebar(); 
            ?>
        </div><!-- .col-lg-4 -->
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>