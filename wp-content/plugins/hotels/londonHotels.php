<?php
/*
 * Plugin Name: Hotels
 * Description: Displays a simple list of the hotels.
 * Version: 0.1
 * Author: Jorge Lima
 * Author URI: http://creativeconcept.com.br
 */

class Hotels extends WP_Widget {

    function __construct() {
        parent::__construct(
                $id_base = 'hotels', $name = __('Hotels'));
    }

    function form() {
        
    }

    function update($new_instance, $old_instance) {
        parent::update($new_instance, $old_instance);
    }

    function widget($args, $instance) {
        ?>
        <div class="hotels">
            <h2>List of london hotels</h2>
            <ul>
                <?php
                $q_args = array('post_type' => 'hotels', 'hotel-location' => 'london');
                $loop = new WP_Query($q_args);
                while ($loop->have_posts()) {
                    $loop->the_post();
                    ?>
                    <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
        <?php } ?>
            </ul>
        </div>
        <div class="all_hotels">
            <h2>See all hotels:</h2>
            <a href="<?php echo get_post_type_archive_link('hotels'); ?>">All Hotels</a>
        </div>
        <div class="all_hotels">
            <h2>See New York Hotel:</h2>
            <a href="<?php echo get_term_link('new-york','hotel-location'); ?>">New York Hotel</a>
        </div>
        <?php
    }

}

add_action('widgets_init', function() {
    register_widget('Hotels');
});
?>