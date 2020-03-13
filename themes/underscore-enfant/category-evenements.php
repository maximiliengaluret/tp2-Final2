<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="mois">
				<h2 style='grid-area = 1/1'>Septembre</h2>
				<h2 style='grid-area = 1/2'>Octobre</h2>
				<h2 style='grid-area = 1/3'>Novembre</h2>

			</div>
             
            <div class="zeuGrille">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                $temp=get_the_date('m')-8;
                echo '<a href="'.get_post_permalink().'" style="grid-area: '.get_the_date('d') .'/'.$temp.'" >' . substr(get_the_title(),0,20) . ' ' . get_the_date('d m Y') . '</a>';
                

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
