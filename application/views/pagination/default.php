<div class="pager">
	<?php for ($i = $total_pages; $i > 0; $i--) { ?>
		<?php if ($i == $current_page) { ?>
			<div class="pager_item">
				<strong><?php echo $i; ?></strong>
			</div>
		<?php } else { ?>
			<?php if ($i == $total_pages || $i == 1 || ($i <= $current_page + 10 && $i >= $current_page - 10)) { ?>
				<?php if ($i == $current_page + 10 && $i + 1 < $total_pages) { ?>
					<div class="pager_item">
						...
					</div>
				<?php } ?>
				<a href="<?php echo $page->url($i); ?>">
					<div class="pager_item">
						<?php echo $i; ?>
					</div>
				</a>
				<?php if ($i == $current_page - 10 && $i - 1 > 1) { ?>
					<div class="pager_item">
						...
					</div>
				<?php } ?>				
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<div class="clear"></div>
</div>