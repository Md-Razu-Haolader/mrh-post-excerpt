<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt;

class Custom {

    public function __construct() {
        if ( $this->has_user_edit_permission() ) {
            new Custom\MetaBox();
        }
    }

    private function has_user_edit_permission(): bool {
        return is_user_logged_in() && current_user_can( 'edit_posts' );
    }
}
