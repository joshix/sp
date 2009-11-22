	<!--begin footer-->
	<div id="footer" class="clear">
	<p><a href="<?php Site::out_url( 'habari' ); ?>" rel="home" title="<?php _e( 'Top', 'sp' ); ?>"><?php Options::out( 'title' ); ?></a></p>
	<ul>
		<li><a href="http://www.habariproject.org/" title="<?php _e( 'Habari Engine', 'sp' ); ?>">Habari</a> | 
			<span id="vcard-sp" class="vcard">
				<a class="url fn" rel="follow designer" title="<?php _e( 'sp Style', 'sp' ); ?>" href="http://labs.utopian.net/habari/theme/sp/">sp</a> 
<span class="hidden"><?php _e( 'from', 'sp' ); ?> <span class="org">Utopian.net Labs</span></span>
			</span>
		</li>
	</ul>
	<?php $theme->footer(); ?>
	</div><!--#footer-->
	<?php //$theme->display( 'db_profiling' ); ?>
</div><!--#wrapper-->
</body>
</html>
