<?php

declare(strict_types=1);

namespace MRH\PostExcerpt\Frontend;

use MRH\PostExcerpt\Helpers\Common;

class PostViewHandler
{
    private string $view_count_meta_key;
    public function __construct()
    {
        $this->view_count_meta_key = MRHPE_VIEW_COUNT_KEY;
        add_filter('emphasize_text', [Common::class, 'emphasize_text'], 10, 2);
        add_filter('wp_head', [$this, 'save_total_view_count']);
        add_filter('the_content', [$this, 'get_content_with_view_count']);
    }

    public function save_total_view_count(): int
    {
        global $post;
        $view_count = 0;
        if (is_single() && 'post' == $post->post_type) {
            $view_count = (int) get_post_meta($post->ID, $this->view_count_meta_key, true) + 1;
            update_post_meta($post->ID, $this->view_count_meta_key, $view_count);
        }
        return $view_count;
    }

    /**
     * Get the post content with view counts and wraps it with style
     *
     * @param string $content
     * @return string
     */
    public function get_content_with_view_count(string $content): string
    {
        global $post;
        $view_count = (int) get_post_meta($post->ID, $this->view_count_meta_key, true);
        $view_count_em = apply_filters('emphasize_text', $view_count, 'Views');

        ob_start();
?>
        <span class="mrhpe-span"><?php echo $view_count_em; ?></span>
<?php

        $post_content = ob_get_clean();
        return $content . $post_content;
    }
}
