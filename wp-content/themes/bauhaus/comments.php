<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
$position_sidebar= bauhaus_get_single_sidebar();

$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

if ( isset($pos_sidebar{1})){
	$position_sidebar  = $pos_sidebar;
}

?>

        <div class="section-add-comment">
            <div class="comments">
                <div class="comments-area">
                    <h6 class="comments-title"> <?php
                        $num_comments = get_comments_number();
                        
                        $number = get_comments_number() > 0 ? get_comments_number() : 0;

                        echo esc_html( $number !==0 &&  $number < 10 ? '0'.$number. ' ' : $number. ' ');
                        ?> <?php esc_html_e( 'comments ', 'bauhaus' ); ?></h6>

                    <?php




                    function bauhaus_comment($comment, $args, $depth)
                    {
                        if ('div' === $args['style']) {
                            $tag = 'div ';
                            $add_below = 'comment';
                        } else {
                            $tag = 'li ';
                            $add_below = 'div-comment';
                        }
                        ?>
                        <<?php echo esc_html($tag) ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
                        <?php if ('div' != $args['style']) : ?>
                        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
                    <?php endif; ?>
                        <div class="avatar">
                            <?php if ($args['avatar_size'] != 0) echo wp_kses_post(get_avatar($comment, 70)); ?>

                        </div>

                        <div class="comment-content">
                            <div class="comment-metadata">
                                <b class="fn"> <?php  echo wp_kses_post(get_comment_author_link()); ?></b> <?php echo esc_html(' -' , 'bauhaus'); ?>
                                <a class="comment-time" href="#">
                                    <time datetime="">

                                        <?php
                                        /* translators: 1: date, 2: time */
                                        printf(esc_html__('%1$s at %2$s', 'bauhaus'), esc_html(get_comment_date()), esc_html  (get_comment_time())); ?>
                                        <?php edit_comment_link(esc_html__('(Edit)', 'bauhaus'), '  ', '');
                                        ?>
                                    </time>

                                </a>
                            </div>
                       <?php comment_text(); ?>
                            <div class="reply">
                                <?php comment_reply_link(array_merge($args, array('add_below' => sanitize_text_field($add_below), 'depth' => sanitize_text_field($depth), 'max_depth' => sanitize_text_field($args['max_depth'])))); ?>
                            </div>
                        </div>


                        <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'bauhaus'); ?></em>
                        <br/>
                    <?php endif; ?>





                        <?php if ('div' != $args['style']) : ?>
                        </div>
                    <?php endif; ?>
                        <?php
                    }

                    ?>


                    <div class="comments">

                        <?php
                        /*
						 * function to construct comments
						 */


                        ?>

                        <?php if (have_comments()) : ?>

                            <div class="comments-list-area">

                                <ol class="comment-list">
                                    <?php
                                    //show comments
                                    wp_list_comments(array(

                                        'type' => 'all',
                                        'short_ping'  => true,
                                        'callback' => 'bauhaus_comment'


                                    ));
                                    ?>
                                </ol>
                            </div>
                            <?php
                        endif; // have_comments()
                        // If comments are closed and there are comments, let's leave a little note, shall we?
                        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
                            ?>
                            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'bauhaus'); ?></p>
                        <?php endif;
                        ?>
                    </div>
                    </div>
                    </div><!-- .comments-area -->






                                <?php
                                //We get the option to comment form


                                ob_start();
                                $args = array(
                                    'comment_notes_before' => '',
                                    'title_reply_before' => '  <h6 class="comment-reply-title">',
                                    'title_reply_after' => '</h6><div class="row">',
                                    'title_reply' => esc_html__( 'Post a comment', 'bauhaus' ),
                                    'title_reply_to' => esc_html__( 'Leave a comment to %s', 'bauhaus' ),
                                    'fields' => array(

                                        'author' => '    <div class="form-group col-sm-4">

     <input type="text" class="" name="author" required="" placeholder=" ' . esc_html__( 'Name *', 'bauhaus' ) . '" >
                 </div>                          
',
                                        'email' => '
<div class="form-group col-sm-4">
                                <input type="email" class="" name="email" required="" placeholder=" ' . esc_html__( 'Email *', 'bauhaus' ) . '">
                            </div>',



                                    'url' => '
<div class="form-group col-sm-4">
                                <input type="text" id="url"  class="" name="url" required="" placeholder=" ' . esc_html__( 'Website *', 'bauhaus' ) . '">
                            </div>',
                                    ),
                                    'comment_field' => ' 	<div class="form-group col-sm-12">
                                    <textarea class="" rows="3" name="comment" id="comment-field"
                                              placeholder="' . esc_html__( 'Comment *', 'bauhaus' ) . '" maxlength="65525" required="required"></textarea>
                            </div>',
                                    'submit_button' => '<div class="col-sm-12">   <button type="submit" class="btn" data-text-hover=" ' . esc_html__( 'Submit', 'bauhaus' ) . '">
                                    <span class="btn-text">
                                    ' . esc_html__( 'Post comment', 'bauhaus' ) . '</span></button></div> </div> '


                                );

                                add_filter('comment_form_fields', 'bauhaus_reorder_comment_fields' );
                                function bauhaus_reorder_comment_fields( $fields ){


                                    $new_fields = array();

                                    $myorder = array('author','email','url','comment');

                                    foreach( $myorder as $key ){
                                        $new_fields[ $key ] = $fields[ $key ];
                                        unset( $fields[ $key ] );
                                    }


                                    if( $fields )
                                        foreach( $fields as $key => $val )
                                            $new_fields[ $key ] = $val;

                                    return $new_fields;
                                }



                                comment_form($args);

                                $str = ob_get_clean();
                                echo str_replace('comment-form', 'form-comment js-comment-form2  ', $str)
                                ?>

                     




