<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SR_Admin {
    public static function init() {
        add_action( 'admin_menu', [ __CLASS__, 'register_menu' ] );
    }

    public static function register_menu() {
        add_menu_page(
            __( 'Reservas', 'sistema-reservas' ),
            __( 'Reservas', 'sistema-reservas' ),
            'manage_options',
            'sr-reservas',
            [ __CLASS__, 'render_admin_page' ],
            'dashicons-calendar-alt',
            25
        );
    }

    public static function render_admin_page() {
        require SR_PLUGIN_DIR . 'templates/admin-list.php';
    }
}
