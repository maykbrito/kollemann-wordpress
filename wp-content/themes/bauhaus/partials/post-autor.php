<div class="post-author">


    <?php
    $bauhaus_class = bauhaus_get_global_class();
    $my_post = get_post(get_the_ID());  // $id - ID Post
    $user_date = get_userdata($my_post->post_author);
    $my_post = get_post(get_the_ID());  // $id - ID Post
    $user_date = get_userdata($my_post->post_author);
    if ($user_date == false) {
        $user_date = get_userdata(1);
    }

    ?>

    <div class="post-author-avatar">
        <img alt=""
             src="<?php echo esc_url($bauhaus_class->get_url_img_avatar($my_post->post_author, 150, 140, '', true));
             ?>" class="img-circle" width="80">
    </div>

    <div class="post-author-description">
        <p class="post-author-name"><?php esc_html_e('by', 'bauhaus') ?> <a
                href="<?php echo esc_url(get_the_author_meta('url')); ?>"><?php the_author(); ?></a></p>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php
                $tasut = the_author_meta('description');
                $desc = (!empty($tasut)) ? $tasut : ""; ?>

                <?php echo wp_kses_post($desc); ?>

            </div>
        </div>


    </div>

</div>