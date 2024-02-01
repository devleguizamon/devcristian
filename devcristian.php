<?php

/**
Plugin Name: Dev Cristian
Plugin URI: #
Description: Manejo del website DEV Cristian
Version: 1.0
Author: Cristian Leguizamón
Author URI:
License: GDCv2 or later
Text Domain: Devcristian
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if( !class_exists( 'DC_Setup' ) ) {
    final class DC_Setup{
        private static $instance;
        public static function instance() {
                if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DC_Setup ) ) {
                        self::$instance = new DC_Setup();
                }
                return self::$instance;
        }

        public function setup(){
                /** Cargar las constantes paara las rutas */
                $this->constants();

                /** Incluir los archivos principales */
                $this->includes();
                add_action( 'wp_enqueue_scripts', array($this,'add_scripts' ));
                
                // Model controller view instance
                //Class_Utils_DC()->configure();
        }
        public function add_scripts(){
            //Scripts
            /*
            wp_register_script('pl_main_js', str_replace( ABSPATH, '/', __DIR__ ).'/assets/js/pl_main.js',array('jquery'),false,true);
            wp_enqueue_script( 'pl_main_js');

            wp_localize_script( 'pl_main_js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
            */
            //CSS

            //Profile-payments
            /*
            if( is_page(8401) ){
                wp_enqueue_style('DC-profile-account', plugin_dir_url( __FILE__ ) . 'assets/css/payment-profile.css', array(), false, false);
            }
            */
        }
        protected function constants() {
                if ( ! defined( 'DC_THEME' ) ) {
                        define('DC_THEME', get_template_directory());
                }
                if ( ! defined( 'DC_VERSION' ) ) {
                        define('DC_VERSION', '4.0.0');
                }
                if ( ! defined( 'DC_DIR' ) ) {
                        define('DC_DIR', plugin_dir_path(__FILE__));
                }
                if ( ! defined( 'DC_INC' ) ) {
                        define('DC_INC', DC_DIR.'includes'.'/');
                }
                if ( ! defined( 'DC_ASSETS' ) ) {
                        define('DC_ASSETS', DC_DIR.'assets'.'/');
                }

                if ( ! defined( 'DC_TEMP' ) ) {
                        define('DC_TEMP', DC_DIR.'templates'.'/');
                }
                if ( ! defined( 'DC_URL' ) ) {
                        define('DC_URL', plugin_dir_url( __FILE__ ));
                }
                if ( ! defined( 'DC_ASSETS_URL' ) ) {
                        define('DC_ASSETS_URL', DC_URL.'assets'.'/');
                }
        }

        protected function includes() {
            //require_once(DC_DIR.'classes/Class_Utils_DC.php'); 
        }	
    }
}


function DEVCRIS() {
	return DC_Setup::instance();
}
DEVCRIS()->setup();
