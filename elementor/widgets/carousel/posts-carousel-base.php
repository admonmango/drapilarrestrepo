<?php

namespace Maxcoach_Elementor;

use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

abstract class Posts_Carousel_Base extends Carousel_Base {

	/**
	 * @var \WP_Query
	 */
	private $_query      = null;
	private $_query_args = null;

	abstract protected function get_post_type();

	public function query_posts() {
		$settings          = $this->get_settings_for_display();
		$post_type         = $this->get_post_type();
		$this->_query      = Module_Query_Base::instance()->get_query( $settings, $post_type );
		$this->_query_args = Module_Query_Base::instance()->get_query_args();
	}

	protected function get_query() {
		return $this->_query;
	}

	protected function get_query_args() {
		return $this->_query_args;
	}

	protected function get_query_author_object() {
		return Module_Query_Base::QUERY_OBJECT_AUTHOR;
	}

	abstract protected function print_slide( array $settings );

	protected function _register_controls() {
		parent::_register_controls();

		$this->register_query_section();
	}

	protected function register_query_section() {
		$this->start_controls_section( 'query_section', [
			'label' => esc_html__( 'Query', 'maxcoach' ),
		] );

		$this->add_control( 'query_source', [
			'label'   => esc_html__( 'Source', 'maxcoach' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'custom_query'  => esc_html__( 'Custom Query', 'maxcoach' ),
				'current_query' => esc_html__( 'Current Query', 'maxcoach' ),
			),
			'default' => 'custom_query',
		] );

		$this->start_controls_tabs( 'query_args_tabs', [
			'condition' => [
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->start_controls_tab( 'query_include_tab', [
			'label' => esc_html__( 'Include', 'maxcoach' ),
		] );

		$this->add_control( 'query_include', [
			'label'       => esc_html__( 'Include By', 'maxcoach' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT2,
			'multiple'    => true,
			'options'     => [
				'terms'   => esc_html__( 'Term', 'maxcoach' ),
				'authors' => esc_html__( 'Author', 'maxcoach' ),
			],
			'condition'   => [
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_include_term_ids', [
			'type'         => Module_Query_Base::AUTOCOMPLETE_CONTROL_ID,
			'options'      => [],
			'label_block'  => true,
			'multiple'     => true,
			'autocomplete' => [
				'object'  => Module_Query_Base::QUERY_OBJECT_TAX,
				'display' => 'detailed',
				'query'   => [
					'post_type' => $this->get_post_type(),
				],
			],
			'condition'    => [
				'query_include' => 'terms',
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_include_authors', [
			'label'        => esc_html__( 'Author', 'maxcoach' ),
			'label_block'  => true,
			'type'         => Module_Query_Base::AUTOCOMPLETE_CONTROL_ID,
			'multiple'     => true,
			'default'      => [],
			'options'      => [],
			'autocomplete' => [
				'object' => $this->get_query_author_object(),
			],
			'condition'    => [
				'query_include' => 'authors',
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'query_exclude_tab', [
			'label' => esc_html__( 'Exclude', 'maxcoach' ),
		] );

		$this->add_control( 'query_exclude', [
			'label'       => esc_html__( 'Exclude By', 'maxcoach' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT2,
			'multiple'    => true,
			'options'     => [
				'terms'   => esc_html__( 'Term', 'maxcoach' ),
				'authors' => esc_html__( 'Author', 'maxcoach' ),
			],
			'condition'   => [
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_exclude_term_ids', [
			'type'         => Module_Query_Base::AUTOCOMPLETE_CONTROL_ID,
			'options'      => [],
			'label_block'  => true,
			'multiple'     => true,
			'autocomplete' => [
				'object'  => Module_Query_Base::QUERY_OBJECT_TAX,
				'display' => 'detailed',
				'query'   => [
					'post_type' => $this->get_post_type(),
				],
			],
			'condition'    => [
				'query_exclude' => 'terms',
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_exclude_authors', [
			'label'        => esc_html__( 'Author', 'maxcoach' ),
			'label_block'  => true,
			'type'         => Module_Query_Base::AUTOCOMPLETE_CONTROL_ID,
			'multiple'     => true,
			'default'      => [],
			'options'      => [],
			'autocomplete' => [
				'object' => $this->get_query_author_object(),
			],
			'condition'    => [
				'query_exclude' => 'authors',
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control( 'query_number', [
			'label'       => esc_html__( 'Items per page', 'maxcoach' ),
			'description' => esc_html__( 'Number of items to show per page. Input "-1" to show all posts. Leave blank to use global setting.', 'maxcoach' ),
			'type'        => Controls_Manager::NUMBER,
			'min'         => -1,
			'max'         => 100,
			'step'        => 1,
			'condition'   => [
				'query_source!' => [ 'current_query' ],
			],
			'separator'   => 'before',
		] );

		$this->add_control( 'query_orderby', [
			'label'       => esc_html__( 'Order by', 'maxcoach' ),
			'description' => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'maxcoach' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'date'           => esc_html__( 'Date', 'maxcoach' ),
				'ID'             => esc_html__( 'Post ID', 'maxcoach' ),
				'author'         => esc_html__( 'Author', 'maxcoach' ),
				'title'          => esc_html__( 'Title', 'maxcoach' ),
				'modified'       => esc_html__( 'Last modified date', 'maxcoach' ),
				'parent'         => esc_html__( 'Post/page parent ID', 'maxcoach' ),
				'comment_count'  => esc_html__( 'Number of comments', 'maxcoach' ),
				'menu_order'     => esc_html__( 'Menu order/Page Order', 'maxcoach' ),
				'meta_value'     => esc_html__( 'Meta value', 'maxcoach' ),
				'meta_value_num' => esc_html__( 'Meta value number', 'maxcoach' ),
				'rand'           => esc_html__( 'Random order', 'maxcoach' ),
			),
			'default'     => 'date',
			'condition'   => [
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_sort_meta_key', [
			'label'     => esc_html__( 'Meta key', 'maxcoach' ),
			'type'      => Controls_Manager::TEXT,
			'condition' => [
				'query_orderby' => [
					'meta_value',
					'meta_value_num',
				],
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->add_control( 'query_order', [
			'label'     => esc_html__( 'Sort order', 'maxcoach' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'DESC' => esc_html__( 'Descending', 'maxcoach' ),
				'ASC'  => esc_html__( 'Ascending', 'maxcoach' ),
			),
			'default'   => 'DESC',
			'condition' => [
				'query_source!' => [ 'current_query' ],
			],
		] );

		$this->end_controls_section();
	}

	protected function print_slides( array $settings ) {
		$settings = $this->get_settings_for_display();
		$this->query_posts();
		/**
		 * @var $query \WP_Query
		 */
		$query = $this->get_query();
		?>
		<?php if ( $query->have_posts() ) : ?>

			<?php $this->before_loop(); ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php $this->print_slide( $settings ); ?>
			<?php endwhile; ?>

			<?php $this->after_loop(); ?>

		<?php endif;
		wp_reset_postdata();
	}

	protected function before_loop() {
	}

	protected function after_loop() {
	}
}
