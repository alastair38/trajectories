<?php
/**
 * Template part for displaying page content in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<div id="post-<?php the_ID(); ?>">



	<div>
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
