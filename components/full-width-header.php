<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$header = blockhaus_header_layout();

// $title = get_the_archive_title();
// $image = '';
// $background = '';

// if(function_exists('get_field') && is_post_type_archive()):
// 	$headerSettings = get_field(get_post_type() . '_page_settings', 'options');
// 	$title = get_the_archive_title();
// 	if($headerSettings):
// 		$image = $headerSettings['header_image'];
// 		$background = $headerSettings['background_color'];
// 	endif;
// endif;

// if(function_exists('get_field') && (is_home() && ! is_front_page())):
// 	$headerSettings = get_field(get_post_type() . '_page_settings', 'options');
// 	$title = single_post_title('',false);
// 	if($headerSettings):
// 		$image = $headerSettings['header_image'];
// 		$background = $headerSettings['background_color'];
// 	endif;
// endif;

// if(function_exists('get_field') && is_singular()):
// 	$image = get_field('background_image_layout');
// 	$background = get_field('background_color');
// 	$title = get_the_title();
// endif;



?>

<header class="entry-header grid grid-cols-1 relative grid-rows-[12rem] lg:grid-rows-[20rem] has-<?php echo $header->background;?>-background-color has-background bg-curves bg-fixed bg-cover bg-center overflow-hidden">

<h1 class="page-title z-0 mb-6 w-11/12 lg:w-fit mx-auto lg:ml-[12.5%] col-start-1 row-start-1 place-self-end leading-snug lg:leading-normal justify-self-start bg-primary-default text-lg lg:text-gigantic px-6 font-black uppercase"><?php echo $header->title;?></h1>



<?php if(is_singular() && has_post_thumbnail() && $header->image):
	the_post_thumbnail( 'full', ['class' => 'w-full h-80 col-start-1 row-start-1 object-cover'] );
	
elseif($header->image):?>
		<img class="h-80 object-cover col-start-1 row-start-1" height="<?php echo $header->image['height'];?>" width="<?php echo $header->image['width'];?>"  src="<?php echo $header->image['url'];?>" alt="<?php echo $header->image;?>">
		
<?php endif;?>

</header><!-- .page-header -->

