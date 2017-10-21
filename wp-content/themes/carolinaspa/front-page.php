<?php
get_header();
?>

<!-- Carousel -->
<div class="container">
    <div id="main-slider" class="carousel slide mt-4" data-ride="carousel">

        <?php
        $args = array(
            'posts_per_page' => 5,
            'tag' => 'slider'
        );
        $slider = new WP_Query($args);
        if ($slider->have_posts()):
            $count = $slider->found_posts;
            ?>

            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < $count; $i++) { ?>
                    <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" 
                        class="<?php echo ($i === 0) ? 'active' : ''; ?>">
                    </li>
                <?php } ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php
                $i = 0;
                while ($slider->have_posts()): $slider->the_post();
                    ?>
                    <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                        <?php
                        the_post_thumbnail('slider', array(
                            'class' => 'd-block img-fluid',
                            'alt' => get_the_title()
                        ));
                        ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="text-uppercase"><?php the_title(); ?></h3>
                        </div>
                    </div>
                    <?php
                    $i++;
                endwhile;
                ?>
            </div>

            <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#main-slider" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            <?php
        endif;
        wp_reset_postdata();
        ?>

    </div>
</div>

<!-- New Website Section -->
<section class="new-website py-5">
    <h2 class="text-center text-uppercase"><span class="text-lowercase">Welcome to our new</span> website</h2>
    <p class="text-center mt-4"><?php echo html_entity_decode(get_bloginfo('description')); ?></p>
</section>

<div class="container pb-5">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'page',
            'post_name__in' => array('products', 'services', 'about-us'),
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $main_images = new WP_Query($args);
        while ($main_images->have_posts()): $main_images->the_post();
            ?>
            <div class="col-md-4 col-12 text-center mb-4 mb-md-0">
                <div class="image-links">
                    <img src="<?php the_field('main_image'); ?>" class="img-fluid">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-8 col-md-10 image-info pt-4">
                            <?php the_field('description'); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-success text-uppercase btn-block mt-4 py-3">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>

<!-- Business Hours Section -->
<div class="business-hours">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5">
                <?php
                $args = array(
                    'before_title' => '<h2 class="text-center text-uppercase">',
                    'after_title' => '</h2>'
                );
                the_widget('Business_Hours', 'title=Business Hours', $args);
                ?>
            </div>
            <div class="col-md-6 bg-hours">
            </div>
        </div>
    </div>
</div>

<!-- Check our products section -->
<div class="container products py-5">
    <h2 class="text-center text-uppercase"><span class="text-lowercase">Checkout our</span> products</h2>
    <div class="row py-4">
        <?php echo do_shortcode('[carolinaspa_products number="4"]'); ?>
    </div>
    <a href="<?php echo get_permalink(get_page_by_title('Products')); ?>" class="float-right btn btn-primary all-products">View All Products</a>
</div>

<!-- Appointment Section -->
<?php get_template_part('templates/appointment'); ?>

<?php
get_footer();
?>
