<?php $theme->display ( 'header' ); ?>
<!--begin content-->
	<div id="content">
		<!--begin primary content-->
		<div id="primarycontent" class="hfeed">
			<div class="hentry">
						<h2 class="entry-title"><?php _e( "Error 404: Not Found.", "sp"); ?></h2>
						<p class="entry-content"><?php _e( "URL does not exist on", "sp" ); ?>
						<a href="<?php Site::out_url( 'habari'); ?>" title="<?php Options::out( 'title' ); ?>" rel="home"> <?php Options::out( 'title' ); ?></a>.
						</p>
			</div>
	
					
			</div>
		<!--end primary content-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div>
	<!--end content-->
	<?php $theme->display ( 'footer' ); ?>
