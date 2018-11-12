<?php
/*
 * Plugin Name:       Art Museum Companion
 * Plugin URI:        https://colorlib.com/wp/themes/artmuseum/
 * Description:       Art Museum Companion is a companion for Art Museum theme.
 * Version:           1.0
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       artmuseum-companion
 * Domain Path:       /languages
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'ARTMUSEUM_COMPANION_VERSION' ) ) {
    define( 'ARTMUSEUM_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_INC_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_INC_DIR_PATH', ARTMUSEUM_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_SW_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_SW_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_EW_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_EW_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_DEMO_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Art Museum' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Art Museum' == $is_parent->get( 'Name' ) ) ) {
    require_once ARTMUSEUM_COMPANION_DIR_PATH . 'artmuseum-init.php';
} else {

    add_action( 'admin_notices', 'artmuseum_companion_admin_notice', 99 );
    function artmuseum_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/artmuseum/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Art Museum Companion</strong> plugin you have to also install the %1$sArtmuseum Theme%2$s', 'artmuseum-companion' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
