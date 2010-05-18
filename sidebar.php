	<div id="secondarycontent">

	<?php $theme->display ( 'searchform' ); ?>

	<?php $theme->area( 'sidebar' ); ?>

	<h3 id="rss"><a href="<?php URL::out( 'atom_feed', array( 'index' => '1' ) ); ?>"><?php _e( 'Syndicate (Atom)', 'sp' ); ?></a></h3>

	</div><!--#secondarycontent-->
