<?php $theme->display ( 'header' ); ?>
	<div id="content">
		<div id="primarycontent" class="hfeed">
			<!--begin loop-->			
			<div id="post-<?php echo $post->id; ?>" class="hentry">
<?php include 'entryhead.php'; ?>
				<div class="entry-content">
					<?php echo $post->content_out; ?>
				</div>
<?php include 'entrymeta.php'; ?>
			</div><!--#post-num .hentry-->
			<!--end loop-->
			<?php $theme->display( 'comments' ); ?>
			<div id="postnav" class="navigation">
			<?php if ( $previous = $post->ascend() ) : ?>
				<span class="prev-entry-link"> &laquo; <a href="<?php echo $previous->permalink ?>" title="<?php echo $previous->slug ?>"><?php echo $previous->title ?></a></span>
			<?php endif; ?>
			<?php if ( $next = $post->descend() ) : ?>
				<span class="next-entry-link"><a href="<?php echo $next->permalink ?>" title="<?php echo $next->slug ?>"><?php echo $next->title ?></a> &raquo;</span>
			<?php endif; ?>
			</div><!--#postnav-->

		</div><!--#primarycontent-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div><!--#content-->
	<?php $theme->display ( 'footer' ); ?>