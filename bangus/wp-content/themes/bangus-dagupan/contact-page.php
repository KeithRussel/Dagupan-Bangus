<?php /* Template Name: Contact Page */  

get_header();?>

<section id="wp-map">
       <?php echo do_shortcode('[wpgmza id="1"]');  ?>
</section>
<section id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-9">
                <h1><?php the_field('contact_title', 'option') ?></h1>
                <p><?php the_field('contact_description', 'option') ?></p>
            <?php echo do_shortcode('[contact-form-7 id="374" title="Contact form 1"]'); ?>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-3">
                <div id="custom-sidebar">
                    <ul>
                    <?php
                    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('custom-sidebar') ) :
                    endif; ?>
                    </ul>
                <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="news-bottom">
    <div class="container">
        <h1>Latest News</h1>
            <div class="row" id="inner-news">
            <?php 
            // the query
            $argsnews = array(
                'post_type' => array( 'post' ),
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'menu_order' => 'ASC'
            );
        
            $the_query = new WP_Query( $argsnews ); ?>

            <?php if (( $the_query->have_posts() ) ) : ?>
                
                <!-- pagination here -->

                <!-- the loop -->
                
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 no-padding">
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
                <?php endwhile; ?>
                <!-- end of the loop -->

                <!-- pagination here -->

                

            <?php else : ?>
                <p>No Data Found</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 no-padding" id="dagupan-news">
                <p>Dagupan News</p>
                    <?php
                    echo do_shortcode( '[wp_rss_aggregator limit="10" links_before=\'<ul class="rss-aggregator">\' link_before=\'<li class="feed-item-link">\']' );
                    ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>