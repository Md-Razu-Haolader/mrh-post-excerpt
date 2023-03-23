<?php

namespace MRH\PostExcerpt;

use MRH\PostExcerpt\Frontend\Shortcode;
use MRH\PostExcerpt\Frontend\PostViewHandler;

/**
 * Frontend handler class
 */
class Frontend
{

    /**
     * Frontend class constructor
     */
    function __construct()
    {
        new Shortcode();
        new PostViewHandler();
    }
}
