<?php get_header(); ?>

<div class="hero home">
	<div class="logo logo-hero">
		<?php patobeur_get_logo(); ?>
	</div>
	<p>atelier muca</p>
	<p>home : les actualités</p>
</div>

<div id="articles" class="site-content">
	<?php if (have_posts()) : ?>
		<div class="row">
			<?php while (have_posts()) : the_post() ?>
				<div class="col">
					<div class="card">
						<div class="card-body">
							<?php the_post_thumbnail('medium', [
								'class' => 'card-img-top',
								'alt' => '',
								'style' => 'height:auto;'
							]) ?>
							<h5 class="card-title"><?php the_title() ?></h5>
							<p class="card-cat">catégorie : <?php the_category('a') ?></p>
							<p class="card-text">
								<?php // the_content('en voir plus')
								the_excerpt() ?>
							</p>
							<p>par : <?php the_author() ?>, le <?php the_date() ?></p>
							<a href="<?php the_permalink() ?>" class="card-link">Lire l'article.</a>
						</div>
					</div>
				</div>
			<?php endwhile ?>

		</div>

	<?php else : ?>
		<h1>pas d'articles</h1>
	<?php endif; ?>
</div>
<?php get_footer(); ?>