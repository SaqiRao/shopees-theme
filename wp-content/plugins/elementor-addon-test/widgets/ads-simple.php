<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Ad_Post_Simple extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'ad_simple';
    }

    public function get_title()
    {
        return __('Ads - Simple', 'my-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['shopees-widgets'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'your-plugin-textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Latest Products', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Section Description', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Description of the section', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'number_of_products',
            [
                'label' => __('Number of Products', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $number_of_products =  isset($settings['number_of_products']) ? $settings['number_of_products'] : "";
?>
        <section class="shop_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        <?php echo get_theme_mod('shop_section_title', __('Latest Products', 'your-theme-textdomain')); ?>
                    </h2>
                    <p>
                        <?php echo wp_kses_post(get_theme_mod('shop_section_description', '')); ?>
                    </p>
                </div>
                <div class="row">
                    <?php
                    if (!class_exists('WooCommerce')) {
                        return;
                    }
                    $number_of_products = absint(get_theme_mod('number_of_products', 10));
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => $number_of_products,
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product;
                    ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="box">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img-box">
                                            <?php echo $product->get_image(); ?>
                                        </div>
                                        <div class="detail-box">
                                            <h6> <?php the_title(); ?> </h6>
                                            <h6>
                                                <?php echo __('Price', 'your-plugin-textdomain'); ?>
                                                <span> <?php echo $product->get_price_html(); ?> </span>
                                            </h6>
                                        </div>
                                        <div class="new">
                                            <span> <?php echo __('New', 'your-plugin-textdomain'); ?></span>
                                        </div>
                                    </a>
                                    <form class="cart" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post" enctype='multipart/form-data'>
                                        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" />
                                        <button type="submit" class="single_add_to_cart_button button alt"><?php echo __('Add to Cart', 'your-plugin-textdomain'); ?></button>
                                    </form>
                                </div>
                            </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo __('No products found', 'your-theme-textdomain');
                    endif;
                    ?>
                </div>
            </div>
        </section>

<?php
    }
    protected function _content_template()
    {
    }
}

// Register the widget.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Ad_Post_Simple());
