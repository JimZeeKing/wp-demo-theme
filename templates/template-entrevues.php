<?php

/*

Template Name: Entrevues
Page listant les articles ayant la catégorie reportage

*/
?>


<?php get_header() ?>

<?php
//infos de la apge (title, content)
$pageDesc;
//if (have_posts()) :
//  while (have_posts()) : the_post();
$pageDesc = get_the_content(); ?>

<h2><?php echo get_the_title() ?></h2>

<?php

// endwhile;
//endif;
?>

<?php

//paramètres pour la requête
$args = array(
    'post_type' => 'entrevues',
    'orderby' => 'data',
    'order' => 'DESC'
);

//Exécution de la requête
$query = new WP_Query($args);





?>

<div class="flex">

    <section class="trois-quart">
        <p><?php echo get_the_content(); ?></p>

        <div>
            <button class='btn-all' onclick="showInterviewType('all')">Toutes</button>
            <button class='btn-audio' onclick="showInterviewType('audio')">Audio</button>
            <button class='btn-video' onclick="showInterviewType('video')">Vidéo</button>
            <button class='btn-text' onclick="showInterviewType('text')">Écrite</button>
        </div>
        <br>
        <br>

        <div class="flex">
            <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php 
                $type = NULL;
                if(get_field('videos')){
                    $type = 'video';
                }else if(get_field('audio')){
                    $type = 'audio';
                }else{
                    $type = 'text';
                } 
            ?>


            <a class='flex entrevue' href="<?php echo get_the_permalink() ?>" data-type='<?php echo $type ?>'>

                <?php if($type == 'video'): ?>

                <img src="<?php echo get_template_directory_uri() ?>/images/video_camera.png" alt="">

                <?php elseif($type == 'audio'): ?>
                <img src="<?php echo get_template_directory_uri() ?>/images/microphone.jpg" alt="">
                <?php else: ?>

                <img src="<?php echo get_template_directory_uri() ?>/images/text.jpg" alt="">
                <?php endif; ?>

                <div>
                    <h3>Entrevue</h3>
                    <?php echo get_field('titre') ?>
                </div>

            </a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>


    </section>

    <section class="quart sidebar">

        <?php get_sidebar(); ?>

    </section>



</div>


<?php get_footer() ?>