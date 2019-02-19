<?php

if (!defined('ABSPATH')) die();

/**
 * Enqueue parent style
 */
if ( ! function_exists( 'dvppl_enqueue_parent_style' ) ) {
  function dvppl_enqueue_parent_style() {
    wp_enqueue_style( 
      'parent-style', 
      get_template_directory_uri() . '/style.css' 
    );
  }

}

add_action( 'wp_enqueue_scripts', 'dvppl_enqueue_parent_style', 99 );

/**
 * Enqueue parent style
 */
if ( ! function_exists( 'dvppl_enqueue_scripts' ) ) {

  function dvppl_enqueue_scripts() {
    wp_enqueue_style( 
      'dvppl-main', 
      get_stylesheet_directory_uri() . '/css/main.css' 
    );
    wp_enqueue_script( 
      'dvppl-main', 
      get_stylesheet_directory_uri() . '/js/main.js',
      array( 'jquery' ), 
      '1.0',
      true 
    );
  }

}

add_action( 'wp_enqueue_scripts', 'dvppl_enqueue_scripts', 999 );

function dvppl_theme_init() {
  /**
   * Remove Project Type
   */
  //unregister_project_type
  
}

add_action( 'init', 'dvppl_theme_init' );

/**
 * Load SVG Support file.
 */
require_once( get_stylesheet_directory(). '/includes/class-svg-mime-type.php' );

/**
 * Load Hooks file.
 */
require_once( get_stylesheet_directory(). '/includes/hooks/class-divi-hooks.php' );

/**
 * Load Login Page Customizer file.
 */
require_once( get_stylesheet_directory(). '/includes/class-login-page.php' );

/**
 * Load Headings Customizer file.
 */
require_once( get_stylesheet_directory(). '/includes/class-global-headings.php' );

