<?php
/**
 * Title: Profile Right - A profile block with image right-aligned
 * Slug: blockhaus/profile-right
 * Categories: team 
 * Description: Adds a profile block with image right-aligned
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"className":"blockhaus-profile-alt flex-col-reverse justify-between md:flex-row flex gap-0 md:gap-12"} -->
<div class="wp-block-group blockhaus-profile-alt flex-col-reverse justify-between md:flex-row flex gap-0 md:gap-12"><!-- wp:group {"className":"self-start md:self-center mt-0 md:mt-auto py-6 md:p-0 space-y-6"} -->
<div class="wp-block-group self-start md:self-center mt-0 md:mt-auto py-6 md:p-0 space-y-6"><!-- wp:heading {"className":"font-bold"} -->
<h2 class="wp-block-heading font-bold">Name - Job Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Biography</p>
<!-- /wp:paragraph -->


<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>Follow Name on: </p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"secondary","iconColorValue":"rgba(41 44 44 / 1)","openInNewTab":true,"showLabels":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-visible-labels has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://twitter.com/profileName","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://www.facebook.com/profileName/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://www.youtube.com/profileName","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"id":1630,"width":300,"height":300,"sizeSlug":"profile","linkDestination":"none","className":"aspect-square w-80 h-80"} -->
<figure class="wp-block-image size-profile is-resized aspect-square w-80 h-80"><img src="/wp-content/themes/blockhaus/assets/images/block-patterns/profile-image.jpg" alt="Name" class="wp-image-1630" width="300" height="300"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->