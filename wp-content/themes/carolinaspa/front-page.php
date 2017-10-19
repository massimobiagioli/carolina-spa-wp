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
            ?>

            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php while ($slider->have_posts()): $slider->the_post(); ?>
                    <div class="carousel-item active">
                        <?php the_post_thumbnail('slider', array(
                            'class' => 'd-block img-fluid',
                            'alt' => get_the_title()
                        )); ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="text-uppercase"><?php the_title(); ?></h3>
                        </div>
                    </div>
                <?php endwhile; ?>
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
    <p class="text-center mt-4">Feel like new with our massages and professional <br> therapists</p>
</section>

<div class="container pb-5">
    <div class="row">
        <div class="col-md-4 col-12 text-center mb-4 mb-md-0">
            <div class="image-links">
                <img src="img/service_01.jpg" class="img-fluid">
                <div class="row no-gutters justify-content-center">
                    <div class="col-8 col-md-10 image-info pt-4">
                        <h3 class="text-center text-uppercase"><span class="text-lowercase">Learn more</span> About us</h3>
                        <a href="#" class="btn btn-success text-uppercase btn-block mt-4 py-3">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 text-center mb-4 mb-md-0">
            <div class="image-links">
                <img src="img/service_02.jpg" class="img-fluid">
                <div class="row no-gutters justify-content-center">
                    <div class="col-8 col-md-10 image-info pt-4">
                        <h3 class="text-center text-uppercase"><span class="text-lowercase">About our</span> services</h3>
                        <a href="#" class="btn btn-success text-uppercase btn-block mt-4 py-3">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 text-center mb-4 mb-md-0">
            <div class="image-links">
                <img src="img/service_03.jpg" class="img-fluid">
                <div class="row no-gutters justify-content-center">
                    <div class="col-8 col-md-10 image-info pt-4">
                        <h3 class="text-center text-uppercase"><span class="text-lowercase">Visit our</span> store</h3>
                        <a href="#" class="btn btn-success text-uppercase btn-block mt-4 py-3">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Business Hours Section -->
<div class="business-hours">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5">
                <?php include 'templates/business_hours.php'; ?> 
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

        <?php
        try {
            require_once 'inc/db.php';
            $sql = 'SELECT `id`, `name`, `image_thumb`, `price`, `short_description` FROM `products` LIMIT 4';
            $result = $db->query($sql);
            $rows = $result->num_rows;
            if (!$rows) {
                echo "No Results Found.";
            } else {
                while ($product = $result->fetch_assoc()) {
                    ?>
                    <div class="col-6 col-md-3 mb-5 mb-md-0">
                        <div class="card">
                            <a href="product.php?product=<?php echo $product['id']; ?>">
                                <img src="img/<?php echo $product['image_thumb']; ?>" class="card-img-top img-fluid">
                                <div class="card-block">
                                    <h3 class="card-title text-center text-uppercase mb-0"><?php echo $product['name']; ?></h3>
                                    <p class="card-text text-uppercase"><?php echo $product['short_description']; ?></p>
                                    <p class="price text-center mb-0">$ <?php echo $product['price']; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo $error;
        }

        $db->close();
        ?>

    </div>
</div>

<?php
include 'templates/appointment.php';
get_footer();
?>
