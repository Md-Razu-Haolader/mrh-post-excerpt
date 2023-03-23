<?php

declare(strict_types=1);
/**
 * Plugin Name:       Post Excerpt
 * Plugin URI:        razu.cse129@gmail.com
 * Description:       A plugin to show post excerpt, view count of each post and shortcode for frontend functionality.
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      8.2
 * Author:            Md. Razu Haolader
 * Author URI:        https://www.linkedin.com/in/md-razu-haolader/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       posts-view
 * 
 * 
 * Copyright (c) 2020 Md. Razu Haolader (razu.cse129@gmail.com). All rights reserved.
 * 
 * This program is a free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see the License URI.
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

use MRH\PostExcerpt\PostExcerpt;

define('MRHPE_FILE', __FILE__);
define('MRHPE_PATH', __DIR__);
/**
 * Initializes the main plugin
 *
 * @return PostExcerpt
 */
function posts_view(): PostExcerpt
{
    return PostExcerpt::instance();
}

//kick off the plugin
posts_view();
