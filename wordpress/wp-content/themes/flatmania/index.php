<?php
/**
 * The main template file
 */
?>

<?php
	get_header();
	the_post();
?>

<h2>INDEX <?php the_title() ?></h2>
<div>
<?php the_content() ?>
</div>

<?php get_footer(); ?>