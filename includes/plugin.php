
<?php

namespace WNA;

defined('ABSPATH') || exit;

final class Plugin
{
    private static ?Plugin $instance = null;

    public static function instance(): Plugin
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    public function boot(): void
    {
        // Les modules seront enregistrés ici.

        // new Settings();
        // new Detector();
        // new Display();
        // new Admin();
    }
}
