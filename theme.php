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

	public function action_init_theme()
	{
		$this->load_text_domain( 'sp' );

		// Apply Format::autop() to comment content.
		Format::apply( 'autop', 'comment_content_out' );
		// Apply Format::tag_and_list() to post tags...
		Format::apply( 'tag_and_list', 'post_tags_out' );
		// Only triggered by <!--more--> tag, not by length.
		Format::apply_with_hook_params( 'more', 'post_content_out', _t( '--More--', 'sp' ), 0, 0 );
		// Excerpt output. echo $post->content_excerpt.
		Format::apply_with_hook_params( 'more', 'post_content_excerpt', _t( '--More--', 'sp' ), 60, 1 );	
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

		// Pretty tag names including spaces. In lieu of a Controller::get_var('tag_display').
		if ( Controller::get_var( 'tag' ) != '' ) {
			$hv = ( count( $this->handler_vars ) != 0 ) ? $this->handler_vars : Controller::get_handler()->handler_vars;
			// posts[]->tags[tagth]'s representation preserves spaces. (?)
			$tag_display = ( count( $this->posts ) > 0 ) ? $this->posts[0]->tags[$hv['tag']] : $hv['tag'];
			$this->assign( 'tag_display', htmlentities( $tag_display, ENT_QUOTES, 'UTF-8' ) );
		}

		parent::add_template_vars();
	}

	// Hook header output to insert meta robots directives.
	public function filter_theme_call_header( $return, $theme )
	{
		if ( $this->request->display_search ) {
			return '<meta name="robots" content="noindex, nofollow">'."\n";
		}
		elseif ( $this->request->display_entries_by_date || $this->request->display_entries_by_tag ) {
			return '<meta name="robots" content="noindex, follow">'."\n";
		}
		return $return;
	}

	public function theme_title( $theme )
	{
		$title = '';

		$hv = ( count( $this->handler_vars ) != 0 ) ? $this->handler_vars : Controller::get_handler()->handler_vars;
		$stitle = Options::get( 'title' );
		if ( $this->request->display_entries_by_date && count( $hv ) > 0 ) {
			$date = '';
			$date .= isset( $hv['year'] ) ? $hv['year'] : '';
			$date .= isset( $hv['month'] ) ? '-' . $hv['month'] : '';
			$date .= isset( $hv['day'] ) ? '-' . $hv['day'] : '';
			$title = $date . ' - ' . $stitle;
		}
		elseif ( $this->request->display_entries_by_tag && isset( $hv['tag'] ) ) {
			$title = $this->tag_display . ' - ' . $stitle;
		}
		elseif ( ( $this->request->display_entry || $this->request->display_page ) && isset( $this->posts ) ) {
			$title = strip_tags( $this->posts->title ) . ' - ' . $stitle;
		}
		elseif ( $this->request->display_search ) {
			// Set title to the search criteria, or to EMPTY if there were none.
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
			$date .= isset( $hv['year'] ) ? $hv['year'] : '';
			$date .= isset( $hv['month'] ) ? '-' . $hv['month'] : '';
			$date .= isset( $hv['day'] ) ? '-' . $hv['day'] : '';
			$heading = _t( 'Dated ', 'sp' ) . $date;
		}
		return $heading;
	}

	// Customize comment formui. Add fieldsets.
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

		$form->append( 'fieldset', 'contentbox', _t( 'Comment', 'sp' ) );
		$form->move_before( $form->contentbox, $form->content );

		$form->content->move_into( $form->contentbox );
		$form->content->caption = _t( '(Required)', 'sp' );

		$form->submit->caption = _t( 'Submit', 'sp' );
	}

}

?>
