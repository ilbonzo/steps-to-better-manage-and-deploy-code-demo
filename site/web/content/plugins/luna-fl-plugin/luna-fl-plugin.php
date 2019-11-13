<?php
/**
 * Plugin Name: Luna FL plugin
 * Description: Luna first plugin
 * Version: 1.0
 * Author: Matteo Magni
 * Author URI: https://magni.me
 */

class My_Custom_Widget extends WP_Widget {

    public function __construct() {
        // Define the constructor

        $options = array(
            'classname' => 'custom_livescore_widget',
            'description' => 'Software Developer',
        );

        parent::__construct(
            'live_score_widget', 'Luna Partner', $options
        );
    }

    public function widget( $args, $instance ) {
        // Keep this line
        echo $args['before_widget'];

        echo $args['before_title'] . apply_filters( 'widget_title', 'Luna Partner' ) . $args['after_title'];
        echo 'Eccomi !!!';

        // Keep this line
        echo $args['after_widget'];
    }
}

    // Register the widget
    function my_register_custom_widget() {
        register_widget( 'My_Custom_Widget' );
    }
    add_action( 'widgets_init', 'my_register_custom_widget' );

?>
