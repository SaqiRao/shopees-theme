<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Hero_First extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'hero_first';
    }

    public function get_title()
    {
        return __('Hero Widget', 'my-elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['shopees-widgets'];
    }

    protected function _register_controls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Slide Title', 'plugin-name'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Slide Description', 'plugin-name'),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'btn_text',
            [
                'label' => __('Button Text', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Click Here', 'plugin-name'),
            ]
        );

        $repeater->add_control(
            'btn_url',
            [
                'label' => __('Button URL', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'plugin-name'),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->start_controls_section(
            'slider_section',
            [
                'label' => __('Slider', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Slide 1 Title', 'plugin-name'),
                        'description' => __('Slide 1 Description', 'plugin-name'),
                        'btn_text' => __('Click Here', 'plugin-name'),
                        'btn_url' => ['url' => '#'],
                        'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
                    ],
                    // Add more default slides if needed
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }



    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="hero_area">


            <!-- slider section -->


            <section class="slider_section">
                <div class="slider_container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($settings['slides'] as $index => $slide) : ?>
                                <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="detail-box">
                                                    <h1><?php echo esc_html($slide['title']); ?></h1>
                                                    <p><?php echo esc_html($slide['description']); ?></p>
                                                    <a href="<?php echo esc_url($slide['btn_url']['url']); ?>"><?php echo esc_html($slide['btn_text']); ?></a>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="img-box">
                                                    <img src="<?php echo esc_url($slide['image']['url']); ?>" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel_btn-box">
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <img src="images/line.png" alt="" />
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

    <?php
    }
    protected function _content_template()
    {
        // Template for frontend display.
    }
}

// Register the widget.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Hero_First());
