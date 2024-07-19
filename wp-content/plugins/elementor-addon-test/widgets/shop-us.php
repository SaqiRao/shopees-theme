<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Repeater;

class Shop_with_Us extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Shop_with_Us';
    }

    public function get_title()
    {
        return __('Shop - Us', 'my-elementor-addon');
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
                'label' => __('Content', 'elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon_title',
            [
                'label' => __('Title', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Fast Delivery', 'elementor'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_description',
            [
                'label' => __('Description', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Variations of passages of Lorem Ipsum available', 'elementor'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'icon_image',
            [
                'label' => __('Image', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'YOUR_DEFAULT_IMAGE_URL',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __('Items', 'elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon_title' => __('Fast Delivery', 'elementor'),
                        'icon_description' => __('Variations of passages of Lorem Ipsum available', 'elementor'),
                        'icon_image' => ['url' => 'YOUR_DEFAULT_IMAGE_URL'],
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="why_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Why Shop With Us
                    </h2>
                </div>
                <div class="row">
                    <?php
                    if ($settings['items']) {
                        foreach ($settings['items'] as $item) {
                    ?>
                            <div class="col-md-4">
                                <div class="box ">
                                    <div class="img-box">
                                        <img src="<?php echo esc_url($item['icon_image']['url']); ?>" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <?php echo esc_html($item['icon_title']); ?>
                                        </h5>
                                        <p>
                                            <?php echo esc_html($item['icon_description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                    } ?>

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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Shop_with_Us());
