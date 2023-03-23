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
        if (is_user_logged_in()) {
            if (current_user_can('edit_posts')) {
                new Auth();
            }
        }
    }
}
