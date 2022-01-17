<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class theoriemakkie_coursedate extends Widget_Base
{

    public function get_name()
    {
        return 'theoriemakkie-coursedate';
    }

    public function get_title()
    {
        return __('Course Date', 'theoriemakkie');
    }

    public function get_categories()
    {
        return ['theoriemakkie-addons'];
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
                'label' => __('Course Date', 'theoriemakkie'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cat_query',
            [
                'label' => __('Week', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => theoriemakkie_cats_arr('week'),
                'multiple' => true,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Category', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'theoriemakkie'),
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Style', 'theoriemakkie'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'post_titleh_color',
            [
                'label' => __('Title Hover Color', 'theoriemakkie'),
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
                'label' => __('Title Typography', 'theoriemakkie'),
                'selector' => '{{WRAPPER}} .service .item h4',
            ]
        );
        $this->add_control(
            'post_in_color',
            [
                'label' => __('Info Color', 'theoriemakkie'),
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
                'label' => __('Info Typography', 'theoriemakkie'),
                'selector' => '{{WRAPPER}} .service .item p',
            ]
        );
        $this->add_control(
            'icon_c',
            [
                'label' => __('Icon Color', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_cl',
            [
                'label' => __('Icon Hover', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .hexagon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg',
            [
                'label' => __('Icon Hover Background', 'theoriemakkie'),
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
                'label' => __('Button Typography', 'theoriemakkie'),
                'selector' => '{{WRAPPER}} .service .item .thm-btn',
            ]
        );
        $this->add_control(
            'btn_c',
            [
                'label' => __('Button Color', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg',
            [
                'label' => __('Button Background', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hc',
            [
                'label' => __('Button Hover Color', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bgh',
            [
                'label' => __('Button Hover Background', 'theoriemakkie'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service .item:hover .thm-btn' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Row Gap', 'theoriemakkie'),
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

        $tax_args = array(
            'taxonomy' => 'week',
            'number' => $settings['show_cat'],
            'include' => $settings['cat_query'],
            'hide_empty' => false,
        );
        $categories = get_terms($tax_args);
        ?>

        <div class="course-date-section">
            <form name="woosearchbox" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
            <?php
            $args = array(
                'show_option_all' => esc_html__('All Locations', 'theoriemakkie'),
                'hierarchical' => 1,
                'echo' => 1,
                'value_field' => 'slug',
                'taxonomy' => 'locations',
                'name' => 'locations',
                'class' => 'cate-dropdown hidden-xs',
            );
            wp_dropdown_categories($args);
            ?>
            <input type="hidden" value="product" name="post_type">
            <button type="submit" title="<?php esc_attr_e('Filter', 'theoriemakkie'); ?>" class="search-btn-bg"><span><?php esc_attr_e('Filter','theoriemakkie');?></span></button>
            </form>
                <?php
            if ($categories) {
                foreach ($categories as $category) {
                    $wp_query = new \WP_Query(array(
                        'post_type' => 'coursedate',
                        'posts_per_page' => $settings['posts_per_page'],
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'week',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            )
                        )
                    ));
                    ?>
                    <div class="table-wrapper">
                        <h3><?php echo esc_html($category->name); ?></h3>
                        <table class="table">
                            <?php
                            if ($wp_query->have_posts()) {
                                while ($wp_query->have_posts()) {
                                    $wp_query->the_post();
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
                                        <td>Amsterdam</td>
                                        <td><?php echo theoriemakkie_course_meta('free'); ?></td>
                                        <td class="table-button">
                                            <a href="<?php echo theoriemakkie_course_meta('btn_link'); ?>"><?php echo esc_html('Aanmelden') ?></a>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        </table>
                    </div>
                <?php }
            } ?>
        </div>

    <?php }


    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new theoriemakkie_coursedate());
?>