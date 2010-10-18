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
		<div class="navigation">
			<?php echo get_previous_posts_link(); ?>
		</div>
	<?php endif; ?>
	
	<a href="index.html" data-role="button" data-icon="arrow-l" data-iconpos="left">Newer Posts</a>

	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
		<li data-role="list-divider">Last Posts</li>
<?php while ( have_posts() ) : the_post(); ?>
		<li><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<br />
				Posted in: <?php the_category( ', ', 'multiple' , false ); ?> - Tagged: <?php the_tags( '', ', ', '' ); ?>
		</li>
<?php endwhile; // End the loop. Whew. ?>
	</ul>
	
	<a href="index.html" data-role="button" data-icon="arrow-r" data-iconpos="right">Older Posts</a>
