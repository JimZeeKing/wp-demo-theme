<?php

/*

Template Name: Galerie
Page listant les photos de la galerie des images soumises par les lecteurs du blogue

*/
?>

<?php get_header() ?>

<?php the_content() ?>

<div class='flex gallery'>
    <?php 
    $images = get_field('galerie_dimages');
    
    foreach($images as $image): ?>
    <a href="<?php echo $image['full_image_url'] ?>" title="<?php echo $image['caption'] ?>">
        <img src="<?php echo $image['thumbnail_image_url'] ?>">
    </a>

    <?php endforeach; ?>
</div>

<?php get_footer() ?>