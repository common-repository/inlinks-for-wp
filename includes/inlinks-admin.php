<?php
/**
 * This is to register to handling admin 
 *
 * @package inlinks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Inlinks_Admin {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'admin_menu', array( $this, 'add_setting_page' ) );
        add_action( 'admin_enqueue_scripts', array($this,'enqueue_scripts') );
    }

    public function register_settings(){

        register_setting( 
            'inlinks_option_group', 
            'inlinks_project_id'
        );
        register_setting( 
            'inlinks_option_group', 
            'inlinks_tracking'
        );
    }

    public function add_setting_page()
    {

        add_options_page(
            __( 'Inlinks', 'inlinks' ),
            'Inlinks',
            'manage_options',
            'inlinks',
            array( $this, 'render_settings' )
        );
    }

    /**
     * Options page callback
     */
    public function render_settings()
    {
        include_once INLINKS_ABSPATH.'admin/views/options.php';
    }

    /**
     * Render scripts
     */
    public function enqueue_scripts(){

        wp_register_style( 'inlinks_css', INLINKS_URL . '/admin/css/main.css', false, '1.0' );
        wp_enqueue_style( 'inlinks_css' );
    }
}
new Inlinks_Admin();