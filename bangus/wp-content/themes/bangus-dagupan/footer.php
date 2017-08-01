<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bangus_Dagupan
 */

?>

<footer id="footer-section">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-3 col-lg-3 footer-img">
                    <?php
                    the_custom_logo();
                    ?>
                </div>
                <div class="col-sm-7 col-md-6 col-lg-6">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'another-menu',
                        'menu_class' => 'footer-top'
                        ) ); 
                    ?>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 social-nav">
                    <p>Follow Us</p>
                    <ul class="social-network social-circle">
                <?php
                    $facebook_link  = get_field('facebook_link', 'option');
                    $twitter_link  =  get_field('twitter_link', 'option');
                    $youtube_link  =  get_field('youtube_link', 'option');
                    $instagram_link = get_field('instagram_link', 'option');    
                    $links = $facebook_link || $twitter_link || $youtube_link || $instagram_link;
                ?>

                <?php if($facebook_link) : ?>
                        <li><a class="bt-social icoFacebook" href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php endif;
                if ($twitter_link) : ?>
                        <li><a class="bt-social icoTwitter" href="<?php echo $twitter_link;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <?php endif;
                if($instagram_link) : ?>
                        <li><a class="bt-social icoInstagram" href="<?php echo $instagram_link; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <?php endif;
                if($youtube_link) : ?>
                       <li><a class="bt-social icoYoutube" href="<?php echo $youtube_link; ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                <?php endif; ?>       
                    </ul>	
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <p class="text-center">Copyright © <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved. Site by <a target="_blank" title="Website Design, Website Development, Graphics Design, On-line Database Integration, Search Engine Optimization" href="http://wearepixelhub.com">Pixelhub Design + Digital Agency </a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

</body>
</html>
