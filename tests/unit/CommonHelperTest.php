<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt\Tests;

use MRH\PostExcerpt\Helpers\Common as CommonHelper;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CommonHelperTest extends TestCase {

    private static $common_helper;

    public static function set_up_before_class(): void {
        static::$common_helper = new CommonHelper();
    }

    public function test_should_render_emphasize_text() {
        $text = static::$common_helper->emphasize_text( 'Hello, world' );
        $this->assertTrue( strpos( $text, '<em>' ) !== false );
    }
}
