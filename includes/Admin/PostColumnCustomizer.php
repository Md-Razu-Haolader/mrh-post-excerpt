<?php

declare(strict_types=1);

namespace MRH\PostExcerpt\Admin;

class PostColumnCustomizer
{

    public function __construct()
    {
        add_filter('manage_post_posts_columns', [$this, 'add_total_view_column']);
        add_filter('manage_post_posts_custom_column', [$this, 'show_total_view'], 10, 2);
    }

    /**
     * add total view column to post table
     *
     * @param array $columns
     * @return array
     */
    public function add_total_view_column(array $columns): array
    {
        $columns['total_view'] = __('Total view', 'total-post-view');
        return $columns;
    }

    /**
     * show total view count
     *
     * @param string $column
     * @param integer $post_id
     * @return void
     */
    public function show_total_view(string $column, int $post_id): void
    {
        if ($column === 'total_view') {
            echo (int) get_post_meta($post_id, MRHPE_VIEW_COUNT_KEY, true);
        }
    }
}
