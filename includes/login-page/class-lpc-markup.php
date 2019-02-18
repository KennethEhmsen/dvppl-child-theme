<?php 
/**
 * Divi Hooks Markup
 */

if ( ! class_exists( 'IPC_Markup' ) ) {

	class IPC_Markup {

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
			add_action( 'login_enqueue_scripts', array($this, 'dvppl_lpc_style'), 99999);
		}

		public function dvppl_lpc_style() {
			$lpc_logo_url = get_option('dvppl_login_page_logo');
			$lpc_logo_width = get_option('dvppl_login_logo_width');
			$lpc_logo_height = get_option('dvppl_login_logo_height');
			$lpc_logo_padding = get_option('dvppl_login_logo_bottom_padding');

			$lpc_bg_img = get_option('dvppl_login_page_bg_img');
			$lpc_bg_color = get_option('dvppl_login_page_bg_color');
			$lpc_bg_size = get_option('dvppl_login_page_bg_size');

			$lpc_form_width = get_option('dvppl_login_page_form_width');
			$lpc_form_bg_img = get_option('dvppl_login_page_form_bg_img');
			$lpc_form_bg_color = get_option('dvppl_login_page_form_bg_color');
			$lpc_form_height = get_option('dvppl_login_page_form_height');
			$lpc_form_padding = get_option('dvppl_login_page_form_padding');

			$lpc_form_input_bg = get_option('dvppl_login_page_form_input_bg');
			$lpc_form_input_color = get_option('dvppl_login_page_form_input_color');
			$lpc_form_input_height = get_option('dvppl_login_page_form_input_height');
			$lpc_form_input_margin = get_option('dvppl_login_page_form_input_margin');

			$lpc_form_label_color = get_option('dvppl_login_page_form_label_color');

			$lpc_button_bg = get_option('dvppl_login_page_button_bg');
			$lpc_button_color = get_option('dvppl_login_page_button_color');
			$lpc_border_color = get_option('dvppl_login_page_button_border_color');
			$lpc_box_shadow_color = get_option('dvppl_login_page_button_box_shadow_color');

		?>

		<style type="text/css">

			body.login {

				<?php if( !empty( $lpc_bg_img )) : ?>
					background-image: url(<?php echo $lpc_bg_img; ?>) !important; 
				<?php endif; ?>

				<?php if( !empty( $lpc_bg_color )) : ?>
    			background-color: <?php echo $lpc_bg_color ?> !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_bg_size )) : ?>
   				background-size: <?php echo $lpc_bg_size ?>px !important;
				<?php endif; ?>

    	}

			body.login #login h1 a {

				<?php if( !empty( $lpc_logo_url )) : ?>
					background-image: url(<?php echo $lpc_logo_url; ?>) !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_logo_width ) ) : ?>
					width: <?php echo $lpc_logo_width; ?>px !important;
   				background-size: <?php echo $lpc_logo_width; ?>px !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_logo_height ) ) : ?>
					height: <?php echo $lpc_logo_height; ?>px !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_logo_padding ) ) : ?>
					padding: <?php echo $lpc_logo_padding; ?>px !important;
				<?php endif; ?>

			}

			#login {
				<?php if( !empty( $lpc_form_width )) : ?>
    			width: <?php echo $lpc_form_width; ?>px !important;
				<?php endif; ?>
			}

			#loginform {

				<?php if( !empty( $lpc_form_bg_img )) : ?>
					background-image: url(<?php echo $lpc_form_bg_img; ?>) !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_bg_color )) : ?>
					background-color: <?php echo $lpc_form_bg_color; ?> !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_height )) : ?>
					height: <?php echo $lpc_form_height; ?>px !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_padding )) : ?>
					padding: <?php echo $lpc_form_padding; ?>px !important;
				<?php endif; ?>

			}

			.login form .input,
			.login input[type="text"] {

				<?php if( !empty( $lpc_form_input_bg )) : ?>
				 background: <?php echo $lpc_form_input_bg; ?> !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_input_color )) : ?>
				 color: <?php echo $lpc_form_input_color; ?> !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_input_height )) : ?>
				 height: <?php echo $lpc_form_input_height; ?>px !important;
				<?php endif; ?>

				<?php if( !empty( $lpc_form_input_margin )) : ?>
				 margin: <?php echo $lpc_form_input_margin; ?>px !important;
				<?php endif; ?>

			}

			.login label {
				<?php if( !empty( $lpc_form_label_color )) : ?>
			  	color: <?php echo $lpc_form_label_color; ?> !important;
				<?php endif; ?>
			}
			
			.wp-core-ui .button-primary {

				<?php if( !empty(  $lpc_button_bg )) : ?>
					background: <?php echo $lpc_button_bg; ?> !important;
				<?php endif; ?>

				<?php if( !empty(  $lpc_border_color )) : ?>
    			border-color: <?php echo lpc_border_color; ?> !important;
				<?php endif; ?>

				<?php if( !empty(  $lpc_border_color )) : ?>
    			box-shadow: 0px 1px 0px <?php echo $lpc_border_color; ?> inset, 0px 1px 0px rgba(0, 0, 0, 0.15);
				<?php endif; ?>

				<?php if( !empty(  $lpc_button_color )) : ?>
    			color: <?php echo $lpc_button_color ?> !important;
				<?php endif; ?>

			}

		</style>

		<?php }
	}

	IPC_Markup::get_instance();
}