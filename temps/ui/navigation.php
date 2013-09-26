<?php
	if(isset($pagination)) :
		if($pagination->total_pages() > 1) :
			$nav_limit = 10; // number of boxes that may appear on the screen
			// CREATE URL
			if (strrpos($this_url, "?")) {
				if(!strrpos($this_url, "?page")) {
					if(!strrpos($this_url, "&page")) {
						$dest_url = $this_url . "&page=";
					} else {
						$pos = strrpos($this_url, "&page");
						$dest_url = substr($this_url, 0, $pos) . "&page=";
					}
				} else {
					$pos = strrpos($this_url, "?page");
					$dest_url = substr($this_url, 0, $pos) . "?page=";
				}
			} else {
				$dest_url = $this_url . "?page=";
			}
		?>
		<div class="pagination">
			<ul>
			<?php if($pagination->total_pages() > $nav_limit && $current_page >= 3) : // SET FIRST BUTTON IF NEEDED ?>
				<li class="page">
					<a href="<?php echo $dest_url; ?>1">&laquo; First</a>
				</li>
			<?php endif; ?>
			<?php
			// SET PREV BUTTON
			echo ($pagination->has_previous_page()) ? '<li class="prev"><a href="' . $dest_url . $pagination->previous_page() . '">&laquo; Previous </a></li>' : '<li class="prev disabled"><a href="#">&laquo; Previous </a></li>';
			$current_limit = $current_page + $nav_limit; // number of boxes that may appear on the screen
			
			// total pages equal to or less than 10
			if($pagination->total_pages() <= $nav_limit) {
				for($i=1; $i<= $pagination->total_pages(); $i++) {
					if($i === $current_page): ?>
						<li class="active">
							<a href="#"><?php echo $i; ?></a>
						</li>
					<?php else; ?>
						<li class="page">
							<a href="<?php echo $dest_url . $i; ?>"><?php echo $i; ?></a>
						</li>
					<?php endif;
				}
			} else { // total pages greater than 10
				$factor = floor($current_page/$nav_limit) * 10;
				if($current_page == $factor) { $factor = $factor - $nav_limit; }
				if($current_page > ($nav_limit)) : ?>
					<li class="page">
						<a href="<?php echo $dest_url . ($factor - 9); ?>"> ... </a>
					</li>
			<?php endif;
				for($i = 1; $i <= $nav_limit; $i++) {
					$index = $i + $factor;
					if($index === $current_page) : ?>
						<li class="active">
							<a href="#"><?php echo $index; ?></a>
						</li>
					<?php else: ?>
						<li class="page">
							<a href="<?php echo $dest_url . $index; ?>"><?php echo $index; ?></a>
						</li>
					<?php endif;
				}
				if($current_page <= ($pagination->total_pages() - $nav_limit)) : ?>
					<li class="page">
						<a href="<?php echo $dest_url . ($factor + 11); ?>"> ... </a>
					</li>
				<?php endif;
			}
			
			// SET NEXT BUTTON
			echo ($current_page <= ($pagination->total_pages() - $nav_limit)) ? '<li class="page"><a href="' . $dest_url . $pagination->next_page() . '">Next &raquo;</a></li>' : '<li class="disabled"><a href="#">Next &raquo;</a></li>';

			// SET LAST BUTTON IF NEEDED
			if($pagination->total_pages() > $nav_limit && $current_page <= $pagination->total_pages() - $nav_limit) {
				echo '<li class="page"> <a href="' . $dest_url . $pagination->total_pages() . '"> Last (' . $pagination->total_pages() . ') &raquo;</a> </li>';
			} ?>
			</ul>
		</div>
		<?php
		endif;
	endif;
?>