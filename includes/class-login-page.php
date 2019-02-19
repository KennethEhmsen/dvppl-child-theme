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
			add_action( 'customize_register', array( $this, 'dvppl_login_page_customize_register' ) );
			add_action( 'login_enqueue_scripts', array($this, 'dvppl_lpc_style'), 99999);
			add_filter( 'login_headerurl', array($this, 'dvppl_login_url' ) );
		}

		function dvppl_login_url() {
			return home_url(); 
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

		function dvppl_login_page_customize_register( $wp_customize ) {

			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'dvppl-panel-login-page', array(
					'priority' => 5,
					'title' => __( 'Login Page', 'dvppl-child-theme' ),
				)
			);

			/**
			 * Sections
			 */
			$wp_customize->add_section(
				'dvppl-login-page-logo-section', array(
					'title'    => __( 'Logo', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'dvppl-login-page-bg-section', array(
					'title'    => __( 'Background', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'dvppl-login-page-form-section', array(
					'title'    => __( 'Login Form', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-panel-login-page',
				)
			);

			$wp_customize->add_section(
				'dvppl-login-page-button-section', array(
					'title'    => __( 'Button', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-panel-login-page',
				)
			);

			/**
			 * Settings
			 */
			$wp_customize->add_setting( 'dvppl_login_page_logo', array(
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );
			
			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'dvppl_login_page_logo', 
					array(
						'label'		=> esc_html__( 'Upload a logo', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-logo-section',
            'settings'   => 'dvppl_login_page_logo',
           )
				)
			);

			$wp_customize->add_setting( 'dvppl_login_logo_width', array(
				'default'       => '84',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dvppl_login_logo_width', array(
				'label'	      => esc_html__( 'Logo Width', 'dvppl-child-theme' ),
				'section'			=> 'dvppl-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 950,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_logo_height', array(
				'default'       => '84',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dvppl_login_logo_height', array(
				'label'	      => esc_html__( 'Logo Height', 'dvppl-child-theme' ),
				'section'			=> 'dvppl-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 950,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_logo_bottom_padding', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'dvppl_login_logo_bottom_padding', array(
				'label'	      => esc_html__( 'Logo Buttom Padding', 'dvppl-child-theme' ),
				'section'			=> 'dvppl-login-page-logo-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 500,
					'step' => 1
				),
			) ) );
			
			/**
			 * Background
			 */
			$wp_customize->add_setting( 'dvppl_login_page_bg_img', array(
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );

			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'dvppl_login_page_bg_img', 
					array(
						'label'		=> esc_html__( 'Upload a Background Image', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-bg-section',
            'settings'   => 'dvppl_login_page_bg_img',
           )
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_bg_color', array(
				'default'       => '#fff',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_bg_color', 
					array(
						'label'		=> esc_html__( 'Background Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-bg-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_bg_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_bg_size', 
					array(
					'label'	      => esc_html__( 'Backgorund Size', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-bg-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
			) ) );

			/**
			 * Login Form
			 */
			$wp_customize->add_setting( 'dvppl_login_page_form_width', array(
				'default'       => '320',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_form_width', 
					array(
					'label'	      => esc_html__( 'Login Form Width', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 750,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_page_form_bg_img', array(
				'default'       => '',
        'type' => 'option',
				'capability'  => 'edit_theme_options'
			) );

			$wp_customize->add_control( 
				new WP_Customize_Image_Control(
					$wp_customize, 
					'dvppl_login_page_form_bg_img', 
					array(
						'label'		=> esc_html__( 'Upload a Background Image', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-form-section',
            'settings'   => 'dvppl_login_page_form_bg_img',
           )
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_form_bg_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_form_bg_color', 
					array(
						'label'		=> esc_html__( 'Background Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_form_height', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_form_height', 
					array(
					'label'	      => esc_html__( 'Login Form Height', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 450,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_page_form_padding', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_form_padding', 
					array(
					'label'	      => esc_html__( 'Login Form Padding', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1
					),
			) ) );

			/**
			 * Input box
			 */
			$wp_customize->add_setting( 'dvppl_login_page_form_input_bg', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_form_input_bg', 
					array(
						'label'		=> esc_html__( 'Input Background Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_form_input_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_form_input_color', 
					array(
						'label'		=> esc_html__( 'Input Text Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-form-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_form_input_height', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_form_input_height', 
					array(
					'label'	      => esc_html__( 'Input Height', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 250,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_page_form_input_margin', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( 
				new ET_Divi_Range_Option ( 
					$wp_customize, 
					'dvppl_login_page_form_input_margin', 
					array(
					'label'	      => esc_html__( 'Input Margin', 'dvppl-child-theme' ),
					'section'			=> 'dvppl-login-page-form-section',
					'type'        => 'range',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 250,
						'step' => 1
					),
			) ) );

			$wp_customize->add_setting( 'dvppl_login_page_form_label_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_form_label_color', 
					array(
						'label'		=> esc_html__( 'Label Text Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-form-section',
					)
				)
			);

			// Button 
			$wp_customize->add_setting( 'dvppl_login_page_button_bg', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_button_bg', 
					array(
						'label'		=> esc_html__( 'Button Backgorund', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_button_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_button_color', 
					array(
						'label'		=> esc_html__( 'Button Text Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_button_border_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control(
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_button_border_color', 
					array(
						'label'		=> esc_html__( 'Button Border Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-button-section',
					)
				)
			);

			$wp_customize->add_setting( 'dvppl_login_page_button_box_shadow_color', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
			) );

			$wp_customize->add_control( 
				new WP_Customize_Color_Control( 
					$wp_customize, 
					'dvppl_login_page_button_box_shadow_color', 
					array(
						'label'		=> esc_html__( 'Button Text Shadow Color', 'dvppl-child-theme' ),
						'section'	=> 'dvppl-login-page-button-section',
					)
				)
			); 
		}

		public function dvppl_lpc_style(){
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
						padding-bottom: <?php echo $lpc_logo_padding; ?>px !important;
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
			<?php
		}

	}

	Login_Page_Customizer::get_instance();
}