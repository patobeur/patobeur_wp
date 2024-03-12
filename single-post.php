<?php get_header(); // Appelle le fichier header.php ?>

<div class="hero post">
		<div class="logo logo-hero">
			<?php patobeur_get_logo(); ?>
		</div>
        <h1 class="hero-title">atelier muca</h1>
        <?php the_title( '<h2 class="hero-stitle">', '</h2>' ); ?>
</div>

<div id="content" class="site-content">
    <?php
    // Démarre la boucle WordPress
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
            // Affiche le titre du post
            the_title( '<h2 class="entry-title">', '</h2>' );
            ?>
        </header><!-- .entry-header -->
        
        <div class="entry-content">
            <?php
            // Affiche le contenu du post
            the_content();
            
            // Pagination dans le cas où le post est divisé en plusieurs pages
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->
        
        <footer class="entry-footer">
            <?php
            // Affiche la métadonnée du post (catégorie, tags, etc.)
            // Exemple simple; peut être étendu selon les besoins
            echo '<span class="posted-in">Catégorie: ' . get_the_category_list( ', ' ) . '</span></br>';
            echo '<span class="tagged-in">tags: ' . get_the_tag_list( '', ', ' ) . '</span>';
            ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
    
    <?php
    // Commentaires
    // if ( comments_open() || get_comments_number() ) :
    //     comments_template();
    // endif;
    
    endwhile; else :
        // Si aucun post n'est trouvé, inclure le template pour aucun post trouvé
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</div><!-- #content -->

<?php // get_sidebar(); Appelle le fichier sidebar.php ?>
<?php get_footer(); // Appelle le fichier footer.php ?>
