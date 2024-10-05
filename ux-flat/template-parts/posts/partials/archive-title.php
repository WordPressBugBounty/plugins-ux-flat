<?php
/**
 * Post archive title.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<header class="archive-page-header">
	<div class="row">
	<div class="large-12 col">
    <?php 
    $curcat = get_queried_object();
    $subcats = get_terms(array(
        'taxonomy' => 'category',
        'child_of' => $curcat->term_id,
    )); ?>
    <?php if ( get_theme_mod('uxf_cat_sub', 0) && is_category() && $subcats ) { ?>
    <ul class="header-nav header-nav-main nav nav-center">
    <li class="header-vertical-menu" role="navigation">
        <div class="header-vertical-menu__opener white" style="width: auto;">
            <h1 class="header-vertical-menu__title is-large uppercase mb-0"><?php echo single_cat_title( '', false ); ?></h1><button class="button icon is-link round mb-0"><?php echo get_flatsome_icon( 'icon-angle-down' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
        </div>
        <div class="header-vertical-menu__fly-out has-shadow">
            <div class="menu-left-menu-container">
                <ul id="menu-left-menu" class="ux-nav-vertical-menu nav-vertical-fly-out">
                <?php foreach ($subcats as $subcat) { ?>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-design-default"><a href="<?php echo esc_url(get_category_link($subcat->term_id)); ?>"  class="nav-top-link"><?php echo esc_html($subcat->name); ?></a></li>
                <?php } ?>
        </ul></div></div></li>
    </ul>
    <?php } else { ?>
	<h1 class="page-title is-large uppercase text-center">
		<?php
			if ( is_category() ) :
                // translators: %s is the category title
				printf( esc_html__( 'Category Archives: %s', 'flatsome' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
                // translators: %s is the tag title
				printf( esc_html__( 'Tag Archives: %s', 'flatsome' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_search() ) :
                // translators: %s is the search query
				printf( esc_html__( 'Search Results for: %s', 'flatsome' ), '<span>' . get_search_query() . '</span>' );

			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
                // translators: %s is the author name
				printf( esc_html__( 'Author Archives: %s', 'flatsome' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
                // translators: %s is the date
				printf( esc_html__( 'Daily Archives: %s', 'flatsome' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
                // translators: %s is the month and year
				printf( esc_html__( 'Monthly Archives: %s', 'flatsome' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
                // translators: %s is the year
				printf( esc_html__( 'Yearly Archives: %s', 'flatsome' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				esc_html__( 'Asides', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				esc_html__( 'Images', 'flatsome');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				esc_html__( 'Videos', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				esc_html__( 'Quotes', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				esc_html__( 'Links', 'flatsome' );

			else :
				'';

			endif;
		?>
	</h1>
    <?php } ?>
	<?php
        if ( get_theme_mod( 'uxf_meta_desc', 0 ) && get_theme_mod( 'blog_archive_title', 1 ) ) {
            if ( is_category() ) :
                $category_description = category_description();
                $category_rankmath = get_term_meta(get_queried_object_id(), 'rank_math_description', true);
                $category_yoast = get_term_meta(get_queried_object_id(), '_yoast_wpseo_category_desc', true);
                if ( ! empty( $category_rankmath) && $category_rankmath !== "%term_description%" ) {
                    $category_description = $category_rankmath;
                } elseif (! empty( $category_yoast) && $category_yoast !== "%term_description%" ) {
                    $category_description = $category_yoast;
                }
                if ( ! empty( $category_description ) ) :
                    echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                endif;
            elseif ( is_tag() ) :
                $tag_description = tag_description();
                if ( ! empty( $tag_description ) ) :
                    echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                endif;
            endif;
        }
	?>
	</div>
	</div>
</header>
