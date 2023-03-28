<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt\Custom;

class MetaBox
{
    private $post_excerpt_meta_key;

    public function __construct()
    {
        add_action( 'add_meta_boxes', [$this, 'add'] );
        add_action( 'save_post', [$this, 'save'] );
        $this->post_excerpt_meta_key = 'mrhpe-post-excerpt';
    }

    /**
     * Adds custom meta box.
     */
    public function add(): void
    {
        $screens = ['post', 'wporg_cpt'];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'mrhpe_metabox',
                __( 'Post Excerpt', $this->post_excerpt_meta_key ),
                [$this, 'render'],
                $screen
            );
        }
    }

    /**
     * Saves the meta box value in the database.
     */
    public function save( int $post_id ): void
    {
        if ( isset( $_POST['mrhpe_metabox'] ) && !empty( $_POST['mrhpe_metabox'] ) ) {
            update_post_meta(
                $post_id,
                $this->post_excerpt_meta_key,
                wp_kses_post( esc_html( $_POST['mrhpe_metabox'] ) )
            );
        }
    }

    /**
     * Renders the HTML field.
     */
    public function render( object $post ): void
    {
        $excerpt = get_post_meta( $post->ID, $this->post_excerpt_meta_key, true );

        ?>
        <textarea name="mrhpe_metabox" id="mrhpe-metabox" class="mrhpe-metabox" cols="100" rows="10"><?php echo $excerpt; ?></textarea>
<?php
    }
}
