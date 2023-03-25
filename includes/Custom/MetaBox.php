<?php

declare(strict_types=1);

namespace MRH\PostExcerpt\Custom;

class MetaBox
{

    private $post_excerpt_meta_key;

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add']);
        add_action('save_post', [$this, 'save']);
        $this->post_excerpt_meta_key = 'mrhpe-post-excerpt';
    }

    /**
     * Adds custom meta box
     *
     * @return void
     */
    public function add(): void
    {
        $screens = ['post', 'wporg_cpt'];
        foreach ($screens as $screen) {
            add_meta_box(
                'mrhpe_metabox',
                __('Post Excerpt', $this->post_excerpt_meta_key),
                [$this, 'render'],
                $screen
            );
        }
    }

    /**
     * Saves the meta box value in the database
     *
     * @param int $post_id
     * 
     * @return void
     */
    public function save(int $post_id): void
    {
        if (array_key_exists('mrhpe-metabox', $_POST)) {
            update_post_meta(
                $post_id,
                $this->post_excerpt_meta_key,
                wp_kses_post(esc_html($_POST['mrhpe-metabox']))
            );
        }
    }

    /**
     * Renders the HTML field
     *
     * @param object $post
     * 
     * @return void
     */
    public function render(object $post): void
    {
        $excerpt = get_post_meta($post->ID, $this->post_excerpt_meta_key, true);

?>
        <textarea name="mrhpe-metabox" id="mrhpe-metabox" class="mrhpe-metabox" cols="100" rows="10"><?php echo $excerpt; ?></textarea>
<?php
    }
}
