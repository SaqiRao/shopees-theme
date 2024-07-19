<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Map_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'map_for';
    }

    public function get_title()
    {
        return __('Map - Widget', 'my-elementor-addon');
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
                'label' => __('Content', 'my-elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Section Title', 'my-elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'my-elementor-addon'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $map_section = isset($settings['title']) ?  $settings['title'] : "";
?>
        <section class="contact_section ">
            <div class="container px-0">
                <div class="heading_container ">
                    <h2 class="">
                        <?php echo $map_section; ?>
                    </h2>
                </div>
            </div>
            <div class="container container-bg">
                <div class="row">
                    <div class="col-lg-7 col-md-6 px-0">
                        <div class="map_container">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Lahore+Pakistan&center=31.5497,74.3436&zoom=12" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 px-0">
                        <?php
                        // Output the Contact Form 7 form
                        echo do_shortcode('[contact-form-7 id="945f652" title="Contact form 1"]');
                        ?>
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Map_Widget());
