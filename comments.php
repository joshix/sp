<?php // Do not delete these lines
if ( ! defined('HABARI_PATH' ) ) { die( 'Not labeled for individual sale.' ); }
?>
<?php if ( Session::has_messages() ) {
		Session::messages_out();
	}
?>
<?php if(!$post->info->comments_disabled || $post->comments->approved->count > 0) : ?>
<div id="comments">
	<h4 class="comments-heading"><?php echo $post->comments->moderated->count; ?> <?php echo _n( 'Comment', 'Comments', $post->comments->moderated->count, 'sp' ); ?> <?php _e( 'on', 'sp' ); ?> <em><?php echo $post->title; ?></em></h4>
	<ol id="comment-list" class="comments">

		<?php
		if ( $post->comments->moderated->count ) :
			foreach ( $post->comments->moderated as $comment ) :
				$class = 'class="comment';
				if ( $comment->status == Comment::STATUS_UNAPPROVED )
					$class .= '-unapproved';
				$class .= '"';
		?>
		
		<li id="comment-<?php echo $comment->id; ?>" <?php echo $class; ?>>
			<div class="comment-content">
			<?php echo $comment->content_out; ?>
			</div>
			<div class="comment-meta">
				<span class="comment-author"><a href="<?php echo $comment->url; ?>"><?php echo $comment->name; ?></a></span> - 
				<span class="comment-date"><a href="#comment-<?php echo $comment->id; ?>" title="<?php $comment->date->out('c') ?>"><?php $comment->date->out(); ?></a></span><?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?> <h5><em><?php _e( 'In moderation', 'sp' ); ?></em></h5><?php endif; ?>
			</div>
		</li>

		<?php endforeach; ?>

		<?php elseif(!$post->info->comments_disabled) : ?>
			<li><?php _e( 'There are currently no comments.',  'sp' ); ?></li>
		<?php endif; ?>

	</ol>
<?php if ( !$post->info->comments_disabled ) :
	$post->comment_form()->out();
elseif($post->comments->approved->count > 0) : ?> 
	<div id="comments-closed">
		<p><?php _e( 'Comments closed.', 'sp' ); ?></p>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
