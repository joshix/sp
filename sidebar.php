	<div id="secondarycontent">

	<?php $theme->display ( 'searchform' ); ?>

	<?php if( count( $pages ) > 0) : /* Requires support in $theme->add_template_vars(). */ ?>
		<h2 id="pagelist-title"><?php _e( 'Pages', 'sp' ); ?></h2>
		<ul id="pagelist">
		<?php if( Plugins::is_loaded( 'Page Menu' ) ) :
			$theme->pagemenu();
		else :
			foreach( $pages as $page )
				echo '<li><a href="' . $page->permalink . '" title="' . $page->title . '">' . $page->title . '</a></li>' . "\n";
		endif; ?>
		</ul>
	<?php endif; ?>

	<h3 id="rss"><a href="<?php URL::out( 'atom_feed', array( 'index' => '1' ) ); ?>"><?php _e( 'Syndicate (Atom)', 'sp' ); ?></a></h3>

	</div><!--#secondarycontent-->
