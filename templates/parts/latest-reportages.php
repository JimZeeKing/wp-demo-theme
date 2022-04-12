<!-- Partie qui affichera les derniers reportages dans un slider -->


<h3>Derniers reportages</h3>

<?php //paramètres pour la requête
$args = array(
    'category_name' => 'reportage',
    'orderby ' => 'date',
    'order' => 'DESC'
);

//Exécution de la requête
$query = new WP_Query($args); ?>

<div class="splide slider">
    <div class="splide__track">
        <ul class="splide__list">
            <?php
                //Boucle sur les résultats de la requête
                if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); 
            ?>
            <li class="splide__slide">
                <a href="<?php echo get_the_permalink() ?>">
                    <img src="<?php echo get_field('image')['sizes']['thumbnail'] ?>" alt="">
                    <div>
                        <h2><?php echo get_field('titre') ?></h2>
                        <p><?php echo get_field('date') ?></p>
                    </div>
                </a>

            </li>
            <?php
                endwhile;
                endif;

                //réinitialiser le poste global
                wp_reset_postdata();
            ?>
        </ul>
    </div>
</div>