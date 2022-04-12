<?php get_header(); ?>

<h3><?php echo get_field('titre') ?></h3>
<h5><?php echo get_field('date') ?></h5>

<?php if(get_field('videos')): ?>
<?php echo get_field('videos') ?>

<?php elseif(get_field('audio')): ?>
<audio src="<?php echo get_field('audio')['url'] ?>" controls></audio>
<?php else: ?>
<p><?php echo get_field('contenu') ?></p>
<?php endif; ?>

<?php get_footer(  ) ?>