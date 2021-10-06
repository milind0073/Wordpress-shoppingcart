<?php
/**
 * Get Pro Version section.
 *
 * @package consultera
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Consultera_Get_Pro_Section' ) ) {
	/**
	 * Create our get pro version section.
	 */
	class Consultera_Get_Pro_Section extends WP_Customize_Section {
		/**
		 * consultera pro section name
		 *
		 * @var $type consultera-pro-section
		 */
		public $type = 'consultera-pro-section';

		/**
		 * consultera get pro version url
		 *
		 * @var $pro_url
		 */
		public $pro_url = '';

		/**
		 * consultera get pro vertion text
		 *
		 * @var $pro_text
		 */
		public $pro_text = '';

		/**
		 * consultera get pro vertion id
		 *
		 * @var $id
		 */
		public $id = '';

		/**
		 * Json
		 *
		 * @return array()  json data
		 */
		public function json() {
			$json             = parent::json();
			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );
			$json['id']       = $this->id;

			return $json;
		}

		/**
		 * Render template
		 */
		protected function render_template() {
			?>
			<li id="accordion-section-{{ data.id }}" class="consultera-get-pro-version-accordion-section control-section-{{ data.type }} cannot-expand accordion-section">
				<h3 class="wp-ui-highlight"><a class="wp-ui-text-highlight" href="{{{ data.pro_url }}}" target="_blank">{{ data.pro_text }}</a></h3>
			</li>
			<?php
		}
	}
}

if ( ! function_exists( 'consultera_customizer_section_pro_static' ) ) {
	add_action( 'customize_controls_enqueue_scripts', 'consultera_customizer_section_pro_static' );
	/**
	 * Add JS/CSS for our controls
	 */
	function consultera_customizer_section_pro_static() {
		wp_enqueue_style(
			'consultera-pro-section-css',
			CONSULTERA_THEME_URI . 'inc/consultera-pro/css/get-pro-section.css',
			array(),
			CONSULTERA_THEME_VERSION
		);

		wp_enqueue_script(
			'consultera-pro-section-js',
			CONSULTERA_THEME_URI . 'inc/consultera-pro/js/get-pro-section.js',
			array( 'customize-controls' ),
			CONSULTERA_THEME_VERSION,
			true
		);
	}
}
