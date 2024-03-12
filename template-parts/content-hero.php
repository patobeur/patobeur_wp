<?php 
    $custom_logo = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo , 'full' );
    $image_url = $image[0];
    $image_width = $image[1];
    $image_height = $image[2];
?>
<div class="hero">
		<div class="logo">
			<a href="#">
                <img src="<?= get_theme_mod( 'patobeur_theme_image' ) ?>" alt="" width="128px" height="auto">
			</a>
		</div>
        <p>atelier muca</p>
</div>