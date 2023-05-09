<?php
/**
 * Title: Profile Left - A profile block with image left-aligned
 * Slug: blockhaus/profile-left
 * Categories: team 
 * Description: Adds a profile block with image left-aligned
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"blockhaus-profile flex-col md:flex-row flex gap-0 md:gap-12"} -->
<div class="wp-block-group blockhaus-profile flex-col md:flex-row flex gap-0 md:gap-12" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":1472, "width":300,"height":300,"sizeSlug":"profile","linkDestination":"none","className":"aspect-square w-80 h-80"} -->
<figure class="wp-block-image size-profile aspect-square w-80 h-80"><img src="/wp-content/themes/blockhaus/assets/images/block-patterns/profile-image.jpg" alt="Name" width="300" height="300" class="wp-image-1472"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"self-start md:self-center mt-0 md:mt-auto py-6 md:p-0 space-y-6"} -->
<div class="wp-block-group self-start md:self-center mt-0 md:mt-auto py-6 md:p-0 space-y-6"><!-- wp:heading {"className":"font-bold"} -->
<h2 class="wp-block-heading font-bold">Name - Job Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Biography</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>Follow Name on:</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"secondary","iconColorValue":"rgba(41 44 44 / 1)","openInNewTab":true,"showLabels":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-visible-labels has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://twitter.com/profileName","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://www.facebook.com/profileName/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://www.youtube.com/profileName","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->