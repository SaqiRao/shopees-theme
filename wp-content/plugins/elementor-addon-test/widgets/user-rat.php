<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class User_Rating extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'user_rate';
    }

    public function get_title()
    {
        return __('User - Rating', 'my-elementor-addon');
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
                'label' => __('Title', 'my-elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hello World', 'my-elementor-addon'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        //$settings = $this->get_settings_for_display();
?>
        <section class="client_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Testimonial
                    </h2>
                </div>
            </div>
            <div class="container px-0">
                <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Morijorch
                                        </h5>
                                        <h6>
                                            Default model text
                                        </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Rochak
                                        </h5>
                                        <h6>
                                            Default model text
                                        </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Brad Johns
                                        </h5>
                                        <h6>
                                            Default model text
                                        </h6>
                                    </div>
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy, editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
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
    }
}

// Register the widget.
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new User_Rating());
