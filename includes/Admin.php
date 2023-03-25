<?php

declare(strict_types=1);

namespace MRH\PostExcerpt;

use MRH\PostExcerpt\Auth;

use MRH\PostExcerpt\Admin\PostColumnCustomizer;

class Admin
{

    public function __construct()
    {
        new PostColumnCustomizer();
    }
}
