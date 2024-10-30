<?php

/**
 * Plugin Name: Inlinks for WP
 * Plugin URI: https://Inlinks.net/p/plugin
 * Description: Inlinks generates and injects Internal Links, based around topical linking. It also injects Content Schema automation and content optimization. Configure in Settings > Inlinks. Plugin site at https://inlinks.net/p/plugin.
 * Version: 1.6
 * Author: Inlinks
 * Author URI:  https://inlinks.net
 * Text Domain: inlinks
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


if ( ! defined( 'INLINKS_FILE' ) ) {
    define( 'INLINKS_FILE', __FILE__ );
}

// Define WC_PLUGIN_DIR.
if ( ! defined( 'INLINKS_ABSPATH' ) ) {
    define( 'INLINKS_ABSPATH', dirname( INLINKS_FILE ) . '/' );
}

// Define WC_PLUGIN_DIR.
if ( ! defined( 'INLINKS_URL' ) ) {
    define( 'INLINKS_URL', plugins_url('inlinks-for-wp').'/');
}

/**
 * Load dependencies.
 */

class Inlinks_WP {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->includes();
        $this->hooks();
        register_activation_hook( __FILE__, array($this,'on_activate') );
        add_filter( 'plugin_action_links_inlinks-for-wp/inlinks-for-wp.php', array($this,'settings_link') );
    }

    public function on_activate(){

        if ( get_option( 'inlinks_tracking' ) != 'no' ) {
            add_option( 'inlinks_tracking', 'yes' );
        }
    }
    

    public function settings_link($links){
        // Build and escape the URL.
        $url = esc_url( add_query_arg(
            'page',
            'inlinks',
            get_admin_url() . 'options-general.php'
        ) );
        // Create the link.
        $settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
        // Adds the link to the end of the array.
        $links = array_merge(
            array($settings_link),
            $links
        );
        return $links;
    }

    private function includes($value='')
    {
        if(is_admin())
        require_once INLINKS_ABSPATH.'includes/inlinks-admin.php';

    }

    private function hooks(){

        if(is_admin()) return;

        add_action( 'wp_enqueue_scripts', array($this,'frontend_scripts') );
        add_filter( 'script_loader_tag',  array($this,'make_script_async'), 10, 3 );

    }

    public function frontend_scripts(){

        $project_id = esc_html(get_option( 'inlinks_project_id'));

        if($project_id && get_option( 'inlinks_tracking') == 'yes'){
            
            $url = 'https://jscloud.net/x/'.$project_id.'/inlinks.js';
            wp_enqueue_script( 'inlinks-tracking',esc_url($url) );
        }

    }
   
    public function add_inlinks_schema(){

        global $wp;

        if(get_option( 'inlinks_project_id') && get_option( 'inlinks_tracking') == 'yes')
        {

            $current_url = home_url( add_query_arg( array(), $wp->request ) );
            $current_url = preg_replace( '/[^a-z0-9]/', '', $current_url );
            $project_id = esc_html(get_option( 'inlinks_project_id'));
            $json_url = 'https://jscloud.net/x/'.$project_id.'/'.$current_url.'.json';

            $data = ifw_remote_get( $json_url );

            if(!empty($data['error']))
                return false;

            $schema = '';

            if( ! empty( $data ) ) {

                foreach ($data as $key => $row) {

                    if($row['t'] == 's'){
                        $schema = $row['o'];
                    }
                }
            }

            ?><script type="application/ld+json" id="inlinks-schema-output"><?php echo $schema ?></script>
            <?php
        }
    }

    public function make_script_async( $tag, $handle, $src )
    {
        if ( 'inlinks-tracking' != $handle ) {
            return $tag;
        }
        return str_replace( '<script', '<script defer=""', $tag );
    }
}

new Inlinks_WP();





