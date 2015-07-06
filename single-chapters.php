<?php get_header(); ?>
	<div id="content" class="clearfix container1160 mb_80 chaptersContent" >
		<div id="main" role="main" style="height:100%;">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header>
				<?php require_once('partials/chapter_header-chapterpdf.php'); ?>
			</header>
			<div class="chapters-scroll">
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<section class="clearfix mb_80 mt_92">
						<div class="container container620">
							<div class="row">
								<div class="text_big col-sm-12 clearfix"><?php the_content(); ?></div>
								<div class="col-sm-12 text_indent blog_meta">
									&nbsp;
								</div>
							</div>
							<div id="commentLink">
								<div class="comments-amount">
									<div class="box">
										<div class="amount">
											<?php echo get_comments_number(); ?>
										</div>
									</div>
									<div class="label">
										<a href="#commentBox">Comments</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</article>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				echo "<div class=\"container container620\">";
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				echo "</div>";
				 endwhile; ?>
				<?php else : ?>
					<article id="post-not-found">
						<header>
							<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
						</header>
						<section class="post_content">
							<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
						</section>
						<footer>
						</footer>
					</article>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>