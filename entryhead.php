				<h2 class="entry-title"><a rel="bookmark" href="<?php echo $post->permalink ?>" title="<?php echo $post->title ?>"><?php echo $post->title_out ?></a></h2>
				<div class="posted">
					<span class="entry-author author vcard">
						<a class="fn url" href="<?php echo Site::get_url( 'habari' ) ?>"><?php echo $post->author->info->displayname ?></a>
					</span> &ndash; <abbr class="updated <?php echo $post->statusname; ?>" title="<?php $post->pubdate->out('c'); ?>"><?php $post->pubdate->out(); ?></abbr>
				</div>
