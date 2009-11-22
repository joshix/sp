<?php $theme->display ( 'header' ); ?>
	<div id="content">
		<div id="primarycontent" class="hfeed">
			<!--begin loop-->
			<?php foreach ( $posts as $post ) : ?>
				<div id="post-<?php echo $post->id; ?>" class="hentry">
<?php include 'entryhead.php'; ?>
					<div class="entry-content">
						<?php echo $post->content_out; ?>
					</div>
<?php include 'entrymeta.php'; ?>
				</div><!--#post-num .hentry-->
			<?php endforeach; ?>
			<!--end loop-->
				<div id="pagenav" class="navigation">
					<?php $theme->prev_page_link( '&laquo; ' . _t( 'Newer', 'sp' ) ); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link( _t( 'Older', 'sp' ) . ' &raquo; ' ); ?>
				</div>
		</div><!--#primarycontent-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div><!--#content-->
	<?php $theme->display ( 'footer' ); ?>