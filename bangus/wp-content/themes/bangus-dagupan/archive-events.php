<?php
get_header();
?>
<?php $events_banner = get_field('events_banner','option'); ?>
<div class="archive-banner" style="background-image: url(<?php echo $events_banner; ?>);"></div>
    		<?php
		if ( have_posts() ) : ?>

<section id="events-archive">
    <div class="container">
	    <header class="archive-header">
            <h1 class="archive-title"><?php echo post_type_archive_title(); ?></h1>
        </header><!-- .page-header -->
        <div class="row" id="inner-news">
            <?php 
            // the query
            $argsnews = array(
                'post_type' => array( 'events' ),
                'post_status' => 'publish',
                'posts_per_page' => 4,
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
        </div>
    </div>
</section>
        <?php endif; ?>
<?php
get_footer();
?>