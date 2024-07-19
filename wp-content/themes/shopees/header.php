<?php
wp_head();
global $Shopees_theme;
if (isset($Shopees_theme['logo_media']['url']) && $Shopees_theme['logo_media']['url'] !== '') {

    $logo_url = $Shopees_theme['logo_media']['url'];
} else {

    $logo_url = "";
}
?>
<!-- header section starts -->
<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo $logo_url; ?>" alt=" Logo" />
            </a>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'navbar-nav mr-auto',
            ));
            ?>
            <div class="user_option">
                <a href="#">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Login</span>
                </a>
                <a href="#">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    </nav>

</header>
<!-- end header section -->