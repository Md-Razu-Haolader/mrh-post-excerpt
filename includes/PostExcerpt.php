<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt;

final class PostExcerpt {

    /**
     * Static class object.
     *
     * @var object
     */
    private static $instance;

    public const version = '1.0.0';

    /**
     * Private class constructor.
     */
    private function __construct() {
        $this->define_constants();
        $this->init_hooks();
    }

    /**
     * Private class cloner.
     */
    private function __clone() {
    }

    public static function instance(): PostExcerpt {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Defines the required constants.
     */
    public function define_constants(): void {
        define( 'MRHPE_VERSION', self::version );
        define( 'MRHPE_URL', plugins_url( '', MRHPE_FILE ) );
        define( 'MRHPE_ASSETS', MRHPE_URL . '/assets' );
        define( 'MRHPE_INCLUDES', MRHPE_PATH . '/includes' );
        define( 'MRHPE_VIEW_COUNT_KEY', 'mrhpe_post_views_count' );
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks(): void {
        register_activation_hook( __FILE__, [$this, 'activate'] );
        add_action( 'plugins_loaded', [$this, 'init_classes'] );
    }

    /**
     * Updates info on plugin activation.
     */
    public function activate(): void {
        $activator = new Activator();
        $activator->run();
    }

    /**
     * Initializes the necessary classes for the plugin.
     */
    public function init_classes(): void {
        new Assets();
        new Frontend();
        new Custom();

        if ( is_admin() ) {
            new Admin();
        }
    }
}
