<?php
/**
 * Title: Header With Centered Logo
 * Slug: xidea/header-with-centered-logo
 * Categories: header
 * Block Types: 'core/template-part/header'
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px","top":"20px","bottom":"20px"}}},"backgroundColor":"light","textColor":"text-regular","className":"border-bottom","layout":{"inherit":false}} -->
<div id="header"
     class="wp-block-group border-bottom has-text-regular-color has-light-background-color has-text-color has-background"
     style="padding-top:20px;padding-right:0px;padding-bottom:20px;padding-left:0px">
    <!-- wp:group {"className":"container"} -->
    <div id="header-bottom-area" class="wp-block-group container"><!-- wp:group {"className":"row"} -->
        <div class="wp-block-group row"><!-- wp:group {"className":"d-none d-lg-block col-3 align-self-center"} -->
            <div class="wp-block-group d-none d-lg-block col-3 align-self-center">
                <!-- wp:navigation {"textColor":"primary","overlayMenu":"never","style":{"spacing":{"blockGap":"0"}},"fontSize":"small"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"col-12 col-lg-6 mt-0"} -->
            <div class="wp-block-group col-12 col-lg-6 mt-0">
                <!-- wp:site-title {"level":4,"textAlign":"center"} /--></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"d-none d-lg-block col-3 mt-0 align-self-center","layout":{"type":"constrained"}} -->
            <div class="wp-block-group d-none d-lg-block col-3 mt-0 align-self-center"><!-- wp:paragraph {"align":"right"} -->
                <p class="has-text-align-right"><strong>Contact</strong>: <a href="#">mail@domain.com</a></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"col-12 col-lg-12 align-self-center","layout":{"inherit":true}} -->
            <div class="wp-block-group col-12 col-lg-12 align-self-center">
                <!-- wp:navigation {"textColor":"foreground","align":"full","layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"},"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"700"}}} /--></div>
            <!-- /wp:group --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->