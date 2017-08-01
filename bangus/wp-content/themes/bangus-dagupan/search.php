<?php get_header(); ?>

<section id="search">
    <div class="container">
    <div class="row" id="inner-search">
    <?php
    $s=get_search_query();
    $args = array(
                    's' =>$s
                );
        // The Query
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
            _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
            while ( $the_query->have_posts() ) {
               $the_query->the_post();
            ?>

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding">
                <a href="<?php the_permalink(); ?>">
                    <figure class="tint">
                        <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
                        <div class="meta-text">
                        <span class="entry-date"><?php echo get_the_date('m/d/Y'); ?></span>
                        <p><?php the_title() ?></p>
                        </div>
                    </figure>
                </a>
            </div>


            <?php
            }
        }else{
    ?>
            <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
            <div class="alert alert-info">
              <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
            </div>
    <?php } ?>
    </div>
    </div>
</section>
<?php get_footer(); ?>