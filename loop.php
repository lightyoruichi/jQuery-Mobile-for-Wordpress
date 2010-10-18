<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage jQuery Mobile Theme
 * @since jQM for Wordpress 0.1
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
<?php endif; ?>
	
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer Posts &rarr;', 'twentyten' ) ); ?></div>
	<?php endif; ?>

	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
		<li data-role="list-divider">Last Posts</li>
<?php while ( have_posts() ) : the_post(); ?>
		<li><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
		
		<?php /* TODO: Fehler beim Ausgeben der Kategorien, es fehlt immer die erste */ ?>
		
		<?php if ( count( get_the_category() ) ) : ?>
			<?php printf( __( '<a href="http://localhost/" rel="category">Programming</a><span class="%1$s">Abgelegt unter:</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
		<?php endif; ?>
		<?php
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ):
		?>
			<?php printf( __( 'Schlagworte: %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
		<?php endif; ?>
		</li>
<?php endwhile; // End the loop. Whew. ?>
	</ul>
	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '&larr; Older Posts', 'twentyten' ) ); ?></div>
	<?php endif; ?>
