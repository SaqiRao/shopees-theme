<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Gift_for extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'gift_for';
    }

    public function get_title()
    {
        return __('Advertisement - Gift ', 'my-elementor-addon');
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

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Gifts for your loved ones', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Omnis ex nam laudantium odit illum harum, excepturi accusamus at corrupti, velit blanditiis unde perspiciatis, vitae minus culpa? Beatae at aut consequuntur porro adipisci aliquam eaque iste ducimus expedita accusantium?', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button1_text',
            [
                'label' => __('Button 1 Text', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Buy Now', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button1_link',
            [
                'label' => __('Button 1 Link', 'elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'elementor'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button2_text',
            [
                'label' => __('Button 2 Text', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('See More', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button2_link',
            [
                'label' => __('Button 2 Link', 'elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'elementor'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <section class="gift_section layout_padding-bottom">
            <div class="box ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="img_container">
                                <div class="img-box">
                                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="detail-box">
                                <div class="heading_container">
                                    <h2>
                                        <?php echo esc_html($settings['title']); ?>
                                    </h2>
                                </div>
                                <p>
                                    <?php echo esc_html($settings['description']); ?>
                                </p>
                                <div class="btn-box">
                                    <a href="<?php echo esc_url($settings['button1_link']['url']); ?>" class="btn1">
                                        <?php echo esc_html($settings['button1_text']); ?>
                                    </a>
                                    <a href="<?php echo esc_url($settings['button2_link']['url']); ?>" class="btn2">
                                        <?php echo esc_html($settings['button2_text']); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Gift_for());
