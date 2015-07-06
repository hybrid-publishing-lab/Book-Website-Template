<?php
/*
Template Name: Authors
*/
?>
<?php get_header(); ?>
	<div id="content" class="clearfix container1160 peopleContainer">
		<div id="main" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					// Display all people when acf roles is not set
					// $roles = get_field('roles');
					// if (!empty($roles)){
					// 	$terms = get_field('roles')->name;
					// } else {
					// 	$terms = array_map(function($term){ return $term->slug; }, get_terms('role'));
					// }
					$terms = get_field('roles')->name;
					$args = array(
						'post_type' => 'people',
						'tax_query' => array(
							array(
								'taxonomy' => 'role',
								'field' => 'slug',
								'terms' => 'author',
							)
						)
					);
					$query = new WP_Query( $args );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					<header>
						<div class="page-header">
							<div class="container container620">
								<div class="row">
									<div class="col-sm-12">
										<?php 
										if($query->post_count > 1) {
												echo "<div class=\"authorsTitle\">Authors</div>";
												echo "<div class=\"authorsList\">";
												$separator = '<span class="separator"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"><g><title/><ellipse ry="2" rx="2" cy="4" cx="4" stroke-width="0" stroke="#000000" fill="#000000"/></g></svg></span>';
												$authors = [];
												while ( $query->have_posts() ) {
													$query->the_post();
													array_push($authors, get_the_title());
												}
												echo implode($separator,$authors);
												//echo "</ul>";
												echo "</div>";
											} else {
												echo "<h1>Author</h1>";
												//echo "<h1>".get_the_title()."</h1>";
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<?php wp_reset_query(); ?>
					</header>
					<section class="clearfix">
						<div class="container container620">
							<div class="row">
								<div class="col-sm-12">
									<h3><?php the_content(); ?></h3>
								</div>
							</div>
						</div>
					</section>
					<section class="clearfix mb_80">
						<div class="container container620">
							<div class="row">
								<?php
									while ($query->have_posts() ) :
									$query->the_post();
								?>
								<div class="col-sm-12 mt_50">
									<div class="bg_image mb_30">
										<?php the_post_thumbnail( 'people-thumb-md' ); ?>
									</div>			
									<h3 class="mt_30 mb_30 text_indent">
										<?php the_title(); ?>
									</h3>	
									<div class="text_big clearfix">
										<?php the_content(); ?>
									</div>		
									<div class="row mt_15" style="overflow:hidden;">
										<?php if(get_field('social_link_1')) : ?>
											<div class="col-sm-12 text_indent">
													<a href="<?php echo get_field('social_link_1')?>" class="more_info" target="_blank"><?php echo get_field('social_label_1'); ?></a>
											</div>
										<?php endif; ?>
										<?php if(get_field('social_link_2')) : ?>
											<div class="col-sm-12 text_indent">
												<a href="<?php echo get_field('social_link_2')?>" class="more_info" target="_blank"><?php echo get_field('social_label_2'); ?></a>
											</div>
										<?php endif; ?>
										<?php if(get_field('social_link_3')) : ?>
											<div class="col-sm-12 text_indent">
												<a href="<?php echo get_field('social_link_3')?>" class="more_info" target="_blank"><?php echo get_field('social_label_3'); ?></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<?php
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</section>
					<footer>
						<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
					</footer>
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