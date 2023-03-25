<?php

declare(strict_types=1);

namespace MRH\PostExcerpt;

/**
 * Auth handler class
 */
class Auth
{

    /**
     * Auth class constructor
     */
    public function __construct()
    {
        if ($this->has_user_edit_permission()) {
            new Auth\MetaBox();
        }
    }
    private function has_user_edit_permission(): bool
    {
        return is_user_logged_in() && current_user_can('edit_posts');
    }
}
