<?php

if (!defined('ABSPATH')) die();

/**
 * Define Constants
 */
define( 'DIVI_CHILD_THEME_VERSION' , '1.0.0' );

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

/**
 *  Divi Hooks Init
 */
if ( ! function_exists( 'dvppl_hooks_init' ) ) {

  /**
   * Divi Hooks Init
   *
   * @since 1.0.0
   * @return void
   */
  function dvppl_hooks_init() {
     require_once dirname(__FILE__) . '/inc/hooks/class-divi-hooks.php';
  }

}

add_action( 'after_setup_theme', 'dvppl_hooks_init' );