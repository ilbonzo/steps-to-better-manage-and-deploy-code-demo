<?php
/**
 * Plugin Name: Luna FL plugin
 * Description: Luna first plugin
 * Version: 1.0
 * Author: Matteo Magni
 * Author URI: https://magni.me
 */

class MarioLuna extends WP_Widget
{

    public function __construct()
    {
        // Define the constructor

        $options = array(
            'classname' => 'custom_livescore_widget',
            'description' => 'Luna srl test',
        );

        parent::__construct(
            'live_score_widget', 'Luna Partner', $options
        );
    }

    public function widget($args, $instance)
    {

    // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        echo $args['before_title'] . apply_filters('widget_title', 'Luna Partner') . $args['after_title'];

    // This is where you run the code and display the output
        $api_key = 'HL5jkmo3B5Svw6OfZcHO5jpyjgK2';
        $api_url = "http://cricapi.com/api/matches?apikey=" . $api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $api_url);
        $result = curl_exec($ch);
        curl_close($ch);

        $cricketMatches = json_decode($result);

        foreach ($cricketMatches->matches as $item) {
            if ($item->matchStarted == true) {
                echo $item->{'team-1'}, ' vs ', $item->{'team-2'}, '<br />';
            }
        }
    }
}

?>
