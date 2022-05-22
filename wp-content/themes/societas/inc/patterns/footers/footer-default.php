<?php
/**
 * Default Footer With Columns
 */
return array(
	'title'      => __( 'Default Footer With Columns', 'societas' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","right":"15px","bottom":"15px","left":"15px"}}},"backgroundColor":"light","layout":{"inherit":false,"contentSize":"1170px"}} -->
					<div id="footer" class="wp-block-group has-light-background-color has-background" style="padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:group {"className":"tp-upper-footer"} -->
					<div id="upper-footer" class="wp-block-group tp-upper-footer"><!-- wp:group {"className":"container"} -->
					<div class="wp-block-group container"><!-- wp:group {"className":"row"} -->
					<div class="wp-block-group row"><!-- wp:group {"className":"col-lg-3 col-md-6 col-12"} -->
					<div class="wp-block-group col-lg-3 col-md-6 col-12"><!-- wp:site-title {"style":{"spacing":{"margin":{"top":"20px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"large"} /-->
					
					<!-- wp:paragraph {"align":"left","textColor":"tertiary"} -->
					<p class="has-text-align-left has-tertiary-color has-text-color">Societas is a block based Wordpress Theme.</p>
					<!-- /wp:paragraph --></div>
					<!-- /wp:group -->
					
					<!-- wp:group {"className":"col-lg-5  col-md-6 col-12"} -->
					<div class="wp-block-group col-lg-5  col-md-6 col-12"><!-- wp:query {"queryId":44,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
					<div class="wp-block-query"><!-- wp:post-template -->
					<!-- wp:post-title {"level":6,"isLink":true,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"5px","left":"0px"}}}} /-->
					
					<!-- wp:post-date {"fontSize":"small"} /-->
					<!-- /wp:post-template --></div>
					<!-- /wp:query --></div>
					<!-- /wp:group -->
					
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","className":"col-lg-2 col-md-6 col-12"} -->
					<div class="wp-block-group col-lg-2 col-md-6 col-12 has-tertiary-color has-text-color has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:archives {"showPostCounts":true} /--></div>
					<!-- /wp:group -->
					
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"}}},"className":"col col-lg-2 col-md-6 col-12"} -->
					<div class="wp-block-group col col-lg-2 col-md-6 col-12" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:navigation {"ref":1943,"textColor":"tertiary","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"typography":{"lineHeight":"0","fontSize":"15px"}}} /--></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->
					
					<!-- wp:group {"backgroundColor":"light","className":"tp-lower-footer"} -->
					<div id="lower-footer" class="wp-block-group tp-lower-footer has-light-background-color has-background"><!-- wp:group {"className":"container"} -->
					<div class="wp-block-group container"><!-- wp:group {"className":"row"} -->
					<div class="wp-block-group row"><!-- wp:group {"className":"col col-xs-12"} -->
					<div class="wp-block-group col col-xs-12"><!-- wp:paragraph {"align":"center","textColor":"tertiary","className":"copyright","fontSize":"small"} -->
					<p class="has-text-align-center copyright has-tertiary-color has-text-color has-small-font-size">Copyright © 2022 <a href="https://xideathemes.com" target="_blank" rel="noreferrer noopener">Xidea Themes</a></p>
					<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->',
);
