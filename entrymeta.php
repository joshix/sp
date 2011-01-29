					<ul class="entry-meta">

					<?php if ( count( $post->tags ) ) : ?>
						<li class="entry-tags"><?php _e( 'Tags:', 'sp' ); ?> <?php echo $post->tags_out; ?></li>
					<?php endif; ?>

					<?php if ( !$post->info->comments_disabled || $post->comments->approved->count > 0 ) : ?>
						<li class="commentslink">
							<a href="<?php echo $post->permalink; ?>#comments" title="<?php _e('Comments on this post'); ?>"><?php echo $post->comments->approved->count; ?> <?php echo _n( 'Comment', 'Comments', $post->comments->approved->count, 'sp' ); ?></a> &ndash; <a href="<?php echo $post->comment_feed_link; ?>"><?php _e( 'Feed', 'sp' ); ?></a>
						</li>
					<?php endif; ?>

					<?php if ( $loggedin ) : ?>
						<li><a href="<?php echo $post->editlink; ?>" title="<?php _e( 'Edit post', 'sp' ); ?>"><?php _e( 'Edit', 'sp' ); ?></a></li>
					<?php endif; ?>

					</ul>
