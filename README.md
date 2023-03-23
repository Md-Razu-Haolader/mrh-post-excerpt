# WP Posts Excerpt Plugin

It's a **_Wordpress Plugin_** that includes post excerpt, total view count on each post and provides `shortcode` for frontend functionality. And also shows the total post view in admin panel.

## Shortcode

### `[mrhpe-view-posts]`

### Functionality

Shows 10 (by default) latest _post titles_ with their _view count_. There is a form given where user can choose the number of posts, category of posts, and whether the post will be ordered by their view counts in ascending or descending order.

An authorized user can also choose all these as well as the IDs of posts of which only the _excerpt_ will be shown by passing parameter through the **_shortcode_**.

### Parameters

- `numposts` _[int]_ : Determines the number of posts to be shown.
- `category` _[string]_ : Determines the category of posts to be shown. The values should be comma (,) seperated for multiple values and no inverted comma ('') is needed.
- `order` _[string]_ : If this parameter is given, the posts will be ordered in the given order by the total views. Only _ASC_ or _DESC_ is expected to be the value.
- `ids` _[int]_ : Determines the ids of the posts of which excerpts will be shown. If this parameter is not given, excerpt will not be shown for any post. The values should be comma (,) seperated for multiple values and no inverted comma is needed.

### Example

    [mrhpe-view-posts numposts=10 category=blog,book ids=1,2,3 order=DESC]
