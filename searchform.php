<!-- searchform -->
<?php Plugins::act( 'theme_searchform_before' ); ?>
	<form method="get" id="searchform" action="<?php URL::out('display_search'); ?>">
		<p><input type="text" id="s" name="criteria" value="<?php if(isset($criteria)) echo htmlentities($criteria, ENT_COMPAT, 'UTF-8'); ?>"><br> <button type="submit" id="searchsubmit" class="submit button" value="<?php _e('Search', 'sp'); ?>"><?php _e('Search', 'sp'); ?></button></p>
	</form><br class="clear">
<?php Plugins::act( 'theme_searchform_after' ); ?>
<!-- /searchform -->
