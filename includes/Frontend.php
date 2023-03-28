<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt;

use MRH\PostExcerpt\Frontend\PostViewHandler;
use MRH\PostExcerpt\Frontend\Shortcode;

class Frontend
{
    /**
     * Frontend class constructor.
     */
    public function __construct()
    {
        new Shortcode();
        new PostViewHandler();
    }
}
