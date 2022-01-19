<?php
function theoriemakkie_select_dropdown()
{
    if ($terms = get_terms(array(
        'taxonomy' => 'locations', // to make it simple I use default categories
        'orderby' => 'name'
    ))) {
        // if categories exist, display the dropdown
        echo '<select name="categoryfilter" id="location_filter"><option value="">Select location...</option>';
        foreach ($terms as $term) {
            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as an option value
        }
        echo '</select>';
    }
}
function theoriemakkie_enqueue_ajax() {
    wp_enqueue_script( 'theoriemakkie-ajax', plugin_dir_url(__FILE__) . '/ajax.js', array('jquery'), '1.0.0', true );
    wp_localize_script( 'theoriemakkie-ajax', 'theoriemakkie_filter',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ),
    );
}
add_action( 'wp_enqueue_scripts', 'theoriemakkie_enqueue_ajax' );
function theoriemakkie_filter_locations(){
    $location = $_POST['location'];
    $wp_query = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'locations',
                'field' => 'term_id',
                'terms' => $location,
            ),
        )
    );
    $wp_query = new \WP_Query($wp_query);
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $location = get_the_terms(get_the_ID(), 'locations');
            ?>
            <tr>
                <td>
                    <svg width="14px" height="14px" viewBox="0 0 18 20" version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                           fill-rule="evenodd">
                            <g id="Group" fill="#000000" fill-rule="nonzero">
                                <path d="M16,2 L15,2 L15,0 L13,0 L13,2 L5,2 L5,0 L3,0 L3,2 L2,2 C0.89,2 0,2.9 0,4 L0,18 C0,19.1045695 0.8954305,20 2,20 L16,20 C17.1045695,20 18,19.1045695 18,18 L18,4 C18,2.8954305 17.1045695,2 16,2 M16,18 L2,18 L2,8 L16,8 L16,18 M16,6 L2,6 L2,4 L16,4 L16,6 M9,11 L14,11 L14,16 L9,16 L9,11 Z"
                                      id="Shape"></path>
                            </g>
                        </g>
                    </svg>
                    <span class="date_before"><?php echo theoriemakkie_course_meta('date_before'); ?></span> <?php echo theoriemakkie_course_meta('date'); ?>
                </td>
                <td><?php foreach ($location as $name) { echo esc_html($name->name); } ?></td>
                <td><?php echo theoriemakkie_course_meta('free'); ?></td>
                <td class="table-button">
                    <a href="<?php echo theoriemakkie_course_meta('btn_link'); ?>"><?php echo esc_html('Aanmelden') ?></a>
                </td>
            </tr>
        <?php }
    }
    wp_die();
}
add_action('wp_ajax_theoriemakkie_filter', 'theoriemakkie_filter_locations');
add_action('wp_ajax_nopriv_theoriemakkie_filter', 'theoriemakkie_filter_locations');