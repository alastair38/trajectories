<?php
/**
 * Template part for displaying default page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="w-full space-y-6 lg:space-y-12 mb-6 lg:mb-12">

	<?php get_template_part('components/full-width-header'); ?>

	<?php get_template_part('components/main-content'); ?>

</article><!-- #post-<?php the_ID(); ?> -->
