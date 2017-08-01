<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bangus_Dagupan
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<link href="https://fonts.googleapis.com/css?family=Archivo+Black|Open+Sans:400,600,700" rel="stylesheet">
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
<!--<script type="text/javascript" src="wp-includes/js/jquery/jquery.js"></script>-->
<!--<script type="text/javascript" src="wp-includes/js/jquery/jquery-migrate.min.js"></script>-->

</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header">
        <div class="top-head">
    	    <div class="container">
	            <div class="row">
	                <div class="col-sm-4 col-md-6 col-lg-6">
                        <div class="top-head-left">
                            <p><?php the_field('top_head_text', 42); ?></p>
                        </div>
	                </div>
	                <div class="col-sm-8 col-md-6 col-lg-6">
                        <div class="top-head-right">
	                    <?php wp_nav_menu( array(
                        'theme_location' => 'new-menu',
                        'menu_class' => 'nav navbar-nav'
                        ) );
                        ?>
                        </div>
                    </div>
	            </div>
	        </div>
    	</div> <!-- top-head-->
    	<nav class="navbar navbar-default">
            <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <?php the_custom_logo(); ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
                    'menu_class'    => 'nav navbar-nav',
					'menu_id'        => 'primary-menu',
				) );
			?>
            </div>
            <button class="glyphicon glyphicon-search search-btn"></button>
            </div>
        </nav>
        <div class="search-form">
            <div class="container">
                <div class="row">
                   <div class="col-lg-10 col-lg-offset-1">
                    <form class="navbar-form" role="search" action="<?php echo home_url( '/' ); ?>" method="get">
                        <button type="submit" class="submit glyphicon glyphicon-search" style="font-size: 28px;"></button>
                        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control bangus-search" placeholder="Search for ..." autocomplete="off" />
                        <span class="input-group-btn"></span>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<!--
        <div class="search">
        <div class="search-content">
            <div class="container">
            <div class="row">
              <div class="col-lg-10 col-lg-offset-1">
                  <form action="https://www.dagupan.gov.ph" method="get">                  
                    <input type="submit" class="search-button" value="" name=""> 
                    <input type="text" name="s" class="search-field" placeholder="I am Looking for...">
                  </form> 
              </div>
            </div>
            </div>
        </div>
        </div>    
-->
	</header><!-- #masthead -->


