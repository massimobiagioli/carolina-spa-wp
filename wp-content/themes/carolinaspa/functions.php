<?php

// Adds Javascripts and Stylesheets
function carolinaspa_styles_and_scripts() {
    // CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Italianno|Lato:400,900|Raleway:400,700,900');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');

    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'carolinaspa_styles_and_scripts');

// Setup Theme
function carolinaspa_setup() {
    // Navigation Menus
    register_nav_menus(array(
        'main_menu' => esc_html__('Main Menu', 'carolinaspa'),
        'social_menu' => esc_html__('Social', 'carolinaspa')
    ));

    // Featured Images
    add_theme_support('post-thumbnails');

    // Change thumb size
    update_option('thumbnail_size_w', 216);
    update_option('thumbnail_size_h', 144);
    update_option('thumbnail_crop', 1);
}

add_action('after_setup_theme', 'carolinaspa_setup');

// Adds bootstrap nav-item class to the <li> of the main menu
function carolinaspa_custom_li_class($classes, $item, $args) {
    if ($args->theme_location === 'main_menu') {
        $classes[] = 'nav-item';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'carolinaspa_custom_li_class', 1, 3);

// Adds bootstrap nav-link class to the <a> of the main menu
function carolinaspa_custom_a_class($atts, $item, $args) {
    if ($args->theme_location === 'main_menu') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'carolinaspa_custom_a_class', 10, 3);

// Widgets
function carolinaspa_widgets() {
    register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'footer_widget_1',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-uppercase text-center pb-4">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'footer_widget_2',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-uppercase text-center pb-4">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'footer_widget_3',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-uppercase text-center pb-4">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar Widget 1',
        'id' => 'sidebar_widget_1',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="text-center text-uppercase pt-4">',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'carolinaspa_widgets');

// Create custom widget for business hours

class Business_Hours extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'business_hours', // Base ID
                esc_html__('Business Hours Widget', 'text_domain'), // Name
                array('description' => esc_html__('Business Hours (Check About Us to make some changes)', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        $about = get_page_by_title('About Us');
        ?>

        <div class="sidebar hours p-3">
            <?php
            echo $args['before_widget'];
            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }
            ?>
            <p class="text-center mt-5"><?php the_field('business_hours_text', $about->ID); ?></p>

            <?php
            $table = get_field('business_hours', $about->ID);
            if (table):
                ?>

                <table class="table table-hover text-center mt-5">
                    <thead class="table-danger">
                        <tr>
                            <?php foreach ($table['header'] as $th): ?>
                                <th class="text-center"><?php echo $th['c']; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($table['body'] as $tr): ?>
                            <tr>
                                <?php foreach ($tr as $td): ?>
                                    <td><?php echo $td['c']; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

function register_business_hours() {
    register_widget('Business_Hours');
}

add_action('widgets_init', 'register_business_hours');
