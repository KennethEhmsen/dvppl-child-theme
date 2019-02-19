<?php
/**
 * Global Headings Style
 */

if ( ! class_exists( 'Divi_Global_Headings_Style' ) ) {

	class Divi_Global_Headings_Style {

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
			add_action( 'customize_register', array( $this, 'dvppl_headings_customize_register' ) );
			add_action( 'wp_head', array($this, 'dvppl_headings_style'), 9999 );
			add_action( 'customize_preview_init', array( $this, 'preview_init' ), 99999 );
			add_action( 'admin_menu', array($this, 'dvppl_ghc_admin_link'), 99 );
		}

		public function dvppl_ghc_admin_link() {

			$home_url = esc_url( home_url() );

			$url = add_query_arg(
				array(
					'et_customizer_option_set' => 'theme',
					'autofocus[panel]' => 'dvppl-headings',
					'url' => rawurlencode( $home_url ),
				),

				admin_url( 'customize.php' )
			);

			add_submenu_page( 
				'et_divi_options', 
				esc_html__( 'Global Headings', 'dvppl-child-theme' ), 
				esc_html__( 'Global Headings', 'dvppl-child-theme' ), 
				'manage_options', 
				$url
			);
		}

		public function dvppl_headings_customize_register( $wp_customize ) {
			/**
			 * Panel
			 */
			$wp_customize->add_panel(
				'dvppl-headings', array(
					'priority' => 5,
					'title' => __( 'Global Headings (H1 - H6)', 'dvppl-child-theme' ),
				)
			);

			/**
			 * Sections
			 */
			$wp_customize->add_section(
				'dvppl-h1-section', array(
					'title'    => __( 'Heading( H1 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			$wp_customize->add_section(
				'dvppl-h2-section', array(
					'title'    => __( 'Heading( H2 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			$wp_customize->add_section(
				'dvppl-h3-section', array(
					'title'    => __( 'Heading( H3 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			$wp_customize->add_section(
				'dvppl-h4-section', array(
					'title'    => __( 'Heading( H4 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			$wp_customize->add_section(
				'dvppl-h5-section', array(
					'title'    => __( 'Heading( H5 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			$wp_customize->add_section(
				'dvppl-h6-section', array(
					'title'    => __( 'Heading( H6 )', 'dvppl-child-theme' ),
					'panel'    => 'dvppl-headings',
				)
			);

			/**
			 * Settings & Control for H1
			 */
			$wp_customize->add_setting( 'dvppl_h1_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h1_font_size', array(
				'label'	      => esc_html__( 'H1 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h1_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h1_line_height', array(
				'label'	      => esc_html__( 'H1 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h1_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h1_spacing', array(
				'label'	      => esc_html__( 'H1 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h1-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h1_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h1_style', array(
				'label'	      => esc_html__( 'H1 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h1-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h1_weight', array(
				'default'       => '500',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage'
			) );

			$wp_customize->add_control(
				'dvppl_h1_weight', array(
					'type'		=> 'select',
					'section'     => 'dvppl-h1-section',
					'label'		=> __( 'H1 Font Weight', 'dvppl-child-theme' ),
					'choices'	=> array(
						'100'	=> __( '100', 'dvppl-child-theme' ),
						'200'	=> __( '200', 'dvppl-child-theme' ),
						'300'	=> __( '300', 'dvppl-child-theme' ),
						'400'	=> __( '400', 'dvppl-child-theme' ),
						'500'	=> __( '500', 'dvppl-child-theme' ),
						'600'	=> __( '600', 'dvppl-child-theme' ),
						'700'	=> __( '700', 'dvppl-child-theme' ),
						'800'	=> __( '800', 'dvppl-child-theme' ),
						'900'	=> __( '900', 'dvppl-child-theme' )
					),
				)
			);

			$wp_customize->add_setting( 'dvppl_h1_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h1_color', array(
				'label'		=> esc_html__( 'H1 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h1-section',
				'settings'	=> 'dvppl_h1_color',
			) ) );

			/**
			 * Settings & Control for H2
			 */
			$wp_customize->add_setting( 'dvppl_h2_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h2_font_size', array(
				'label'	      => esc_html__( 'H2 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h2_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h2_line_height', array(
				'label'	      => esc_html__( 'H2 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h2_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h2_spacing', array(
				'label'	      => esc_html__( 'H2 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h2-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h2_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h2_style', array(
				'label'	      => esc_html__( 'H2 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h2-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h2_weight', array(
				'default'       => '500',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage'
			) );

			$wp_customize->add_control(
				'dvppl_h2_weight', array(
					'type'		=> 'select',
					'section'     => 'dvppl-h2-section',
					'label'		=> __( 'H2 Font Weight', 'dvppl-child-theme' ),
					'choices'	=> array(
						'100'	=> __( '100', 'dvppl-child-theme' ),
						'200'	=> __( '200', 'dvppl-child-theme' ),
						'300'	=> __( '300', 'dvppl-child-theme' ),
						'400'	=> __( '400', 'dvppl-child-theme' ),
						'500'	=> __( '500', 'dvppl-child-theme' ),
						'600'	=> __( '600', 'dvppl-child-theme' ),
						'700'	=> __( '700', 'dvppl-child-theme' ),
						'800'	=> __( '800', 'dvppl-child-theme' ),
						'900'	=> __( '900', 'dvppl-child-theme' )
					),
				)
			);

			$wp_customize->add_setting( 'dvppl_h2_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h2_color', array(
				'label'		=> esc_html__( 'H2 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h2-section',
				'settings'	=> 'dvppl_h2_color',
			) ) );

			/**
			 * Settings & Control for H3
			 */
			$wp_customize->add_setting( 'dvppl_h3_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h3_font_size', array(
				'label'	      => esc_html__( 'H3 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h3_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h3_line_height', array(
				'label'	      => esc_html__( 'H3 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h3_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h3_spacing', array(
				'label'	      => esc_html__( 'H3 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h3-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h3_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h3_style', array(
				'label'	      => esc_html__( 'H3 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h3-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h3_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'dvppl_h3_weight', array(
						'type'		=> 'select',
						'section'     => 'dvppl-h3-section',
						'label'		=> __( 'H3 Font Weight', 'dvppl-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'dvppl-child-theme' ),
							'200'	=> __( '200', 'dvppl-child-theme' ),
							'300'	=> __( '300', 'dvppl-child-theme' ),
							'400'	=> __( '400', 'dvppl-child-theme' ),
							'500'	=> __( '500', 'dvppl-child-theme' ),
							'600'	=> __( '600', 'dvppl-child-theme' ),
							'700'	=> __( '700', 'dvppl-child-theme' ),
							'800'	=> __( '800', 'dvppl-child-theme' ),
							'900'	=> __( '900', 'dvppl-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'dvppl_h3_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h3_color', array(
				'label'		=> esc_html__( 'H3 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h3-section',
				'settings'	=> 'dvppl_h3_color',
			) ) );

			/**
			 * Settings & Control for H4
			 */
			$wp_customize->add_setting( 'dvppl_h4_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h4_font_size', array(
				'label'	      => esc_html__( 'H4 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h4_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h4_line_height', array(
				'label'	      => esc_html__( 'H4 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h4_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h4_spacing', array(
				'label'	      => esc_html__( 'H4 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h4-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h4_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h4_style', array(
				'label'	      => esc_html__( 'H4 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h4-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h4_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'dvppl_h4_weight', array(
						'type'		=> 'select',
						'section'     => 'dvppl-h4-section',
						'label'		=> __( 'H4 Font Weight', 'dvppl-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'dvppl-child-theme' ),
							'200'	=> __( '200', 'dvppl-child-theme' ),
							'300'	=> __( '300', 'dvppl-child-theme' ),
							'400'	=> __( '400', 'dvppl-child-theme' ),
							'500'	=> __( '500', 'dvppl-child-theme' ),
							'600'	=> __( '600', 'dvppl-child-theme' ),
							'700'	=> __( '700', 'dvppl-child-theme' ),
							'800'	=> __( '800', 'dvppl-child-theme' ),
							'900'	=> __( '900', 'dvppl-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'dvppl_h4_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h4_color', array(
				'label'		=> esc_html__( 'H4 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h4-section',
				'settings'	=> 'dvppl_h4_color',
			) ) );

			/**
			 * Settings & Control for H5
			 */
			$wp_customize->add_setting( 'dvppl_h5_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h5_font_size', array(
				'label'	      => esc_html__( 'H5 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h5_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h5_line_height', array(
				'label'	      => esc_html__( 'H5 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h5_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h5_spacing', array(
				'label'	      => esc_html__( 'H5 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h5-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h5_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h5_style', array(
				'label'	      => esc_html__( 'H5 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h5-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h5_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'dvppl_h5_weight', array(
						'type'		=> 'select',
						'section'     => 'dvppl-h5-section',
						'label'		=> __( 'H5 Font Weight', 'dvppl-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'dvppl-child-theme' ),
							'200'	=> __( '200', 'dvppl-child-theme' ),
							'300'	=> __( '300', 'dvppl-child-theme' ),
							'400'	=> __( '400', 'dvppl-child-theme' ),
							'500'	=> __( '500', 'dvppl-child-theme' ),
							'600'	=> __( '600', 'dvppl-child-theme' ),
							'700'	=> __( '700', 'dvppl-child-theme' ),
							'800'	=> __( '800', 'dvppl-child-theme' ),
							'900'	=> __( '900', 'dvppl-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'dvppl_h5_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h5_color', array(
				'label'		=> esc_html__( 'H5 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h5-section',
				'settings'	=> 'dvppl_h5_color',
			) ) );

			/**
			 * Settings & Control for H6
			 */
			$wp_customize->add_setting( 'dvppl_h6_font_size', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'absint',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h6_font_size', array(
				'label'	      => esc_html__( 'H6 Text Size', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 72,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h6_line_height', array(
				'default'       => '1',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_float_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h6_line_height', array(
				'label'	      => esc_html__( 'H6 Line Height', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 0.8,
					'max'  => 3,
					'step' => 0.1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h6_spacing', array(
				'default'       => '0',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_int_number',
			) );

			$wp_customize->add_control( new Et_Divi_Range_Option ( $wp_customize, 'dvppl_h6_spacing', array(
				'label'	      => esc_html__( 'H6 Letter Spacing', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h6-section',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => -2,
					'max'  => 10,
					'step' => 1
				),
			) ) );

			$wp_customize->add_setting( 'dvppl_h6_style', array(
				'default'       => '',
				'type'          => 'option',
				'capability'    => 'edit_theme_options',
				'transport'     => 'postMessage',
				'sanitize_callback' => 'et_sanitize_font_style',
			) );

			$wp_customize->add_control( new Et_Divi_Font_Style_Option ( $wp_customize, 'dvppl_h6_style', array(
				'label'	      => esc_html__( 'H6 Font Style', 'dvppl-child-theme' ),
				'section'     => 'dvppl-h6-section',
				'type'        => 'font_style',
				'choices'     => et_divi_font_style_choices(),
			) ) );

			$wp_customize->add_setting( 'dvppl_h6_weight', array(
					'default'       => '500',
					'type'          => 'option',
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage'
				) );

				$wp_customize->add_control(
					'dvppl_h6_weight', array(
						'type'		=> 'select',
						'section'     => 'dvppl-h6-section',
						'label'		=> __( 'H6 Font Weight', 'dvppl-child-theme' ),
						'choices'	=> array(
							'100'	=> __( '100', 'dvppl-child-theme' ),
							'200'	=> __( '200', 'dvppl-child-theme' ),
							'300'	=> __( '300', 'dvppl-child-theme' ),
							'400'	=> __( '400', 'dvppl-child-theme' ),
							'500'	=> __( '500', 'dvppl-child-theme' ),
							'600'	=> __( '600', 'dvppl-child-theme' ),
							'700'	=> __( '700', 'dvppl-child-theme' ),
							'800'	=> __( '800', 'dvppl-child-theme' ),
							'900'	=> __( '900', 'dvppl-child-theme' )
						),
					)
				);

			$wp_customize->add_setting( 'dvppl_h6_color', array(
				'default'		=> '#666666',
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'transport'		=> 'postMessage',
				'sanitize_callback' => 'et_sanitize_alpha_color',
			) );

			$wp_customize->add_control( new Et_Divi_Customize_Color_Alpha_Control( $wp_customize, 'dvppl_h6_color', array(
				'label'		=> esc_html__( 'H6 Text Color', 'dvppl-child-theme' ),
				'section'	=> 'dvppl-h6-section',
				'settings'	=> 'dvppl_h6_color',
			) ) );

		}

		public function dvppl_headings_style() {
			
			/**
			 * H1
			 */
			$dvppl_h1_font_size 	 =   get_option('dvppl_h1_font_size');
			$dvppl_h1_line_height  =   get_option('dvppl_h1_line_height');
			$dvppl_h1_spacing 		 =   get_option('dvppl_h1_spacing');

			$dvppl_h1_style 			 =   get_option('dvppl_h1_style');
			$dvppl_h1_style 	 		 =   explode("|", $dvppl_h1_style );

			if ( ! isset( $dvppl_h1_style[0] )) {
				$dvppl_h1_style[0] = null;
			}

			if ( ! isset( $dvppl_h1_style[1] )) {
				$dvppl_h1_style[1] = null;
			}

			if ( ! isset( $dvppl_h1_style[2] )) {
				$dvppl_h1_style[2] = null;
			}

			if ( ! isset( $dvppl_h1_style[3] )) {
				$dvppl_h1_style[3] = null;
			}

			$dvppl_h1_weight 			 =   get_option('dvppl_h1_weight');
			$dvppl_h1_color 			 =   get_option('dvppl_h1_color');
			
			/**
			 * H2
			 */
			$dvppl_h2_font_size 	 =   get_option('dvppl_h2_font_size');
			$dvppl_h2_line_height  =   get_option('dvppl_h2_line_height');
			$dvppl_h2_spacing 		 =   get_option('dvppl_h2_spacing');

			$dvppl_h2_style 			 =   get_option('dvppl_h2_style');
			$dvppl_h2_style 	 		 =   explode("|", $dvppl_h2_style );

			if ( ! isset( $dvppl_h2_style[0] )) {
				$dvppl_h2_style[0] = null;
			}

			if ( ! isset( $dvppl_h2_style[1] )) {
				$dvppl_h2_style[1] = null;
			}

			if ( ! isset( $dvppl_h2_style[2] )) {
				$dvppl_h2_style[2] = null;
			}

			if ( ! isset( $dvppl_h2_style[3] )) {
				$dvppl_h2_style[3] = null;
			}

			$dvppl_h2_weight 			 =   get_option('dvppl_h2_weight');
			$dvppl_h2_color 			 =   get_option('dvppl_h2_color');
			
			/**
			 * H3
			 */
			$dvppl_h3_font_size 	 =   get_option('dvppl_h3_font_size');
			$dvppl_h3_line_height  =   get_option('dvppl_h3_line_height');
			$dvppl_h3_spacing 		 =   get_option('dvppl_h3_spacing');

			$dvppl_h3_style 			 =   get_option('dvppl_h3_style');
			$dvppl_h3_style 	 		 =   explode("|", $dvppl_h3_style );

			if ( ! isset( $dvppl_h3_style[0] )) {
				$dvppl_h3_style[0] = null;
			}

			if ( ! isset( $dvppl_h3_style[1] )) {
				$dvppl_h3_style[1] = null;
			}

			if ( ! isset( $dvppl_h3_style[2] )) {
				$dvppl_h3_style[2] = null;
			}

			if ( ! isset( $dvppl_h3_style[3] )) {
				$dvppl_h3_style[3] = null;
			}

			$dvppl_h3_weight 			 =   get_option('dvppl_h3_weight');
			$dvppl_h3_color 			 =   get_option('dvppl_h3_color');

			/**
			 * H4
			 */
			$dvppl_h4_font_size 	 =   get_option('dvppl_h4_font_size');
			$dvppl_h4_line_height  =   get_option('dvppl_h4_line_height');
			$dvppl_h4_spacing 		 =   get_option('dvppl_h4_spacing');

			$dvppl_h4_style 			 =   get_option('dvppl_h4_style');
			$dvppl_h4_style 	 		 =   explode("|", $dvppl_h4_style );

			if ( ! isset( $dvppl_h4_style[0] )) {
				$dvppl_h4_style[0] = null;
			}

			if ( ! isset( $dvppl_h4_style[1] )) {
				$dvppl_h4_style[1] = null;
			}

			if ( ! isset( $dvppl_h4_style[2] )) {
				$dvppl_h4_style[2] = null;
			}

			if ( ! isset( $dvppl_h4_style[3] )) {
				$dvppl_h4_style[3] = null;
			}

			$dvppl_h4_weight 			 =   get_option('dvppl_h4_weight');
			$dvppl_h4_color 			 =   get_option('dvppl_h4_color');

			/**
			 * H5
			 */
			$dvppl_h5_font_size 	 =   get_option('dvppl_h5_font_size');
			$dvppl_h5_line_height  =   get_option('dvppl_h5_line_height');
			$dvppl_h5_spacing 		 =   get_option('dvppl_h5_spacing');

			$dvppl_h5_style 			 =   get_option('dvppl_h5_style');
			$dvppl_h5_style 	 		 =   explode("|", $dvppl_h5_style );

			if ( ! isset( $dvppl_h5_style[0] )) {
				$dvppl_h5_style[0] = null;
			}

			if ( ! isset( $dvppl_h5_style[1] )) {
				$dvppl_h5_style[1] = null;
			}

			if ( ! isset( $dvppl_h5_style[2] )) {
				$dvppl_h5_style[2] = null;
			}

			if ( ! isset( $dvppl_h5_style[3] )) {
				$dvppl_h5_style[3] = null;
			}

			$dvppl_h5_weight 			 =   get_option('dvppl_h5_weight');
			$dvppl_h5_color 			 =   get_option('dvppl_h5_color');

			/**
			 * H6
			 */
			$dvppl_h6_font_size 	 =   get_option('dvppl_h6_font_size');
			$dvppl_h6_line_height  =   get_option('dvppl_h6_line_height');
			$dvppl_h6_spacing 		 =   get_option('dvppl_h6_spacing');

			$dvppl_h6_style 			 =   get_option('dvppl_h6_style');
			$dvppl_h6_style 	 		 =   explode("|", $dvppl_h6_style );

			if ( ! isset( $dvppl_h6_style[0] )) {
				$dvppl_h6_style[0] = null;
			}

			if ( ! isset( $dvppl_h6_style[1] )) {
				$dvppl_h6_style[1] = null;
			}

			if ( ! isset( $dvppl_h6_style[2] )) {
				$dvppl_h6_style[2] = null;
			}

			if ( ! isset( $dvppl_h6_style[3] )) {
				$dvppl_h6_style[3] = null;
			}

			$dvppl_h6_weight 			 =   get_option('dvppl_h6_weight');
			$dvppl_h6_color 			 =   get_option('dvppl_h6_color');

		?>

			<style type="text/css">

				h1 {
					<?php if( !empty( $dvppl_h1_font_size )) : ?>
					font-size: <?php echo $dvppl_h1_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h1_line_height )) : ?>
					line-height: <?php echo $dvppl_h1_line_height; ?>em !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h1_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h1_spacing; ?>px !important;
					<?php endif; ?>

					<?php foreach( $dvppl_h1_style as $h1_style ) : ?>
					
						<?php if( $h1_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h1_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h1_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h1_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>

					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h1_weight )) : ?>
					font-weight: <?php echo $dvppl_h1_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h1_color )) : ?>
					color: <?php echo $dvppl_h1_color; ?> !important;
					<?php endif; ?>

				}

				h2 {
					<?php if( !empty( $dvppl_h2_font_size )) : ?>
					font-size: <?php echo $dvppl_h2_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h2_line_height )) : ?>
					line-height: <?php echo $dvppl_h2_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h2_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h2_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $dvppl_h2_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h2_weight )) : ?>
					font-weight: <?php echo $dvppl_h2_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h2_color )) : ?>
					color: <?php echo $dvppl_h2_color; ?> !important;
					<?php endif; ?>
				}

				h3 {
					<?php if( !empty( $dvppl_h3_font_size )) : ?>
					font-size: <?php echo $dvppl_h3_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h3_line_height )) : ?>
					line-height: <?php echo $dvppl_h3_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h3_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h3_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $dvppl_h3_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h3_weight )) : ?>
					font-weight: <?php echo $dvppl_h3_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h3_color )) : ?>
					color: <?php echo $dvppl_h3_color; ?> !important;
					<?php endif; ?>
				}
				
				h4 {
					<?php if( !empty( $dvppl_h4_font_size )) : ?>
					font-size: <?php echo $dvppl_h4_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h4_line_height )) : ?>
					line-height: <?php echo $dvppl_h4_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h4_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h4_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $dvppl_h4_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h4_weight )) : ?>
					font-weight: <?php echo $dvppl_h4_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h4_color )) : ?>
					color: <?php echo $dvppl_h4_color; ?> !important;
					<?php endif; ?>
				}

				h5 {
					<?php if( !empty( $dvppl_h5_font_size )) : ?>
					font-size: <?php echo $dvppl_h5_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h5_line_height )) : ?>
					line-height: <?php echo $dvppl_h5_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h5_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h5_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $dvppl_h5_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h5_weight )) : ?>
					font-weight: <?php echo $dvppl_h5_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h5_color )) : ?>
					color: <?php echo $dvppl_h5_color; ?> !important;
					<?php endif; ?>
				}

				h6 {
					<?php if( !empty( $dvppl_h6_font_size )) : ?>
					font-size: <?php echo $dvppl_h6_font_size; ?>px !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h6_line_height )) : ?>
					line-height: <?php echo $dvppl_h6_line_height; ?>em!important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h6_spacing )) : ?>
					letter-spacing: <?php echo $dvppl_h6_spacing; ?> !important;
					<?php endif; ?>
					
					<?php foreach( $dvppl_h6_style as $h2_style ) : ?>
						<?php if( $h2_style == 'bold' ) : ?>
						<?php endif; ?>

						<?php if( $h2_style == 'italic' ) : ?>
						font-style: italic !important;
						<?php endif; ?>

						<?php if( $h2_style == 'uppercase' ) : ?>
						text-transform: uppercase !important;
						<?php endif; ?>

						<?php if( $h2_style == 'underline' ) : ?>
						text-decoration: underline !important;
						<?php endif; ?>
					<?php endforeach; ?>

					<?php if( !empty( $dvppl_h6_weight )) : ?>
					font-weight: <?php echo $dvppl_h6_weight; ?> !important;
					<?php endif; ?>

					<?php if( !empty( $dvppl_h6_color )) : ?>
					color: <?php echo $dvppl_h6_color; ?> !important;
					<?php endif; ?>
				}
				
			</style>

		<?php	}

		public function preview_init() {
			wp_enqueue_script( 
				'dvppl-headings-customizer-preview-js', 
				get_stylesheet_directory_uri() . '/js/headings-customizer-preview.js', 
				array( 'customize-preview' ),
				'1.0.0', 
				null
			);
		}

	}

	Divi_Global_Headings_Style::get_instance();

}