<?php get_header(); ?>
page
	<div id="content" class="clearfix container1160 mb_80">
		<div id="main" role="main">
			<header>
				<div class="page-header page-header-series">
					<div class="container container1160">
						<div class="row">
							<div class="col-sm-12 nomargin">
								<div class="button_back"><</div>
								<div class="small_titles"><a href="<?php echo site_url(); ?>/series">back</a></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<section class="clearfix mb_80 mt_32">
					<div class="container container620">
						<div class="row">
							<div class="blog_title text_indent col-sm-12 mb_25 clearfix">
								<h3 class="nomargin"><?php the_title(); ?></h3>
							</div>
							<div class="text_big col-sm-12 clearfix"><?php the_excerpt(); ?></div>
						</div>
					</div>
				</section>
			</article>
			<?php endwhile; ?>
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