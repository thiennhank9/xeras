<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$porto_woo_version = porto_get_woo_version_number();

?>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">

        <?php wc_print_notices(); ?>

        <form method="post" class="lost_reset_password featured-box align-left">

            <div class="box-content">

                <?php if( 'lost_password' == $args['form'] ) : ?>

                    <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

                    <p class="form-row form-row-wide"><label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="user_login" id="user_login" /></p>

                <?php else : ?>

                    <p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>

                    <p class="form-row form-row-first">
                        <label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="password" class="input-text" name="password_1" id="password_1" />
                    </p>
                    <p class="form-row form-row-last">
                        <label for="password_2"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="password" class="input-text" name="password_2" id="password_2" />
                    </p>

                    <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
                    <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

                <?php endif; ?>

                <div class="clear"></div>

                <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                <p class="form-row clearfix">
                    <?php if (('lost_password') == $args['form']) : ?>
                        <a class="pt-left back-login" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ) ?>"><?php _e('Click here to login', 'woocommerce') ?></a>
                    <?php endif; ?>
                    <?php if ( version_compare($porto_woo_version, '2.3', '<') ) : ?>
                        <input type="submit" class="button btn-lg pt-right" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" />
                    <?php else : ?>
                        <input type="hidden" name="wc_reset_password" value="true" />
                        <input type="submit" class="button btn-lg pt-right" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" />
                    <?php endif; ?>
                </p>

                <?php wp_nonce_field( $args['form'] ); ?>
            </div>

        </form>

    </div>
</div>