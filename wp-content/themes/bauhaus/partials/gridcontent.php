<?php
$bauhaus_class = bauhaus_get_global_class();


$bauhaus_cat = 0;
$bauhaus_category = get_category( get_query_var( 'cat' ) );
if ( isset( $bauhaus_category->cat_ID ) ) {
	$bauhaus_cat = $bauhaus_category->cat_ID;
} else {
	$bauhaus_cat = 0;
}
 ?>
<div class="grid-item inspiration js-isotope-item js-grid-item">
    <div class="news-item">
        <?php if ( has_post_thumbnail() ) : ?>

        <img src="<?php the_post_thumbnail_url("bauhaus-image-370x370-croped"); ?>" alt="">
        <?php endif; ?>
        <div class="news-hover">
            <div class="hover-border"><div></div></div>
            <div class="content">
                <div class="time"><?php echo esc_html( get_the_date() ); ?></div>
                <h3 class="news-title"><?php the_title(); ?></h3>
                <p class="news-description"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></p>
            </div>

            <?php
            if ( strlen( get_theme_mod( 'bauhaus_blog_list_text' ) ) > 1 ): ?>
                <a class="read-more" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_theme_mod( 'bauhaus_blog_list_text' ) ); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>