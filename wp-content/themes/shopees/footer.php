<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package shopees
 */

global $Shopees_theme;
?>

<section class="info_section layout_padding2-top">
    <div class="social_container">
        <div class="social_box">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="info_container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <h6><?php echo $Shopees_theme['about_us_heading']; ?></h6>
                    <p>
                        <?php echo $Shopees_theme['info_about']; ?>
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info_form">
                        <h5> <?php echo $Shopees_theme['newslatter_heading']; ?></h5>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6> <?php echo $Shopees_theme['needhelp_heading']; ?></h6>
                    <p>
                        <?php echo $Shopees_theme['info_needhelp']; ?>

                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6><?php echo $Shopees_theme['Contact_heading']; ?></h6>
                    <div class="info_link-box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span> Gb road 123 london Uk </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>+01 12345678901</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> demo@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> <?php echo __('All Rights Reserved By', ''); ?>
                <a href="https://html.design/"><?php echo $Shopees_theme['web_right_text']; ?></a>
            </p>
        </div>
    </footer>
    <!-- footer section -->
</section>

<?php wp_footer(); ?>
</body>

</html>