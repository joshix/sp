<?php $theme->display ( 'header' ); ?>
	<div id="page">
	<div id="content">
		<div id="primarycontent" class="hfeed">
			<!--begin loop-->
				<div id="post-<?php echo $post->id; ?>" class="hentry">
						<h2 class="entry-title"><a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h2>
					<div class="entry-content">
						<?php echo $post->content_out; ?>
					</div>
					<div class="page-edit">
						<?php if ( $loggedin ) : ?>
						<a href="<?php echo $post->editlink; ?>" title="<?php _e( 'Edit post', 'sp' ); ?>"><?php _e( 'Edit', 'sp' ); ?></a>
						<?php endif; ?>
					</div>
				</div><!--#post-num .hentry-->	
			<!--end loop-->
			</div><!--#primarycontent-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div><!--#page-->
	</div><!--#content-->
	<?php $theme->display ( 'footer' ); ?>
