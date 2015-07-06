<?php get_header(); ?>
	<div id="content" class="clearfix container1160 mb_80 blogDetail">
		<div id="main" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header>
				<div class="page-header page-header-blog">
					<div class="container container1160">
						<div class="blog-detail-title-line">
							<div class="backButtonBlock">
								<div class="backButton">
									<a href="<?php echo site_url(); ?>/blog">
										<i class="fa fa-chevron-left button_back"> </i>
									</a>
								</div>
								<div class="small_titles"><a href="<?php echo site_url(); ?>/blog">back</a></div>
							</div>
							<div class="blog-entry-title-line">
								<div class="entry-title"><?php the_title(); ?></div>
								<div class="entry-info"><?php the_date('d.m.Y'); ?><?php //echo ", ".get_the_time(); ?></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<section class="clearfix mb_80 mt_32">
					<div class="container container620">
						<div class="row">
							<div class="text_big col-sm-12 clearfix"><?php the_content(); ?></div>
							<div class="col-sm-12 text_indent blog_meta">
								<div class="blog_posted mt_5">posted in <?php the_category( ' ' ); ?> <span class="disqus-comment-count" data-disqus-identifier="<?php echo $post->post_name; ?>-identifier"></span></div>
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
<?php get_footer(); ?>