<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SR_Frontend {
    public static function init() {
        add_shortcode( 'sr_form', [ __CLASS__, 'render_form' ] );
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
    }

    public static function render_form() {
        ob_start();
        require SR_PLUGIN_DIR . 'templates/frontend-form.php';
        return ob_get_clean();
    }

    public static function enqueue_scripts() {
        wp_enqueue_script( 'sr-frontend-scripts', SR_PLUGIN_URL . 'assets/js/frontend-scripts.js', [ 'jquery' ], '1.0', true );
        wp_enqueue_style( 'sr-frontend-style', SR_PLUGIN_URL . 'assets/css/frontend-style.css', [], '1.0' );
    }
}
