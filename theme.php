<?php 

/**
 * SpTheme is a custom Theme class for the sp theme.
 * 
 * @package Habari
 */ 

define( 'THEME_CLASS', 'SpTheme' );

class SpTheme extends Theme
{
	private $handler_vars = array();

	/* Filter output on theme init. */
	public function action_init_theme()
	{
		$this->load_text_domain('sp');

		/* Apply Format::autop() to comment content. */
		Format::apply('autop', 'comment_content_out');
		/* Apply Format::tag_and_list() to post tags... */
		Format::apply('tag_and_list', 'post_tags_out');
		/* Only triggered by <!--more--> tag, not by length. */
		Format::apply_with_hook_params('more', 'post_content_out', _t('--More--', 'sp'), 0, 0);
		/* Excerpt output. echo $post->content_excerpt. */
		Format::apply_with_hook_params('more', 'post_content_excerpt', _t('--More--', 'sp'), 60, 1);	
	}

	/**
	 * Add additional template variables to the template output.
	 *
	 *  This function is executed *after* regular data is assigned to the template.
	 *  So the values here, unless checked, will overwrite any existing values.
	 */	 	 	 	 	
	public function add_template_vars() 
	{
		if ( !$this->template_engine->assigned( 'pages' ) ) {
			$this->assign( 'pages', Posts::get( array( 'content_type' => 'page', 'status' => Post::status( 'published' ) ) ) );
		}

		/* Pretty tag names incl. spaces */
		if ( Controller::get_var( 'tag' ) != '') {
			$tag_text = DB::get_value( 'SELECT term_display FROM {terms} WHERE term=:tag', array( Controller::get_var( 'tag' ) ) );
			$this->assign( 'tag_text', $tag_text );
		}

		parent::add_template_vars();
	}

	/* Hook header output to insert some meta robots directives. */
	public function filter_theme_call_header( $return, $theme )
	{
		$r = $this->request;
		if ( $r->display_search ) {
			return '<meta name="robots" content="noindex, nofollow">'."\n";
		}
		elseif ( $r->display_entries_by_date || $r->display_entries_by_tag ) {
			return '<meta name="robots" content="noindex, follow">'."\n";
		}
		return $return;
	}

	public function theme_title( $theme )
	{
		$title = '';

		$hv = ( count( $this->handler_vars ) != 0 ) ? $this->handler_vars : Controller::get_handler()->handler_vars;
		$r = $this->request;
		$stitle = Options::get( 'title' );
		$ps = $this->posts;
		if ( $r->display_entries_by_date && count( $hv ) > 0 ) {
			$date = '';
			$date .= isset( $hv['year'] ) ? $hv['year'] : '' ;
			$date .= isset( $hv['month'] ) ? '-' . $hv['month'] : '' ;
			$date .= isset( $hv['day'] ) ? '-' . $hv['day'] : '' ;
			$title = $date . ' - ' . $stitle;
		}
		elseif ( $r->display_entries_by_tag && isset( $hv['tag'] ) ) {
			$tag = ( count( $ps ) > 0 ) ? $ps[0]->tags[$hv['tag']] : $hv['tag'] ;
			$title = htmlspecialchars( $tag ) . ' - ' . $stitle;
		}
		elseif ( ( $r->display_entry || $r->display_page ) && isset( $ps ) ) {
			$title = strip_tags( $ps->title ) . ' - ' . $stitle;
		}
		elseif ( $r->display_search ) {
			/* Set title to the search criteria, or to EMPTY if there were none. */
			$q = Controller::get_var( 'criteria' );
			$title = ( $q != '' ) ? htmlspecialchars( $q ) . ' - ' . $stitle . _t( ' Search', 'sp' ) :
						sprintf( _t( 'Empty %1$s Search', 'sp' ), $stitle );
		}
		else {
			$title = $stitle;
		}
		if ( $this->page > 1 ) {
			$title .= _t( ' &rsaquo; Page ' ) . $this->page;
		}
		return $title;
	}

	public function theme_multiple_heading( $theme,$criteria )
	{
		$heading = '';

		$hv = ( count( $this->handler_vars ) != 0 ) ? $this->handler_vars : Controller::get_handler()->handler_vars;
		if ( $this->request->display_entries_by_date && count( $hv ) > 0 ) {
			$date = '';
			$date .= isset( $hv['year'] ) ? $hv['year'] : '' ;
			$date .= isset( $hv['month'] ) ? '-' . $hv['month'] : '' ;
			$date .= isset( $hv['day'] ) ? '-' . $hv['day'] : '' ;
			$heading = _t( 'Dated ', 'sp' ) . $date;
		}
		return $heading;
	}

	/* Customize comment formui. Add fieldsets. */
	public function action_form_comment($form)
	{
		$form->append( 'fieldset', 'commenterinfo', _t( 'About You', 'sp' ) );
		$form->move_before( $form->commenterinfo, $form->commenter );

		$form->commenter->move_into( $form->commenterinfo );
		$form->commenter->caption = _t( 'Name:', 'sp' ) . '<span class="required">' . ( Options::get('comments_require_id' ) == 1 ? ' *' . _t( 'Required', 'sp' ) : '' ) . '</span>';

		$form->email->move_into( $form->commenterinfo );
		$form->email->caption = _t( 'Email:', 'sp' ) . '<span class="required">' . ( Options::get('comments_require_id' ) == 1 ? ' *' . _t( 'Required - not published', 'sp' ) : '' ) . '</span>';

		$form->url->move_into( $form->commenterinfo );
		$form->url->caption = _t( 'URL:', 'sp' );

//		$form->append('static','disclaimer', _t('<p><em><small>Email address is not published</small></em></p>', 'sp'));
//		$form->disclaimer->move_into($form->commenterinfo);

		$form->append( 'fieldset', 'contentbox', _t( 'Comment', 'sp' ) );
		$form->move_before( $form->contentbox, $form->content );

		$form->content->move_into( $form->contentbox );
		$form->content->caption = _t( '(Required)', 'sp' );

		$form->submit->caption = _t( 'Submit', 'sp' );
	}

}

?>
