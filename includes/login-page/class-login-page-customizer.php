<?php 
/**
 * Divi Hooks
 */

if ( ! class_exists( 'Login_Page_Customizer' ) ) {

	class Login_Page_Customizer {

		/**
		 * Member Varible
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'admin_menu', array($this, 'dvppl_lpc_admin_link'), 99 );
			require_once dirname(__FILE__) . '/class-lpc-loader.php';
			require_once dirname(__FILE__) . '/class-lpc-markup.php';
		}

		function dvppl_lpc_admin_link() {

			$login_url = esc_url( wp_login_url() );

			$url = add_query_arg(
				array(
					'et_customizer_option_set' => 'theme',
					'autofocus[panel]' => 'dvppl-panel-login-page',
					'url' => rawurlencode( $login_url ),
				),

				admin_url( 'customize.php' )
			);

			add_submenu_page( 
				'et_divi_options', 
				esc_html__( 'Login Customizer', 'dvppl-child-theme' ), 
				esc_html__( 'Login Customizer', 'dvppl-child-theme' ), 
				'manage_options', 
				$url
			);

		}

	}

	Login_Page_Customizer::get_instance();
}