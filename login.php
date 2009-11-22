<?php $theme->display ( 'header' ); ?>
<!--begin content-->
	<div id="content">
<?php
	if( Session::has_errors( 'expired_session' ) )
		echo '<div class="alert">' . Session::get_error( 'expired_session', false ) . '</div>';
	if( Session::has_errors( 'expired_form_submission' ) )
		echo '<div class="alert">' . Session::get_error( 'expired_form_submission', false ) . '</div><br>';
?>
		<!--begin primary content-->
		<div id="primarycontent">
			<?php include 'loginform.php'; ?>
			</div>
		<!--end primary content-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div>
	<!--end content-->
	<?php $theme->display ( 'footer' ); ?>
