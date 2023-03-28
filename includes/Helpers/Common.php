<?php

declare( strict_types=1 );

namespace MRH\PostExcerpt\Helpers;

class Common
{
    /**
     * Emphasize texts with <em> tag.
     *
     * @param mixed $value
     * @param mixed $extension
     */
    public static function emphasize_text( $value, $extension = null ): string
    {
        ob_start();

        ?>
        <em><?php echo "$value $extension"; ?></em>
<?php

                $result = ob_get_clean();

        return $result;
    }

    /**
     * makes custom post excerps from post.
     */
    public static function custom_excerpt( object $post, int $length = 200 ): string
    {
        if ( $post->post_excerpt !== '' ) {
            $excerpt = $post->post_excerpt;
        } else {
            $excerpt = strip_tags( $post->post_content );
        }

        if ( strlen( $excerpt ) > $length ) {
            $excerpt = substr( $excerpt, 0, $length );
            $excerpt .= ' . . .<a href="'.get_permalink( $post ).'"><em>continue reading</em></a>';
        }

        return $excerpt;
    }
}
