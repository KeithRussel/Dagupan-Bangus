
<?php get_header(); ?>
<!--SLIDER CAROUSEL-->
<div id="mycarousel" class="carousel slide" data-ride="carousel" data-pause="null">
  <!-- Indicators -->
<?php if( have_rows('main_slider') ): $i = 0; ?>
    <ol class="carousel-indicators">
    <?php while ( have_rows('main_slider') ): the_row(); ?>
    <li data-target="#mycarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
    <?php $i++; endwhile; ?></ol>
<?php endif; ?> 
  
<?php if( have_rows('main_slider') ): ?>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php while ( have_rows('main_slider') ): the_row(); 
        $image = get_sub_field('slide_image');
      ?>
    <div class="item">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
        <div class="container">
        <div class="carousel-caption">
            <h1><?php the_sub_field('title'); ?></h1>
            <p class="subtitle"><?php the_sub_field('description'); ?></p>
        </div>
        </div>
    </div>
    <?php $i++; endwhile; ?>
  </div>
 <?php endif; ?>

  <!-- Controls -->
  <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<!--    <span class="sr-only">Previous</span>-->
  </a>
  <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<!--    <span class="sr-only">Next</span>-->
  </a>
</div>

<section id="pride">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-5">
                <?php
                $image = get_field('ft_featured_image');
                if( !empty($image) ): ?><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-7 col-lg-7">
                <div class="pride-text">
                    <div class="pride-right">
                        <p><?php the_field('ft_sub_title'); ?></p>
                    </div>
                    <div class="pr-title">
                        <h1><?php the_field('ft_title'); ?></h1>
                    </div>
                    <div class="pr-text">
                        <p><?php the_field('ft_description'); ?></p>
                    </div>
                    <a href="<?php echo the_field('featured_link'); ?>" class="theme-btn btn-learn"><?php the_field('ft_learn_button'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section> <!-- End of Pride Content -->

<section id="data-count">
    <div class="container">
        <div class="row">
           <?php if(get_field('main_data')): ?>
            <div class="main-data">
               <?php while(has_sub_field('main_data')): ?>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="data-align">
                    <div class="wrap">
                        <div class="data-content">
                        <div id="cnt-box">
                            <div class="row">
                            <strong class="counter" data-count=""><?php the_sub_field('data_num'); ?></strong>
                            <span class="cnt-desc"><?php the_sub_field('data_side_text'); ?></span>
                            </div>
                        </div>
                            <div class="row">
                            <span><?php the_sub_field('data_description'); ?></span>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                    <div class="hidden-data">
                        <div class="hidden-data-content">
                        <div id="cnt-box">
                            <div class="row">
                            <strong class="counter" data-count=""><?php the_sub_field('data_num'); ?></strong>
                            <span class="cnt-desc-2"><?php the_sub_field('data_side_text'); ?></span>
                            </div>
                        </div>
                            <div class="row">
                            <span><?php the_sub_field('data_description'); ?></span>
                            <hr>
                            <div class="hidden-desc">
                                <?php the_sub_field('hover_description'); ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                <?php endwhile; ?>    
            </div>
            <?php endif; ?>
        </div>
    </div>
</section><!-- End of Data-Count -->

<section id="slider2">
<div id="mycarousel2" class="carousel slide carousel2" data-ride="carousel" data-pause="null">
<!-- Indicators -->
    <?php if( have_rows('slider_2') ): $x = 0; ?>
    <ol class="carousel-indicators">
       <?php while ( have_rows('slider_2') ): the_row(); ?>
        <li data-target="#mycarousel2" data-slide-to="<?php echo $x; ?>" class="<?php if($x == 0) echo 'active'; ?>"></li>
        <?php $x++; endwhile; ?></ol>
    <?php endif; ?>
    
 <!-- Wrapper for slides -->
 <?php if( have_rows('slider_2') ): ?>
    <div class="carousel-inner" role="listbox">
        <?php while ( have_rows('slider_2') ): the_row(); 
        $image2 = get_sub_field('s2_image');
        ?>
    <div class="item">
        <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt'] ?>" />
        <div class="container">
        <div class="carousel-caption-2">
            <p class="subtitle"><?php the_sub_field('s2_subtitle'); ?></p>
            <h1><?php the_sub_field('s2_title'); ?></h1>
            <hr>
            <?php the_sub_field('s2_description'); ?>
            <?php if(get_sub_field('slider2_link')): ?>
            <a href="<?php the_sub_field('slider2_link'); ?>" class="theme-btn btn-learn">Learn More</a>
            <?php endif; ?>
        </div>
        </div>
    </div>
<?php $x++; endwhile; ?>
    </div>
<?php endif; ?>
</div>
</section> <!-- End of Slider 2 -->

<section id="events">
    <div class="container">
        <div class="upcoming-event">
            <h1>Upcoming Events<a href="<?php bloginfo('url');?>/events/" class="view-all">View All </a></h1>
            <div class="clearfix"></div>
                <?php
                $args = array( 'post_type' => 'events', 'posts_per_page' => 3 );

                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                <?php $date = strtotime(get_field('event_date')); ?>
                <div class="col-sm-4 col-md-4 col-lg-4" id="event-content">
                    <a href="<?php echo get_permalink(); ?>" class="event-data">
                        <span class="event-title"><?php the_title(); ?></span>
                        <span class="event-date event-month"><?php echo date('F', $date); ?></span>
                        <span class="event-date event-day"><?php echo date('d', $date); ?></span>
                    </a>
                </div>
                <?php endwhile; ?>
        </div>
    </div>
</section> <!-- End of events -->

<section id="products">
    <div class="container">
        <div class="product-content">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <?php 

                $image = get_field('product_image', 42);

                if( !empty($image) ): ?>

            	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <p class="subtitle"><?php the_field('product_sub_title', 42); ?></p>
                <h1><?php the_field('product_title', 42); ?></h1>
                <p><?php the_field('product_description', 42); ?></p>
                <a href="<?php echo the_field('product_link', 42);?>" class="theme-btn btn-learn"><?php the_field('product_button', 42); ?></a>
            </div>
        </div>
        </div>
    </div>
</section><!-- End of Products -->
<hr class="dots">

<section id="promote">
    <div class="container">
        <div class="promote-content">
        <div class="text-center">
            <h4><?php the_field('pt_head_subtitle', 42); ?></h4>
            <h1><?php the_field('pt_head_title', 42);?></h1>
        </div>
        <div class="row">
            <?php if(have_rows('main_promote', 42)): ?>
                <div class="main-promote text-center">
                <?php while(have_rows('main_promote' ,42)): the_row(); ?>
                    <div class="col-sm-3 col-md-6 col-lg-3 promote-responsive">
                        <?php
                        $image = get_sub_field('pt_image');
                        $promote_link = get_sub_field('promote_link');
                        $some_long_text = get_sub_field('pt_image_description');
                        ?>
	                    <img src="<?php echo $image['url'] ?>">
                        <h4><?php the_sub_field('pt_image_title', 42); ?></h4>
                        <!--?php echo get_sub_field( 'pt_image_description', get_the_ID() ) ; ?-->
                        <!--?php echo custom_field_excerpt ?-->
                        <?php echo wpautop( $some_long_text ); ?>
                    <?php if(get_sub_field('promote_link')): ?>
                    <div class="learn">
                        <a href="<?php echo $promote_link;?>" class="theme-btn btn-learn"><?php the_sub_field('pt_button', 42); ?></a>
                    </div>
                    <?php endif; ?>
                    </div>
                <?php endwhile; ?> 
                </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</section>

<section id="news">
    <div class="container">
        <h1>Latest News</h1>
           <div class="row" id="inner-news">
            <?php 
            // the query
            $argsnews = array(
                'post_type' => array( 'post' ),
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order'      => 'DESC',
                'orderby'    => 'date'
	            
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