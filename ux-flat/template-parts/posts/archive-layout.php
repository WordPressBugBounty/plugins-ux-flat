<?php
/**
 * Category layout.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header();
$current_category = get_queried_object();
if ($current_category) {
    $layout = get_term_meta($current_category->term_id, 'layout', true);
} else {
    $layout = '';
}
?>
<div id="content" class="blog-wrapper blog-archive page-wrapper">
<?php
do_action('flatsome_before_blog');
?>
<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row align-center">
	<div class="large-12 col">
	<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'content'){ 
        get_template_part('template-parts/posts/featured-posts'); 
    } ?>
    <?php if (get_theme_mod('uxf_category_layout') && $layout) { ?>
        <?php get_template_part( 'template-parts/posts/archive', $layout ); ?>
    <?php } elseif (get_theme_mod('uxf_archive_layout')) { ?>
        <?php if ( have_posts() ) : ?>
            <div id="post-list">
                <?php
                $ids = array();
                while ( have_posts() ) : the_post();
                    array_push( $ids, get_the_ID() );
                endwhile; // end of the loop.
                $ids = implode( ',', $ids );
                ?>
                <?php
                    $uxf_blog_shortcode = get_theme_mod('uxf_blog_shortcode');
                    $uxf_post_shortcode = str_replace("]", " ids='{$ids}']", $uxf_blog_shortcode);
                    echo do_shortcode($uxf_post_shortcode);
                ?>

                <?php flatsome_posts_pagination(); ?>
            </div>
        <?php else : ?>

            <?php get_template_part( 'template-parts/posts/content', 'none' ); ?>

        <?php endif; ?>
    <?php } else { ?>
		<?php get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style_archive', '') ); ?>
    <?php } ?>
	</div>

</div>
<?php do_action('flatsome_after_blog'); ?>
</div>
<?php get_footer(); ?>

