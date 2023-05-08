<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$header = blockhaus_header_layout();

?>

<header class="entry-header grid grid-cols-1 relative grid-rows-[12rem] lg:grid-rows-[20rem] has-<?php echo $header->background;?>-background-color has-background bg-curves bg-fixed bg-cover bg-center overflow-hidden">

<h1 class="page-title z-0 mb-6 w-11/12 lg:w-fit mx-auto lg:ml-[12.5%] col-start-1 row-start-1 place-self-end leading-snug lg:leading-normal justify-self-start bg-primary-default text-lg lg:text-gigantic px-6 font-black uppercase"><?php echo $header->title;?></h1>



<?php if(is_singular() && has_post_thumbnail() && $header->showImage):
	the_post_thumbnail( 'full', ['class' => 'w-full h-80 col-start-1 row-start-1 object-cover'] );
	
elseif($header->showImage):?>
		<img class="h-80 object-cover col-start-1 row-start-1" height="<?php echo $header->showImage['height'];?>" width="<?php echo $header->showImage['width'];?>"  src="<?php echo $header->showImage['url'];?>" alt="<?php echo $header->showImage;?>">
		
<?php endif;?>

</header><!-- .page-header -->

