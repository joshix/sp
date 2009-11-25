<?php $theme->display ( 'header' ); ?>
	<div id="content">
<?php
	if ( Session::has_errors( 'expired_session' ) ) {
		echo '<div class="alert">' . Session::get_error( 'expired_session', false ) . '</div>';
	}
	if ( Session::has_errors( 'expired_form_submission' ) ) {
		echo '<div class="alert">' . Session::get_error( 'expired_form_submission', false ) . '</div><br>';
	}
?>
		<div id="primarycontent">
			<?php include 'loginform.php'; ?>
		</div>
		<?php $theme->display ( 'sidebar' ); ?>
	</div>
	<?php $theme->display ( 'footer' ); ?>
