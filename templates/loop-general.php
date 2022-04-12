<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<h2><?php the_title(); ?></h2>

<article class="flex post">

    <div class="texte-article">

        <p><?php the_content(); ?></p>

    </div>
</article>

<?php endwhile; ?>

<?php endif; ?>