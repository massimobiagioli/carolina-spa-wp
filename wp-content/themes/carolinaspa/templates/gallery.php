<div id="facilities-gallery">
    <h3 class="text-center text-uppercase py-4">
        <span class="text-lowercase">Check our</span>facilities
    </h3>

    <?php 
        $gallery = get_field('gallery', $post, false); 
        if ($gallery) {
            preg_match('/\[gallery.*ids=.(.*).\]/', $gallery, $ids);
            $images_id = explode(',', $ids[1]);

            foreach ($images_id as $id): ?>
                <a href="#" data-target="#image_<?php echo $id; ?>" data-toggle="modal">
                    <?php $image_url = wp_get_attachment_image_src($id, 'thumbnail'); ?>
                    <img src="<?php echo $image_url[0]; ?>" class="rounded">
                </a>

                <div class="modal fade" id="image_<?php echo $id; ?>" tabindex="-1" role="dialog" 
                    aria-labelledby="image_<?php echo $id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php $image_url = wp_get_attachment_image_src($id, 'full'); ?>
                                <img src="<?php echo $image_url[0]; ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        }
    ?>
</div>