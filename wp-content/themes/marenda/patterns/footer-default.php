<?php
/**
 * Title: Default Footer With Columns
 * Slug: xidea/footer-default
 * Categories: footer
 * Block Types: 'core/template-part/footer'
 */
?>
<!-- wp:group {"tagName":"footer","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<footer id="footer-default" class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","right":"0px","bottom":"50px","left":"0px"}}},"backgroundColor":"foreground","className":"border-top","layout":{"inherit":true,"type":"constrained"}} -->
    <div id="upper-footer" class="wp-block-group border-top has-foreground-background-color has-background" style="padding-top:30px;padding-right:0px;padding-bottom:50px;padding-left:0px"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
            <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:site-logo /-->

                <!-- wp:site-title {"level":6,"textAlign":"left","style":{"spacing":{"margin":{"right":"0px","bottom":"0px","left":"0px"}}}} /-->

                <!-- wp:paragraph {"align":"left","textColor":"tertiary"} -->
                <p class="has-text-align-left has-tertiary-color has-text-color">Societas is a block based Wordpress  theme.</p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                <h6>Contact Us</h6>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>​25000 Walnut,<br>Hill Ln undefined Lafayette,<br>California 55696</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>Tel:&nbsp;<strong>(111) 360 336 663</strong></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                <h6>Menu</h6>
                <!-- /wp:heading -->

                <!-- wp:navigation {"ref":1829,"textColor":"background","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"typography":{"lineHeight":"0","fontSize":"14px","fontStyle":"normal","fontWeight":"700"}}} /--></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                <h6>Social</h6>
                <!-- /wp:heading -->

                <!-- wp:social-links -->
                <ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
                <!-- /wp:social-links --></div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|secondary","width":"1px"}}},"backgroundColor":"foreground"} -->
    <div id="lower-footer" class="wp-block-group has-foreground-background-color has-background" style="border-top-color:var(--wp--preset--color--secondary);border-top-width:1px"><!-- wp:paragraph {"align":"center","textColor":"background","className":"copyright","fontSize":"small"} -->
        <p class="has-text-align-center copyright has-background-color has-text-color has-small-font-size">                     Copyright © 2022 <a rel="noreferrer noopener" href="https://xideathemes.com" target="_blank">Xidea Themes</a></p>
        <!-- /wp:paragraph --></div>
    <!-- /wp:group --></footer>
<!-- /wp:group -->