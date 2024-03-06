<?php
/**
 * Template part for displaying single post for standard style.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maxcoach
 * @since   1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-wrapper' ); ?>>

		<h2 class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></h2>

		<div class="entry-header">
			<?php Maxcoach_Post::instance()->entry_feature(); ?>

			<?php Maxcoach_Post::instance()->entry_categories(); ?>

			<?php if ( '1' === Maxcoach::setting( 'single_post_title_enable' ) ) : ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/blog-single/meta' ); ?>
		</div>

		<div class="entry-content">
			<?php
			the_content( sprintf( /* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'maxcoach' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

			Maxcoach_Templates::page_links();
			?>
		</div>

		<div class="entry-footer">
			<div class="row row-xs-center">
				<div class="col-md-6">
					<?php Maxcoach_Post::instance()->entry_tags(); ?>
				</div>
				<div class="col-md-6">
					<?php Maxcoach_Post::instance()->entry_share(); ?>
				</div>
			</div>
		</div>

	</article>
<?php
$author_desc = get_the_author_meta( 'description' );
if ( '1' === Maxcoach::setting( 'single_post_author_box_enable' ) && ! empty( $author_desc ) ) {
	Maxcoach_Templates::post_author();
}

if ( '1' === Maxcoach::setting( 'single_post_pagination_enable' ) ) {
	Maxcoach_Post::instance()->nav_page_links();
}

if ( Maxcoach::setting( 'single_post_related_enable' ) ) {
	get_template_part( 'template-parts/blog-single/content-related-posts' );
}

// If comments are open or we have at least one comment, load up the comment template.
if ( '1' === Maxcoach::setting( 'single_post_comment_enable' ) && ( comments_open() || get_comments_number() ) ) :
	comments_template();
endif;
