<?php 
/**
 * Divi Hooks
 */

if ( ! class_exists( 'Divi_Hooks' ) ) {

	class Divi_Hooks {

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
			require_once dirname(__FILE__) . '/class-hooks-loader.php';
			require_once dirname(__FILE__) . '/class-hooks-markup.php';
		}

	}

	Divi_Hooks::get_instance();
}