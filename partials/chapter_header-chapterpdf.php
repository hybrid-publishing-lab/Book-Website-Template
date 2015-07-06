<div class="page-header page-header-blog chapter-header-blog">
	<div class="container container1160">
		<div class="row">
			<div class="row blog-detail-title-line col-xs-12">
				<div class="backButtonBlock col-xs-2 col-sm-2 col-md-2">
					<div class="backButton">
						<a href="<?php echo site_url(); ?>/blog" class="goBack">
							<i class="fa fa-chevron-left button_back"> </i>
						</a>
					</div>
					<div class="small_titles"><a href="<?php echo site_url(); ?>/blog" class="goBack">back</a></div>
				</div>
				<div class="blog-entry-title-line col-xs-10 col-sm-6 col-md-6">
					<div class="entry-title"><?php echo (strlen(the_title('','',FALSE))> 120) ? substr(the_title('', '', FALSE), 0, 117)." ..." : the_title('', '', FALSE); ?></div>
				</div>
				<div class="blog-entry-title-line-buttons col-xs-12 col-sm-4 col-md-4" >
					<div class="col-xs-6 col-sm-6 col-xs-offset-6">
						<?php if(get_field('chapter_pdf')) : ?>
						<a href="<?php echo get_field('chapter_pdf')?>" class="more_info" target="_blank">
							<button class="btn-openaccess">PDF</button>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
