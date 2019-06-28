<?php get_header();

$bauhaus_cat = 0;
$bauhaus_category = get_category( get_query_var( 'cat' ) );
if ( isset( $bauhaus_category->cat_ID ) ) {
    $bauhaus_cat = $bauhaus_category->cat_ID;
} else {
    $bauhaus_cat = 0;
}

$type = bauhaus_get_blog_type();

$position_sidebar= bauhaus_get_single_sidebar();

?>



    <main class="page-header-2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-6 col-md-offset-1 col-lg-offset-2">

                    <h1 class="display-1"><?php printf(esc_html(esc_html__('Search Results for: %s', 'bauhaus')), get_search_query()); ?> </h1>
                </div>
            </div>
        </div>
    </main>

    <div class="page-content-2">
        <div class="container place_li_cont ">
            <div class="row">

                <?php

                $positin_sidebar = "";

                if ( get_theme_mod( 'bauhaus_sidebar_position', 's2' ) == 's1' ) {
                    $positin_sidebar = 'left';
                } else {
                    $positin_sidebar = 'right';
                }

                if ( isset( $_GET['showas'] ) && $_GET['showas'] == 'left' ) {
                    $positin_sidebar = 'left';
                } elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'right' ) {
                    $positin_sidebar = 'right';
                }

                if ( $positin_sidebar == 'left' ) {
                    get_sidebar();
                }
                ?>

                <div class="primary col-md-8">

                    <?php if ( have_posts() ) : ?>
                        <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            ?>
                            <?php get_template_part( 'partials/content', get_post_format() ); ?>

                        <?php endwhile;


                    else :

                        ?>
                        <div class="primary col-md-12">

                            <div  <?php post_class( ' post grid-item js-isotope-item js-grid-item ' ); ?>  >
                                <div class="card">


                                    <div class="card-block">
                                        <h4 class="card-title"><?php
                                            esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bauhaus'); ?></h4>
                                        <div class="card-text"><?php   get_search_form(); ?></div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    endif; ?>
                </div>


                <?php
                if ( $positin_sidebar == 'right' ) {
                    get_sidebar();
                }
                ?>

            </div>
        </div>



    </div>





<?php

get_footer();