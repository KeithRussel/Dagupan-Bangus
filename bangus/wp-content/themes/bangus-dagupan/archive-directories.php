<?php get_header(); ?>
<?php $directory_banner = get_field('directory_banner', 'option'); ?>
<div class="archive-banner" style="background-image: url(<?php echo $directory_banner; ?>);"></div>

<section id="directory">   
    <div class="container">
        <h2 class="type-title"><?php echo post_type_archive_title(); ?></h2>
        <div class="col-sm-7 col-md-9" style="overflow-x:auto;">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name of Enterprise</th>
                        <th>Products/Services</th>
                        <th>Contact Person</th>
                        <th>Business Address</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <tr>
                        <td><?php the_title(); ?></td>
                        <td><?php the_field('product_dir'); ?></td>
                        <td><?php the_field('contact_person_dir'); ?></td>
                        <td><?php the_field('business_address_dir'); ?></td>
                        <td><?php the_field('contact_number_dir'); ?></td>
                    </tr>
                <?php endwhile; ?>
                <?php endif; ?>
                </tbody>
              </table>
        </div>
        <div class="col-sm-5 col-md-3">
            <div class="side-menu">
            <?php get_sidebar('directory'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>