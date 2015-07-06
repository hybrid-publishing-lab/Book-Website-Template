<div class="col-xs-12 mt_20">
	<?php
		$frontpageId = get_option('page_on_front');
		$moreInfo = get_field('link_to_more_info', $frontpageId);
		if (!empty($moreInfo)) { ?>
			<a href="<?php echo $moreInfo; ?>" class="btn btn-primary standard-button">More info</a>
	<?php
		}
	?>
	<?php
		$getCopy = get_field('get_a_copy', $frontpageId);
		if (!empty($getCopy)) { ?>
			<a href="<?php echo $getCopy; ?>" class="btn btn-primary standard-button">Get a copy</a>
	<?php
		}
	?>
</div>