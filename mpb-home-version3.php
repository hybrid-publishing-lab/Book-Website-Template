<?php
/*
Template Name: Home Version 3
*/
?>

<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php
				$pageId = $post->ID;
			?>
			<div class="row">
				
				<?php if( $posts ): ?>
					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<?php $image = get_field('book_cover_big'); ?>
						<div id="homeTeaser" style="background: <?php the_field('teaser_background_color');?> url('<?php if( !empty($image) ): endif; echo $image['url']; ?>') no-repeat center center;background-size: cover;" class="container1160 mt_20">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div id="homeTeaserText" class="col-md-12 clearfix">
											<div class="row">
												<div class="col-sm-12 col-xs-12" style="overflow:hidden;">
													<div class="big_teaser_box">
														<div class="vertical-center-outer">
															<div class="vertical-center">
																<div class="big_teaser_type <?php echo banner_class(get_field('banner_textcolor')); ?>">
																	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
																		<?php echo get_field('banner_keywords')?>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				<div id="content" class="clearfix container">
					<div class="container container1160 homePage">
						<div class="col-sx-12 col-md-8">
							<h2><?php the_title(); ?></h2>
							<div class="content homeContent">
								<?php the_content(); ?>
							</div>
							<div class="row">
								<?php require_once('partials/more_links.php'); ?>
							</div>
						</div>
						<div class="col-sx-12 col-md-4">
							<div class="authorsBox">
								<div class="row">
									<?php
										$args=array(
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
										while ($query->have_posts() ) :
										$query->the_post();
										setup_postdata($post); 
										$tags = get_the_terms( $id, 'person-tags');
											if (is_array($tags)){
												$values = array_map(function($tag) { return "<li class=\"filter personTag\" data-filter=\".".custom_tag_escape($tag->slug)."\" ><span><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></span></li>"; }, $tags);
												$taglist = implode("",$values);
												$persontags = array_map(function($tag) { return $tag->slug; }, $tags);
											} else {
												$taglist = "<li class=\"filter personTag\" data-filter=\".".$tag->slug."\" ><a href=\"".get_site_url()."/authors/?person-tag=".$tag->slug."\">".maxLength($tag->name,22)."</a></li>";
												$persontags = array($tag->slug);
											}
										?>
										<div class="col-xs-12">
											<div class="mb_15 person-box">	
												<div class="author_image_sm">
													<a href="<?php the_permalink() ?>" >
													<?php the_post_thumbnail( 'people-thumb-sm' ); ?>
													</a>
												</div>
												<div class="author_info">
													<p><a href="<?php the_permalink() ?>" class="more-person"><?php the_title() ?></a></p>
													<ul class="subinfo_author"><?php echo $taglist; //the_tags('', '<br />','' ); ?></ul>
												</div>
											</div>
											<?php if(get_field('quote')) : ?>
											<div class="quote_author col-md-12" style="background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/quote.png)">
											<p>
												<?php the_field('quote')?>
											</p>
											</div>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
									<?php 
										wp_reset_postdata();
									?>
								</div>
								<?php
									$projectLogo = get_field('project_owner', $pageId);
									if(!empty($projectLogo)){
								?>
								<div class="project-owner">
									<div class="project-owner-title">
										Ein Projekt von
									</div>
									<div class="project-owner-logo">
										<?php echo "<img src=\"".$projectLogo['sizes']['thumbnail']."\" width=\"\" height=\"\" alt=\"".$projectLogo['title']."\" >"; ?>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
					</div>
					<?php 
						$args = array(
							'post_type'			=> 'chapters',
							'posts_per_page'	=> -1,
							'post_status'		=> 'publish',
							'suppress_filters'	=> true 
						);
						$chapters = get_posts( $args );
						
						$tree = chapter_tree($chapters);

						if(count($tree)>0){
					?>
					<div class="container container1160 chapterContainer">
						<div class="blogRow">
							<div class="col-comments col-sx-12 col-md-2">
								&nbsp;
							</div>
							<div class="col-sx-12 col-md-10">
								<h2>Chapter</h2>
							</div>
							<div class="clearfix"></div>
						</div>
						<?php
							foreach ($tree as $chapter){
								$subchapter = sub_chapters($chapter);
						?>
							<div class="blogRow parentChapter">
								<div class="col-comments col-sx-12 col-md-2">
									&nbsp;
								</div>
								<div class="col-sx-12 col-md-10 chapterTitle">
									<?php echo $chapter->post_title; ?>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php
								foreach($subchapter[0] as $sub){
									$chapterline = get_field('chapter_line', $sub->ID);
							?>
									<div class="blogRow subChapter">
										<div class="col-comments col-sx-12 col-md-2">
											<?php echo ($sub->comment_count > 0) ? $sub->comment_count." Comments" : ""; ?>
										</div>
										<div class="col-chapter-title col-sx-12 col-md-10">
											<?php
												echo (!empty($chapterline)) ? $chapterline : $sub->post_title;
											?>
										</div>
										<div class="clearfix"></div>
									</div>
							<?php
								}
							?>
						<?php
							}
						?>
						<div class="clearfix"></div>
						
					</div>
					<?php
						}
					?>
					<!-- News begin -->
					<?php
						$ids = get_field('post', false, false);
						$the_query = new WP_Query(array(
							'post_type'			=> 'post',
							'post__in'			=> $ids ,
						));
						$news = $the_query->post_count;
	
					if(count($news)>0) {
					?>
					<div class="container-fluid clearfix">
						<section id="news" class="section news_home container1160">
							<div class="container1160">
								<div class="container">
									<div class="row">
										<div class="col-md-12 clearfix">
											<h2>News</h2>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 clearfix">
											<div id="news_carousel" class="slick-slider-container">
												<div class="row newsRow">
													<div class="slider">
													<?php 
														while ( $the_query->have_posts() ) : 
															$the_query->the_post();
															?>		
															<div class="col-xs-4 news-item">
																<div class="box news-box">
																	<div class="news-item-content">
																		<?php if(has_post_thumbnail()) { ?>
																			<div class="col-xs-12 item-image">
																				<?php the_post_thumbnail('medium'); ?>
																			</div>
																		<?php } ?>
																		<div class="item-content">
																			<div class="news-title">
																				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
																				<?php the_title(); ?>
																				</a>
																			</div>
																			<div class="news-content">
																			<?php //the_content('...', false); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<?php
														endwhile;
														wp_reset_postdata();
													?>
													</div>
												</div>
												<?php if($news > 3){ ?>
												<div class="carousel-nav mb_40 clearfix">
													<div id="featured_news_prev" class="carousel-control left">
														<div class="carousel-control-icon"><i class="fa fa-chevron-left"> </i></div>
													</div>
													<div id="featured_news_next" class="carousel-control right">
														<div class="carousel-control-icon"><i class="fa fa-chevron-right"> </i></div>
													</div>
												</div>
												<?php } ?>
												<div class="loadMore">
													<div class="button">
														<a href="<?php echo get_site_url()."/blog"; ?>">Project blog</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>





					
				<?php
					}
				?>
			</div>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<script type='text/javascript'>
		jQuery(document).ready(function($) {
			
			$('#news_carousel .slider').slick({
				infinite: true,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 3,
				arrows: false,
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 980,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			});

			$('#news_carousel .carousel-control.left').click(function(){
				$("#news_carousel .row").children(".slider").slickPrev();
			});

			$('#news_carousel .carousel-control.right').click(function(){
				$("#news_carousel .row").children(".slider").slickNext();
			});

		});
		</script>

<?php get_footer(); ?>