<?php

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor text editor widget.
 *
 * Elementor widget that displays a WYSIWYG text editor, just like the WordPress
 * editor.
 *
 * @since 1.0.0
 */
class Futurio_Extra_Blog_Feed_Comments extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve text editor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'blog-comments';
    }

    /**
     * Get widget title.
     *
     * Retrieve text editor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Post comments', 'futurio-extra');
    }

    /**
     * Get widget icon.
     *
     * Retrieve text editor widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-comments';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the text editor widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @since 2.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['blog-layout'];
    }

    /**
     * Register text editor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'section_comments',
                [
                    'label' => __('Content', 'futurio-extra'),
                ]
        );

        $this->add_control(
                'text',
                [
                    'label' => __('Text before', 'futurio-extra'),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'placeholder' => '',
                ]
        );
        $this->add_control(
                'separator',
                [
                    'label' => __('Comments Off text', 'futurio-extra'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Off',
                ]
        );
        $this->add_control(
                'icon',
                [
                    'label' => __('Icon', 'futurio-extra'),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-comments-o',
                    'separator' => 'before',
                ]
        );

        $this->add_control(
                'icon_align',
                [
                    'label' => __('Icon Position', 'futurio-extra'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left' => __('Before', 'futurio-extra'),
                        'right' => __('After', 'futurio-extra'),
                    ],
                    'condition' => [
                        'icon!' => '',
                    ],
                ]
        );

        $this->add_control(
                'icon_indent',
                [
                    'label' => __('Icon Spacing', 'futurio-extra'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 50,
                        ],
                    ],
                    'condition' => [
                        'icon!' => '',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-comments .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .futurio-elementor-comments .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
                'section_style',
                [
                    'label' => __('Content', 'futurio-extra'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_responsive_control(
                'align',
                [
                    'label' => __('Alignment', 'futurio-extra'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __('Left', 'futurio-extra'),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __('Center', 'futurio-extra'),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __('Right', 'futurio-extra'),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-comments' => 'text-align: {{VALUE}};',
                    ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'text_style',
                [
                    'label' => __('Text', 'futurio-extra'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'selector' => '{{WRAPPER}} .futurio-elementor-feed-title',
                ]
        );


        $this->add_control(
                'text_separator_color',
                [
                    'label' => __('Text Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'color: {{VALUE}}',
                    ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'text_border',
                    'placeholder' => '1px',
                    'default' => '1px',
                    'selector' => '{{WRAPPER}} .futurio-elementor-feed-title',
                    'separator' => 'before',
                ]
        );

        $this->add_control(
                'text_border_radius',
                [
                    'label' => __('Border Radius', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'text_box_shadow',
                    'selector' => '{{WRAPPER}} .futurio-elementor-feed-title',
                ]
        );

        $this->add_responsive_control(
                'text_text_padding',
                [
                    'label' => __('Padding', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
        );

        $this->add_responsive_control(
                'text_text_margin',
                [
                    'label' => __('Margin', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'comments_style',
                [
                    'label' => __('Comments', 'futurio-extra'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography',
                    'selector' => '{{WRAPPER}} a, {{WRAPPER}} .futurio-elementor-off-text',
                ]
        );

        $this->start_controls_tabs('title_tabs_title');

        $this->start_controls_tab(
                'title_tab_title_normal',
                [
                    'label' => __('Normal', 'futurio-extra'),
                ]
        );

        $this->add_responsive_control(
                'title_color',
                [
                    'label' => __('Comment Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a, {{WRAPPER}} .futurio-elementor-off-text' => 'color: {{VALUE}}',
                    ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'title_tab_title_hover',
                [
                    'label' => __('Hover', 'futurio-extra'),
                ]
        );

        $this->add_responsive_control(
                'title_color_hover',
                [
                    'label' => __('Comment Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a:hover, {{WRAPPER}} .futurio-elementor-off-text:hover' => 'color: {{VALUE}}',
                    ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'placeholder' => '1px',
                    'default' => '1px',
                    'selector' => '{{WRAPPER}} .futurio-elementor-comments a',
                    'separator' => 'before',
                ]
        );

        $this->add_control(
                'border_radius',
                [
                    'label' => __('Border Radius', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-comments a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );

        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'button_box_shadow',
                    'selector' => '{{WRAPPER}} .futurio-elementor-comments a',
                ]
        );

        $this->add_responsive_control(
                'text_padding',
                [
                    'label' => __('Padding', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-comments a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
        );

        $this->add_responsive_control(
                'text_margin',
                [
                    'label' => __('Margin', 'futurio-extra'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-comments a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
        );
        $this->end_controls_section();
    }

    /**
     * Render text editor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();

        $off_text = $settings['separator'];

        $this->add_render_attribute([
            'futurio-comments' => [
                'class' => 'futurio-elementor-comments',
            ],
            'futurio-comments-title' => [
                'class' => 'futurio-elementor-feed-title',
            ],
            'icon-align' => [
                'class' => [
                    'futurio-elementor-icon elementor-button-icon',
                    'futurio-elementor-icon elementor-align-icon-' . $settings['icon_align'],
                ],
            ],
            'text' => [
                'class' => 'futurio-elementor-icon elementor-button-text',
            ],
            'off-text' => [
                'class' => 'futurio-elementor-off-text',
            ],
        ]);

        if (is_home() || is_archive() || is_search()) {
            ?>
            <div <?php echo $this->get_render_attribute_string('futurio-comments'); ?>>
                <div <?php echo $this->get_render_attribute_string('futurio-comments-title'); ?>>
                    <?php if (!empty($settings['icon'])) : ?>
                        <span <?php echo $this->get_render_attribute_string('icon-align'); ?>>
                            <i class="<?php echo esc_attr($settings['icon']); ?>" aria-hidden="true"></i>
                        </span>
                    <?php endif; ?>
                    <span <?php echo $this->get_render_attribute_string('text'); ?>><?php echo wp_kses_post($settings['text']); ?></span>
                </div>
                <?php if (!comments_open()) { ?>
                    <span <?php echo $this->get_render_attribute_string('off-text'); ?>><?php echo esc_html__($off_text); ?></span>
                <?php } else { ?>
                    <a href="<?php the_permalink(); ?>#comments" rel="nofollow" title="<?php esc_attr_e('Comment on ', 'futurio-extra') . the_title_attribute(); ?>">
                        <?php echo absint(get_comments_number()); ?>
                    </a>
                <?php } ?>
            </div>
            <?php
        } else {
            ?>
            <div <?php echo $this->get_render_attribute_string('futurio-comments'); ?>>
                <div <?php echo $this->get_render_attribute_string('futurio-comments-title'); ?>>
                    <?php if (!empty($settings['icon'])) : ?>
                        <span <?php echo $this->get_render_attribute_string('icon-align'); ?>>
                            <i class="<?php echo esc_attr($settings['icon']); ?>" aria-hidden="true"></i>
                        </span>
                    <?php endif; ?>
                    <span <?php echo $this->get_render_attribute_string('text'); ?>><?php echo wp_kses_post($settings['text']); ?></span>
                </div>

                <a href="<?php the_permalink(); ?>#comments" rel="nofollow" title="<?php esc_attr_e('Comment on ', 'futurio-extra') . the_title_attribute(); ?>">
                    <?php echo absint(2); ?>
                </a>

            </div>
            <?php
        }
    }

}
