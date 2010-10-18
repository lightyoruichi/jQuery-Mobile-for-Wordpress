<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation">
					<fieldset class="ui-grid-a">
						<div class="ui-block-a"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?>&nbsp;</div>
						<div class="ui-block-b" style="text-align: right;"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
					</fieldset>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<ul data-role="listview" data-theme="d" data-inset="true">
						<li>Posted on <?php the_time('d.m.Y'); ?></li>
					</ul>

					<?php the_content(); ?>

				</div><!-- #post-## -->

				<div id="nav-above" class="navigation">
					<fieldset class="ui-grid-a">
						<div class="ui-block-a"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?>&nbsp;</div>
						<div class="ui-block-b" style="text-align: right;"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
					</fieldset>
				</div><!-- #nav-above -->
				
				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
