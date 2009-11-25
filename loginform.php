<?php if ( isset( $error ) ) : ?>
<p><?php _e( 'That login is incorrect.', 'sp' ); ?></p>
<?php endif; ?>
<?php if ( $loggedin ): ?>
<p>
	<?php _e( 'Logged in as', 'sp' ); ?> <a href="<?php URL::out( 'admin', 'page=user&user=' . $user->username ) ?>" title="<?php _e( 'Edit Your Profile', 'sp' ); ?>"><?php echo $user->username; ?></a> | 
	<a href="<?php Site::out_url( 'habari' ); ?>/user/logout"><?php _e( 'Log out', 'sp' ); ?></a>
</p>
<?php else:
?>
<?php Plugins::act( 'theme_loginform_before' ); ?>
<form method="post" action="<?php URL::out( 'user', array( 'page' => 'login' ) ); ?>">
	<p>
		<label for="habari_username"><small><strong><?php _e( 'Name:', 'sp' ); ?></strong></small></label>
		<input type="text" size="25" name="habari_username" id="habari_username">
	</p>
	<p>
		<label for="habari_password"><small><strong><?php _e( 'Password:', 'sp' ); ?></strong></small></label>
		<input type="password" size="25" name="habari_password" id="habari_password">
	</p>
	<?php Plugins::act( 'theme_loginform_controls' ); ?>
	<span>
		<button type="submit" class="submit button" value="<?php _e('Log in'); ?>"><?php _e('Log in'); ?></button>
	</span>
</form>
<?php Plugins::act( 'theme_loginform_after' ); 
endif;
?>
