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
                'label' => __('Course Date', 'lotteryaddons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Category', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'lotteryaddons'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Style', 'lotteryaddons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titleh_color',
            [
                'label' => __('Title Hover Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item h4:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'lotteryaddons'),
                'selector' => '{{WRAPPER}} .service .item h4',
            ]
        );
        $this->add_control(
            'post_in_color',
            [
                'label' => __('Info Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihii',
                'label' => __('Info Typography', 'lotteryaddons'),
                'selector' => '{{WRAPPER}} .service .item p',
            ]
        );
        $this->add_control(
            'icon_c',
            [
                'label' => __('Icon Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_cl',
            [
                'label' => __('Icon Hover', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg',
            [
                'label' => __('Icon Hover Background', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .hexagon:before, 
                    {{WRAPPER}} .service .item:hover .hexagon:after, {{WRAPPER}} .service .item:hover .hexagon' => 'border-color: {{VALUE}}; background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btnt',
                'label' => __('Button Typography', 'lotteryaddons'),
                'selector' => '{{WRAPPER}} .service .item .thm-btn',
            ]
        );
        $this->add_control(
            'btn_c',
            [
                'label' => __('Button Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg',
            [
                'label' => __('Button Background', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hc',
            [
                'label' => __('Button Hover Color', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bgh',
            [
                'label' => __('Button Hover Background', 'lotteryaddons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Row Gap', 'lotteryaddons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $winners = lty_get_lottery_winners();
        ?>
        <div class="draw-lists-lottery-addons">
            <?php
            if (!empty($winners)){
            foreach ($winners as $winner) {
                $winner = lty_get_lottery_winner($winner);
                $order_id = $winner->get_order_id();
                $order = wc_get_order($order_id);
                $end_date = \LTY_Date_Time::get_wp_format_datetime_from_gmt( $winner->get_product()->get_lty_end_date_gmt(), false, ' ', false );
                ?>
                <div class="winners-box-lt-a">
                    <div class="winner-img-lty-a">
                        <?php echo wp_kses_post($winner->get_product()->get_image('full')); ?>
                    </div>
                    <div class="winner-body-txt">
                        <h4><?php echo esc_html($winner->get_product()->get_title()); ?></h4>
                        <p><?php echo esc_html($winner->get_user()->first_name); ?> <?php echo esc_html($winner->get_user()->last_name); ?> from <?php echo esc_html($order->get_billing_city()); ?>
                            <?php echo esc_html( $end_date ); ?></p>
                        <span>Ticket #<?php echo esc_html($winner->get_lottery_ticket_number()); ?></span>
                    </div>
                </div>
            <?php } }?>
        </div>
        <?php
        // Custom WP query query
//        $args_query = array(
//            'post_type' => 'lty_lottery_winner',
//            'post_status' => array('lty_publish'),
//            'posts_per_page' => '-1',
//            'fields' => 'ids',
//            'orderby' => 'ID'
//        );
//
//        $query = new \WP_Query( $args_query );
//
//        if ( $query->have_posts() ) {
//            while ( $query->have_posts() ) {
//                $query->the_post();
//                the_title();
//            }
//        } else {
//            echo 'No Winners!';
//        }
//
//        wp_reset_postdata();
//
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