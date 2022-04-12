<?php get_header(); ?>

<?php if(have_posts()) : ?>

<?php while(have_posts(  )) : the_post(  ); ?>
single
<article class="flex post">

<div class="quart">
                <?php if (get_field('photo')) : ?>
                <img src="<?php echo get_field('photo')['sizes']['medium'] ?>" alt="">

                <?php else : ?>
                <img src="<?php echo get_template_directory_uri() . '/images/Portrait_Placeholder_82.png' ?>" alt="">

                <?php endif; ?>
            </div>
  
    <div class="texte-article trois-quart">
        <h3><?php the_title(  ) ?></h3>
                <p><?php the_content(  ) ?></p>
                <p>Ce sujet vous intéresse? Consultez d'autres articles dans la catégorie <?php the_category( ', ' ); ?>.</p>
    </div>
</article>

<?php endwhile; ?>

<?php endif; ?>



<?php get_footer(  ) ?>