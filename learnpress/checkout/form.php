<?php
/**
 * Template for displaying checkout form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/checkout/form.php.
 *
 * @author        ThimPress
 * @package       Learnpress/Templates
 * @version       4.0.1
 *
 * @theme-since   1.0.0
 * @theme-version 2.4.0
 */

defined( 'ABSPATH' ) || exit();

$checkout = LP()->checkout();

learn_press_print_messages();

if ( ! is_user_logged_in() ) {
	?>
	<div class="learn-press-message error">
		<?php esc_html_e( 'Please login to enroll the course!', 'maxcoach' ); ?>
	</div>
	<?php
}
?>
<form method="post" id="learn-press-checkout-form" name="learn-press-checkout-form"
      class="lp-checkout-form learn-press-checkout checkout<?php echo ! is_user_logged_in() ? " guest-checkout" : ""; ?>"
      tabindex="0"
      action="<?php echo esc_url( learn_press_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<?php
	if ( has_action( 'learn-press/before-checkout-form' ) ) {
		?>
		<div class="lp-checkout-form__before">
			<?php do_action( 'learn-press/before-checkout-form' ); ?>
		</div>
		<?php
	}

	do_action( 'learn-press/checkout-form' );

	if ( has_action( 'learn-press/after-checkout-form' ) ) {
		?>
		<div class="lp-checkout-form__after">
			<?php do_action( 'learn-press/after-checkout-form' ); ?>
		</div>
		<?php
	}
	?>
</form>
