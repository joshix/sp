<?php $theme->display ( 'header' ); ?>
	<div id="content">
		<div id="primarycontent" class="hfeed">
			<!--begin loop-->
			<h1 class="archive-title"><?php _e( 'Results for', 'sp' ); ?> &#8220;<span class="archive-subtitle"><?php echo $criteria; /* Should it use htmlspecialchars()? */ ?></span>&#8221;</h1>
		<?php if( isset( $post ) ) : ?>
			<?php foreach ( $posts as $post ) : ?>
				<div id="post-<?php echo $post->id; ?>" class="hentry">
<?php include 'entryhead.php'; ?>
					<div class="entry-content">
						<?php echo $post->content_excerpt; ?>
					</div>
<?php include 'entrymeta.php'; ?>
				</div><!--#page-num .hentry-->
			<?php endforeach; ?>
			<!--end loop-->
		<?php else : ?>
				<div class="post-notfound hentry">
					<p class="entry-content"><?php _e( 'No results for', 'sp' ); ?> <em><?php echo htmlspecialchars( $criteria ); ?></em>.</p>
				</div>
		<?php endif; ?>
			<div id="pagenav" class="navigation">
				<?php $theme->prev_page_link( '&laquo; ' . _t( 'Newer Results', 'sp' ) ); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link(_t( 'Older Results', 'sp' ) . ' &raquo; ' ); ?>
			</div>
		</div><!--#primarycontent-->
		<?php $theme->display ( 'sidebar' ); ?>
	</div><!--#content-->
	<?php $theme->display ( 'footer' ); ?>
