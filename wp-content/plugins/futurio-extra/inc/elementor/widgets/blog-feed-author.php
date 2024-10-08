<?php

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;

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
class Futurio_Extra_Blog_Feed_Author extends Widget_Base {

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
        return 'blog-author';
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
        return __('Post author', 'futurio-extra');
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
        return 'eicon-person';
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
                'section_author',
                [
                    'label' => __('Content', 'futurio-extra'),
                ]
        );
        $this->add_control(
                'text',
                [
                    'label' => __('Text before', 'futurio-extra'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Author:', 'futurio-extra'),
                    'placeholder' => __('Author:', 'futurio-extra'),
                ]
        );
        $this->add_control(
                'text_indent',
                [
                    'label' => __('Text Spacing', 'futurio-extra'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 50,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
        );
        $this->add_control(
                'icon',
                [
                    'label' => __('Icon', 'futurio-extra'),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-user-o',
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
                        '{{WRAPPER}} .futurio-elementor-author .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .futurio-elementor-author .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
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
                    'separator' => 'after',
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
                        '{{WRAPPER}} .futurio-elementor-author' => 'text-align: {{VALUE}};',
                    ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography',
                    'selector' => '{{WRAPPER}} .futurio-elementor-author a',
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
                    'label' => __('Author Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a' => 'color: {{VALUE}}',
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
                    'label' => __('Author Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
                    ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_responsive_control(
                'color_before_text',
                [
                    'label' => __('Text Color', 'futurio-extra'),
                    'type' => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .futurio-elementor-feed-title' => 'color: {{VALUE}}',
                    ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'selector' => '{{WRAPPER}} .futurio-elementor-feed-title',
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
        $this->add_render_attribute([
            'futurio-author' => [
                'class' => 'futurio-elementor-author',
            ],
            'futurio-author-title' => [
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
        ]);
        ?>
        <div <?php echo $this->get_render_attribute_string('futurio-author'); ?>>
            <div <?php echo $this->get_render_attribute_string('futurio-author-title'); ?>>
                <?php if (!empty($settings['icon'])) : ?>
                    <span <?php echo $this->get_render_attribute_string('icon-align'); ?>>
                        <i class="<?php echo esc_attr($settings['icon']); ?>" aria-hidden="true"></i>
                    </span>
                <?php endif; ?>
                <span <?php echo $this->get_render_attribute_string('text'); ?>><?php echo esc_html($settings['text']); ?></span>
            </div>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename'))); ?>">
                <?php the_author(); ?>
            </a>
        </div>
        <?php
    }

}
