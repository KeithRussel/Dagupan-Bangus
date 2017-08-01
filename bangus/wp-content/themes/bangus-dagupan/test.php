<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 no-padding">
        <a href="<?php the_permalink(); ?>">
        <figure class="tint">
            <p><?php the_title() ?></p>
            <span class="entry-date"><?php echo get_the_date('m/d/Y'); ?></span>
            <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
        </figure>
        </a>
    </div>
<?php endwhile; ?>