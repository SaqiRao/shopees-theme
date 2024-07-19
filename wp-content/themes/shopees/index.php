<?php
// Load the header template
get_header();
?>

<main id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        // Display post content
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;

                    // Pagination
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('Previous', 'your-theme-textdomain'),
                        'next_text' => __('Next', 'your-theme-textdomain'),
                    ));
                else :
                    // Display message when no posts are found
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>


        </div>
    </div>
</main>

<?php
// Load the footer template
get_footer();
