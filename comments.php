<?php
if ( post_password_required() ) {
	return;
}
?>
<a name="commentBox">
<div id="comments" class="comments-area mb_80">
	
		<div class="comments-header">
			<div class="comments-amount">
				<div class="box">
					<div class="amount">
						<?php echo get_comments_number(); ?>
					</div>

				</div>
				<div class="label">
					Comments
				</div>
			</div>
			<div class="comment-reply">
				
				<button class="btn btn-primary comment-reply-button" type="button" data-toggle="collapse" data-target="#collapseComments" aria-expanded="false" aria-controls="collapseComments">
					Write comment
				</button>
			</div>
		</div>
		<?php if ( have_comments() ) : ?>
		<div class="comments">
			<?php
			$args = array("post_id" => $post->ID);
			$comments = get_comments( $args );

			foreach($comments as $comment) {
			?>

				<div class="comment">
					<div class="comment-time"><?php echo Date('d.m.Y, h:m a', strtotime($comment->comment_date)) ?></div>
					<div class="comment-author"><?php echo $comment->comment_author ?></div>
					<div class="comment-body"><?php echo $comment->comment_content ?></div>
				</div>
			<?php
				}
			?>

		</div>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>
	<div class="comment-form collapse" id="collapseComments">
		<?php comment_form(); ?>
	</div>
</div>
