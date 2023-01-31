<?php
/**
 * Adds meta tags, open graph tags and schema json-ld data to the head
 *
 * @package blockhaus
 */
function blockhaus_metaTags() {
  //if(function_exists('get_field')):
  global $post;
 
	$content = new stdClass;
	$post_type = get_post_type();
  $blogDesc = get_bloginfo( "description" );
  $content->siteName = get_bloginfo( "name" );
  
  if(function_exists('get_field')):
    $socialImage = get_field('social_image', 'options');
  endif;
  
  if(is_singular() && !is_page()):
      $content->type = "article";
  else:
      $content->type = "website";
  endif;
    
	if((is_archive() || (is_home() && ! is_front_page())) && ! is_search() && ! is_author()):

		if(is_home()):
      
    $content->title = single_post_title('',false);
      
    else:
      
		$content->title = get_the_archive_title();
    
    endif;
    
		$contentSettings = get_field(get_post_type() . '_page_settings', 'options');
		$content->image = $contentSettings['header_image']['sizes']['social'];
    
    $content->description =  $contentSettings['page_description'];
    
    if($content->description):
      $content->description = strip_tags($content->description);
    else:
      $content->description = $blogDesc;
		endif;
    
    if(!$content->image):
      $content->image =  $socialImage['sizes']['social'];
    endif;
    
    $content->permalink = get_post_type_archive_link($post_type);
    
    if(is_home()):?>
    
    <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "Blog",
          "@id": "<?php echo $content->permalink; ?>",
          "mainEntityOfPage": "<?php echo $content->permalink; ?>",
          "name": "<?php echo $content->title; ?>",
          "description": "<?php echo $content->description; ?>",
          "image": "<?php echo $content->image; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $content->siteName; ?>"
          }
      }
      </script>
      
    <?php else:?>
      
      <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "name": "<?php echo $content->title; ?>",
          "description": "<?php echo $content->description; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $content->siteName; ?>"
          }
      }
      </script>
    
    <?php endif;

	elseif(is_singular() && ! is_front_page()):

		$content->title = get_the_title();
    
    if(has_excerpt() && is_singular()):
      $content->description = strip_tags($post->post_excerpt);
      $content->description = str_replace("", "'", $content->description);
    else:
      $content->description = strip_tags($post->post_content);
      $content->description = preg_replace('/\s+/', ' ', $content->description);
      $content->description = str_replace("&nbsp;", " ", $content->description);
      $content->description = substr($content->description, 0, 160);
    endif;
    
    if(has_post_thumbnail($post->ID)):
      $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'social');
      $content->image = $img_src[0];#
    else:
      $content->image = $socialImage['sizes']['social'];
    endif;
    
    $content->permalink = get_the_permalink();
    
    if($post_type === 'page'):?>
    
      <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "name": "<?php echo $content->title; ?>",
          "description": "<?php echo $content->description; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $content->siteName; ?>"
          }
      }
      </script>
      
    <?php endif;
    
    if($post_type === 'post') :?>
      <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "BlogPosting",
          "headline": "<?php echo $content->title; ?>",
          "author": {
              "@type": "Person",
              "name": "<?php echo get_the_author_meta('display_name', $post->post_author); ?>"
          },
          "datePublished" : "<?php echo get_the_date();?>",
          "dateModified" : "<?php echo get_the_modified_date('Y-m-d');?>",
          "description": "<?php echo $content->description; ?>",
          "mainEntityOfPage" : "<?php echo $content->permalink; ?>",
          "image": "<?php echo $content->image; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $content->siteName; ?>"
          }
      }
      </script>
    <?php endif;
    
    if($post_type === 'project') :?>
      <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": "<?php echo $content->title; ?>",
          "author": {
              "@type": "Person",
              "name": "<?php echo get_the_author_meta('display_name', $post->post_author); ?>"
          },
          "datePublished" : "<?php echo get_the_date();?>",
          "dateModified" : "<?php echo get_the_modified_date('Y-m-d');?>",
          "description": "<?php echo $content->description; ?>",
          "mainEntityOfPage" : "<?php echo $content->permalink; ?>",
          "image": "<?php echo $content->image; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $content->siteName; ?>"
          }
      }
      </script>
    <?php endif;
    
    if($post_type === 'publication'):
    $sameAs = get_field('external_link', $post->ID);
    $external_site = get_field('external_site', $post->ID);
    ?>
      <script type="application/ld+json">
      {
          "@context": "https://schema.org",
          "@type": "ScholarlyArticle",
          "headline": "<?php echo $content->title; ?>",
          "author": {
              "@type": "Person",
              "name": "<?php echo get_the_author_meta('display_name', $post->post_author); ?>"
          },
          "datePublished" : "<?php echo get_the_date();?>",
          "dateModified" : "<?php echo get_the_modified_date('Y-m-d');?>",
          "description": "<?php echo $content->description; ?>",
          "mainEntityOfPage" : "<?php echo $content->permalink; ?>",
          "sameAs": "<?php echo $sameAs; ?>",
          "image": "<?php echo $content->image; ?>",
          "publisher": {
              "@type": "Organization",
              "name": "<?php echo $external_site; ?>"
          }
      }
      </script>
    
    <?php endif;
    
    if($post_type === 'link'):
      $sameAs = get_field('external_link', $post->ID);
      $external_site = get_field('external_site', $post->ID);
      ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "<?php echo $content->title; ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo get_the_author_meta('display_name', $post->post_author); ?>"
            },
            "datePublished" : "<?php echo get_the_date();?>",
            "dateModified" : "<?php echo get_the_modified_date('Y-m-d');?>",
            "description": "<?php echo $content->description; ?>",
            "mainEntityOfPage" : "<?php echo $content->permalink; ?>",
            "sameAs": "<?php echo $sameAs; ?>",
            "image": "<?php echo $content->image; ?>",
            "publisher": {
                "@type": "Organization",
                "name": "<?php echo $external_site; ?>"
            }
        }
        </script>
      
    <?php endif;
 
 elseif(is_author()):
    
    global $wp_query;
    
    $query = $wp_query->query_vars;
    $curauth = $query['author'];
    
    $content->title = get_the_author_meta( 'nicename', $curauth );
    
    $content->description = get_field('profile_biography', 'user_' . $curauth);
    $content->description = strip_tags($content->description);
    $content->description = substr($content->description, 0, 160);
         
    if(!$content->description) {
      $content->description = $blogDesc;
    }
    
    $author_img = get_field('profile_image', 'user_' . $curauth);
    $content->image = $author_img['sizes']['social'];
       
    if(!$content->image) {
      $default_img = get_field('page_header', 'options');
      $content->image = $socialImage['sizes']['social'];
    }
   
    $content->permalink = get_author_posts_url($curauth);?>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "person",
        "name": "<?php echo $content->title; ?>",
        "disambiguatingDescription": "<?php echo $content->description; ?>",
        "image": "<?php echo $content->image; ?>",
        "url": "<?php echo $content->permalink; ?>"
    }
    </script>

  <?php else:
    
    $content->title = $content->siteName;
    $content->description = $blogDesc;
    
    if(has_post_thumbnail($post->ID)):
      $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'social');
      $content->image = $img_src[0];#
    else:
      $content->image = $socialImage['sizes']['social'];
    endif;
    
    $content->permalink = get_site_url();?>
    
    <script type="application/ld+json">
    {
         "@context": "https://schema.org",
         "@type": "WebSite",
         "name": "<?php echo $content->title; ?>",
         "url": "<?php echo $content->permalink;?>",
         "description": "<?php echo $content->description; ?>",
         "publisher": {
             "@type": "Organization",
             "name": "<?php echo $content->siteName; ?>"
         }
     }
    </script>
	
  <?php endif;?>
  
  <!-- blockhaus_metaTags -->
  
    <link rel="canonical" href="<?php echo $content->permalink; ?>">
    <meta name="description" content="<?php echo $content->description; ?>"/>
    <meta property="og:site_name" content="<?php echo $content->siteName; ?>"/>
    <meta property="og:title" content="<?php echo $content->title; ?>"/>
    <meta property="og:description" content="<?php echo $content->description; ?>"/>
    <meta property="og:type" content="<?php echo $content->type; ?>"/>
    <meta property="og:url" content="<?php echo $content->permalink; ?>"/>
    <meta property="og:image" content="<?php echo $content->image; ?>"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo $content->permalink; ?>" />
    <meta name="twitter:title" content="<?php echo $content->title; ?>" />
    <meta name="twitter:description" content="<?php echo $content->description; ?>" />
    <meta name="twitter:image" content="<?php echo $content->image; ?>" />
  
  <?php }

add_action('wp_head', 'blockhaus_metaTags', 10);
  
function filter_document_title( $title ) {
  if ( is_front_page() && !is_home() ) {
      $title = get_bloginfo('title') . ' - Home'; 

      return $title; 
  }
}

add_filter( 'pre_get_document_title', 'filter_document_title' );