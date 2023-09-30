<?php
/**
 * Title: Hero Section 2
 * Slug: marenda/hero-section-2
 * Categories: featured
 */
?>
<!-- wp:group {"tagName":"section","align":"wide","layout":{"type":"default"}} -->
<section class="wp-block-group alignwide" id="hero-section">
    <!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-2.jpg' ); ?>","id":2870,"dimRatio":80,"minHeight":600,"minHeightUnit":"px""gradient":"vertical-lightbg-to-foreground","contentPosition":"center center","isDark":false,"align":"wide","style":{"spacing":{"padding":{"bottom":"0"}},"color":{"duotone":"var:preset|duotone|dark-grayscale"}},"layout":{"type":"default"}} -->
    <div class="wp-block-cover alignwide is-light" style="padding-bottom:0;min-height:600px">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient has-vertical-lightbg-to-foreground-gradient-background"></span><img
                class="wp-block-cover__image-background wp-image-2870" alt=""
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-2.jpg' ); ?>"
                data-object-fit="cover"/>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
                <div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-bottom:0">
                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                        <div class="wp-block-group">
                            <!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"5rem"}},"textColor":"lightbg","fontFamily":"roboto"} -->
                            <h1 class="wp-block-heading has-lightbg-color has-text-color has-roboto-font-family"
                                style="font-size:5rem">Discover the freedom </h1>
                            <!-- /wp:heading -->

                            <!-- wp:heading {"level":1,"textColor":"lightbg","fontFamily":"roboto"} -->
                            <h1 class="wp-block-heading has-lightbg-color has-text-color has-roboto-font-family">with
                                FSE</h1>
                            <!-- /wp:heading --></div>
                        <!-- /wp:group --></div>
                    <!-- /wp:column --></div>
                <!-- /wp:columns --></div>
            <!-- /wp:group --></div>
    </div>
    <!-- /wp:cover --></section>
<!-- /wp:group -->
