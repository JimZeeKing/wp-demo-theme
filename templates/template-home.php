<?php

/*

Template Name: Gabarit accueil

*/

?>


<?php get_header() ?>


<?php
//--------------------------------------------------------
// Requête custom : Récupérer des contenus spécifique

// Premier exemple Exemple pour une catégorie et/ou un post_type spécifique
/*$args = array(
        'category_name' => 'Techno',
        'post_type' => 'post'
    );*/



// Faire en sorte d'avoir seulement les nouvelles
$args = array(
    'category__not_in' => array(1, 19, 20)

    // Omettre plusieurs catégories
    //'category__not_in' => array(1, 4)
);

$query = new WP_Query($args);

?>

<h2>Accueil</h2>

<div class="flex">

    <section class="trois-quart">

        <?php if ($query->have_posts()) : ?>

        <?php while ($query->have_posts()) : $query->the_post(); ?>

        <article class="flex post">

            <div class="quart">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('small', ['class' => 'fluide']); ?>
                <?php endif; ?>
            </div>
            <!-- NOTE : Dans un premier temps mettre seulement the_content() -->
            <div class="texte-article trois-quart">
                <h3><?php the_title() ?></h3>
                <p><?php the_excerpt() ?> <a href="<?php the_permalink() ?>">En savoir plus...</a></p>
            </div>
        </article>

        <?php endwhile; ?>

        <?php endif; ?>

    </section>

    <section class="quart sidebar">

        <?php get_sidebar(); ?>

    </section>

</div>

<div>

    <?php get_template_part("templates/parts/latest-reportages"); ?>


</div>

<?php get_footer() ?>