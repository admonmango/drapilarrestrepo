<<<<<<< HEAD
<?php
/**
 * The Template for displaying title in single event page.
 *
 * Override this template by copying it to yourtheme/wp-events-manager/loop/title.php
 *
 * @author        ThimPress, leehld
 * @package       WP-Events-Manager/Template
 * @version       2.1.7
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>
<?php if ( is_singular( 'tp_event' ) ): ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
<?php else: ?>
	<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
<?php endif; ?>
=======
<?php
/**
 * The Template for displaying title in single event page.
 *
 * Override this template by copying it to yourtheme/wp-events-manager/loop/title.php
 *
 * @author        ThimPress, leehld
 * @package       WP-Events-Manager/Template
 * @version       2.1.7
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>
<?php if ( is_singular( 'tp_event' ) ): ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
<?php else: ?>
	<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
<?php endif; ?>
>>>>>>> 1a644bfe9dc844465287f2437b851a458a7bd4c2
