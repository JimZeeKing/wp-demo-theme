<?php get_header( ); ?>

<div>

    <h2>Résultats de recherche pour : "<?php echo get_search_query(); ?>"</h2>

<?php if(have_posts()) : ?>

    <?php while(have_posts(  )) : the_post(  ); ?>

    <article class="flex post">

        <div class="texte-article">
            <h3><?php the_title(  ) ?></h3>
                <p><?php the_excerpt(  ) ?>  <a href="<?php the_permalink(  ) ?>">En savoir plus...</a></p> 
        </div>
    </article>

    <?php endwhile; ?>

<?php else : ?>

    <p>Aucun résultats de recherche pour cette requête...</p>

<?php endif; ?>

</div>


<?php get_footer(  ); ?>