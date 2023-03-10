<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<div class="singlepage__container"><!---- singlepage__container --->
	
	<main id="content" <?php post_class( 'site-main' ); ?> role="main">
		<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
			<header class="page-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		<?php endif; ?>
		<div class="page-content">
			<?php the_content(); ?>

			<div class="post-tags">
				<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>

		
	</main>
	

</div>

	<?php
endwhile;
