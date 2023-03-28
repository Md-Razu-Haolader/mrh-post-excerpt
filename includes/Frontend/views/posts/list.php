<?php declare( strict_types=1 );

use MRH\PostExcerpt\Helpers\Common;

foreach ( $posts as $post ) {
    $view_count = Common::emphasize_text( (int) get_post_meta( $post->ID, MRHPE_VIEW_COUNT_KEY, true ), 'Views' );
    $excerpt = '';
    if ( in_array( $post->ID, $selected_post_ids, true ) ) {
        if ( has_excerpt( $post ) ) {
            $excerpt = get_the_excerpt( $post );
        } else {
            $excerpt = Common::custom_excerpt( $post, 200 );
        }
    }
    ?>
    <div class="mrhpe-box">
        <h2>
            <a class="mrhpe-a" href="<?php echo get_permalink( $post ); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $post->post_title; ?>
            </a>
        </h2>
        <span><?php echo $view_count; ?></span>
    </div>
    <p><?php echo $excerpt; ?></p>
    <hr>
<?php
}
