<?php

namespace MRH\PostExcerpt;

use MRH\PostExcerpt\Frontend\Shortcode;
use MRH\PostExcerpt\Frontend\PostViewHandler;

class Frontend
{

    /**
     * Frontend class constructor
     */
    public function __construct()
    {
        new Shortcode();
        new PostViewHandler();
    }
}
