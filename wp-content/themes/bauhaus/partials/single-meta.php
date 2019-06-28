

    <?php  if(has_tag()) {  ?>
    <div class="tags-links">
        <span><?php  esc_html_e('Tags:','bauhaus'); ?></span>
        <?php the_tags(); ?>
    </div>

    <?php } ?>




    
    <?php 	if ( get_theme_mod( 'bauhaus_single_post_settings_hide_soc', 's1' ) !== 's2' || get_theme_mod( 'bauhaus_single_post_settings_hide_soc', 's1' ) == 's1' ) { ?>
    
    <div class="post-share">
        <span><?php  esc_html_e('Share:','bauhaus'); ?></span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>" class="icon ion-social-facebook"></a>
        <a href="https://twitter.com/home?status=<?php echo esc_url(get_permalink()); ?>" class="icon ion-social-twitter"></a>
        <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ); ?>" class="icon ion-social-pinterest"></a>
    </div>

<?php } ?>





