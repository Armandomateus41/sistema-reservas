<?php
/**
 * Plugin Name: Sistema de Reservas Simples
 * Plugin URI: https://github.com/Armandomateus41/sistema-reservas
 * Description: Um plugin simples para gerenciar reservas em sites WordPress.
 * Version: 1.0.0
 * Author: Armando Mateus
 * Author URI: https://github.com/Armandomateus41
 * License: GPL2
 * Text Domain: sistema-reservas
 */

// Bloqueia acesso direto ao arquivo.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constantes do plugin.
define( 'SR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Inclui as classes principais.
require_once SR_PLUGIN_DIR . 'includes/class-sr-cadastro.php';
require_once SR_PLUGIN_DIR . 'includes/class-sr-frontend.php';
require_once SR_PLUGIN_DIR . 'includes/class-sr-admin.php';
require_once SR_PLUGIN_DIR . 'includes/class-sr-validator.php';

// Executa na ativação do plugin.
register_activation_hook( __FILE__, [ 'SR_Cadastro', 'create_table' ] );

// Inicializa as classes.
SR_Cadastro::init();
SR_Frontend::init();
SR_Admin::init();
