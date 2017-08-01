<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bangus_Dagupan
 */

get_header(); ?>

<div class="single-content">
   <div class="container">
   <div class="row">
   <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
       <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="side-menu">
	    <?php get_sidebar(); ?>
        </div>	    
	</div>
	</div>
    </div>
</div>

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

<?php
//get_sidebar();
get_footer();
?>