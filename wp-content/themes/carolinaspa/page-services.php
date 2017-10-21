<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <div class="container pt-4">
        <div class="row no-gutters">
            <div class="col-12 hero">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                <h2 class="text-uppercase d-none d-md-block"><?php the_title(); ?></h2>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <main class="col-lg-8 main-content">
                <h2 class="d-block d-md-none"><?php the_title(); ?></h2>
                <?php the_content(); ?>

                <div id="services" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header py-2" role="tab" id="service_1">
                            <h3 class="mb-0">
                                <a href="#service_1desc" data-toggle="collapse" data-parent="#services"
                                   aria-expanded="true" aria-controls="service_1desc"><?php the_field('service_1_title'); ?></a>
                            </h3>
                        </div>
                        <div id="service_1desc" class="collapse show" role="tabpanel"
                             aria-labelledby="service_1">
                            <div class="card-block">
                                <?php the_field('service_1_description'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header py-2" role="tab" id="service_2">
                            <h3 class="mb-0">
                                <a class="collapsed" href="#service_2desc" data-toggle="collapse" data-parent="#services"
                                   aria-expanded="false" aria-controls="service_1desc"><?php the_field('service_2_title'); ?></a>
                            </h3>
                        </div>
                        <div id="service_2desc" class="collapse" role="tabpanel"
                             aria-labelledby="service_2">
                            <div class="card-block">
                                <?php the_field('service_2_description'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header py-2" role="tab" id="service_3">
                            <h3 class="mb-0">
                                <a class="collapsed" href="#service_3desc" data-toggle="collapse" data-parent="#services"
                                   aria-expanded="false" aria-controls="service_1desc"><?php the_field('service_3_title'); ?></a>
                            </h3>
                        </div>
                        <div id="service_3desc" class="collapse" role="tabpanel"
                             aria-labelledby="service_3">
                            <div class="card-block">
                                <?php the_field('service_3_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>

<?php endwhile; ?>

<!-- Appointment Section -->
<?php get_template_part('templates/appointment'); ?>

<?php get_footer(); ?>