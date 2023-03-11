<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lotteryaddons_draw_res extends Widget_Base
{

    public function get_name()
    {
        return 'lotteryaddons-draw_res';
    }

    public function get_title()
    {
        return __('Draw Results', 'lotteryaddons');
    }

    public function get_categories()
    {
        return ['lotteryaddons-addons'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Draw List', 'lotteryaddons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'number_winner',
            [
                'label' => esc_html__('Number Of Winner', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );
        $this->add_control(
            'show_pagi',
            [
                'label' => __( 'Show Pagination', 'lotteryaddons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__( 'Show', 'lotteryaddons' ),
                'label_off' => esc_html__( 'Hide', 'lotteryaddons' ),
                'return_value' => 'yes',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'lty_lottery_winner',
            'post_status' => array('lty_publish'),
            'posts_per_page' => $settings['number_winner'],
            'fields' => 'ids',
            'orderby' => 'ID',
            'paged' => $paged
        );
        ?>
        <div class="lty-a-competition-results-wrapper">
        <div class="lty-a-result-wrap">
        <?php
        $query = new \WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $winner = lty_get_lottery_winner(get_the_ID());
                $end_date = \LTY_Date_Time::get_wp_format_datetime_from_gmt( $winner->get_product()->get_lty_end_date_gmt(), false, ' ', false );
                ?>
                <div class="lty-a-winner-card">
                    <div class="lty-a-card-body">
                        <h4 class="lty-a-card-title"><?php echo esc_html( $end_date ); ?></h4>

                        <div class="lty-a-single-result">
                            <strong></strong>
                            <span class="ticket-winner-name"><?php echo esc_html($winner->get_user()->first_name); ?> <?php echo esc_html($winner->get_user()->last_name); ?></span>
                            <span class="ticket-winner-tn"> - Ticket #<?php echo esc_html($winner->get_lottery_ticket_number()); ?></span>
                        </div>

                    </div>
                </div>
                <?php
            }
            // Display pagination links
            ?>
        </div>
            <div class="lty-pagination-wrap">
            <?php
            if ($settings['show_pagi']) {
                // Display pagination links
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'total' => $query->max_num_pages,
                    'prev_text' => __('« Prev'),
                    'next_text' => __('Next »'),
                    'mid_size' => 4, // number of page links to show on each side of the current page
                    'type' => 'list', // output pagination links as an unordered list
                ));
            }
            ?>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
        </div>
        <?php
    }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new lotteryaddons_draw_res());
?>