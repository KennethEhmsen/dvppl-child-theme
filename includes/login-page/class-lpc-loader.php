<?php 
/**
 * Login Page Customizer
 */

if ( ! class_exists( 'LPC_Loader' ) ) {

	class LPC_Loader {

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
			add_action( 'customize_register', array( $this, 'dvppl_customize_register' ) );
		}
		
		function dvppl_customize_register( $wp_customize ) {

			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'dvppl-panel-login-page', array(
					'priority' => 10,
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

	}

	LPC_Loader::get_instance();
}