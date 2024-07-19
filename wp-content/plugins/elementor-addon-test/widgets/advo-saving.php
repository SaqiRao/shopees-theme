<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Advo_Saving extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'advo_saving';
    }

    public function get_title()
    {
        return __('advertisement - one', 'my-elementor-addon');
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
            'image',
            [
                'label' => __('Image', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Best Savings on new arrivals', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Enter your description here', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'button1_text',
            [
                'label' => __('Button 1 Text', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Buy Now', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'button1_url',
            [
                'label' => __('Button 1 URL', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'button2_text',
            [
                'label' => __('Button 2 Text', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('See More', 'your-plugin-textdomain'),
            ]
        );

        $this->add_control(
            'button2_url',
            [
                'label' => __('Button 2 URL', 'your-plugin-textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'your-plugin-textdomain'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <section class="saving_section ">
            <div class="box">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img-box">
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                                    <a href="<?php echo esc_url($settings['button1_url']['url']); ?>" class="btn1">
                                        <?php echo esc_html($settings['button1_text']); ?>
                                    </a>
                                    <a href="<?php echo esc_url($settings['button2_url']['url']); ?>" class="btn2">
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Advo_Saving());
