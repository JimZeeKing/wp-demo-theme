<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h2><?php echo get_field("prenom") ?>&nbsp;<?php echo get_field("nom") ?></h2>
<article class="flex post">
    <div class="quart">
        <?php if (get_field('photo')) : ?>
        <img src="<?php echo get_field('photo')['sizes']['medium'] ?>" alt="">
        <?php else : ?>
        <img src="<?php echo get_template_directory_uri() . '/images/Portrait_Placeholder_82.png' ?>" alt="">
        <?php endif; ?>
    </div>
    <div class="texte-article trois-quart">
        <em><?php echo get_the_content() ?></em>
        <p>Années d'expérience : <?php echo get_field("experience") ?></p>
        <?php if (get_field("site_web")) : ?>
        <p><a href="<?php echo get_field("site_web") ?>">Visitez mon site Web</a></p>
        <?php endif ?>
    </div>
</article>

<a href="<?php echo get_page_link(128) ?>">Retour aux reporters</a>
<?php endwhile; ?>
<?php endif; ?>