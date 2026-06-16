
<?php
/**
 * Plugin Name: WooCommerce Nouvel Arrivage
 * Plugin URI: https://github.com/sportmax64/nouvel_arrivage
 * Description: Affiche automatiquement un badge "Nouvel arrivage" sur les produits WooCommerce.
 * Version: 0.1.0
 * Author: Sportmax
 * Text Domain: wc-new-arrivals
 * Domain Path: /languages
 * Requires PHP: 8.1
 */

defined('ABSPATH') || exit;

define('WNA_VERSION', '0.1.0');
define('WNA_PLUGIN_FILE', __FILE__);
define('WNA_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WNA_PLUGIN_URL', plugin_dir_url(__FILE__));

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
*/

spl_autoload_register(
    static function (string $class): void {

        if (strpos($class, 'WNA\\') !== 0) {
            return;
        }

        $class = substr($class, 4);

        $file = WNA_PLUGIN_PATH
            . 'includes/'
            . str_replace('\\', DIRECTORY_SEPARATOR, $class)
            . '.php';

        if (file_exists($file)) {
            require_once $file;
        }

    }
);

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

add_action(
    'plugins_loaded',
    static function () {

        if (!class_exists('WooCommerce')) {

            add_action(
                'admin_notices',
                static function () {

                    ?>
                    <div class="notice notice-error">
                        <p>
                            WooCommerce Nouvel Arrivage nécessite WooCommerce.
                        </p>
                    </div>
                    <?php

                }
            );

            return;
        }

        WNA\Plugin::instance()->boot();

    }
);
