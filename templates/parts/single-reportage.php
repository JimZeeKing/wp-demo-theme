<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h2><?php echo get_field("titre") ?></h2>
<h3><?php echo get_field("date") ?></h3>
<article class="flex post">
    <div class="quart">
        <img src="<?php echo get_field('image')['sizes']['medium'] ?>" alt="">
    </div>
    <div class="texte-article trois-quart">
        <em><?php echo get_field('reportage') ?></em>
        <p>Lieu : <?php echo get_field("lieu") ? get_field("lieu") : 'Aucun lieu défini' ?></p>
        <?php $reporterID = get_field("reporter")->ID;?>
        <p>Reporter : <a href="<?php echo get_the_permalink($reporterID) ?>"><?php echo get_field('prenom',$reporterID) ?>&nbsp;<?php echo get_field('nom',$reporterID) ?></a></p>

    </div>
</article>

<a href="<?php echo get_page_link(152) ?>">Retour aux reportages</a>
<?php endwhile; ?>
<?php endif; ?>