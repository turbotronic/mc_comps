<div class="sort-area">
	<h4>Search by the fields below to explore the data</h4>
	<form class="" id="" name="" action="<?php echo $this_url; ?>" method="get">
		<div class="control-group">
			<label for=""></label>
			<select id="" title="" name="">
				<?php
				$sql = "SELECT * FROM tablename";
				$result = $db->execute($sql);
				while($row = $result->fetch_array()) : ?>
					<option value=""><?php ?></option>
				<?php endwhile; ?>
			</select>
		</div> <!-- .control-group -->
		<?php //require_once('options.php'); ?>
		<div class="actions">
			<input class="btn primary" type="submit" value="Submit" />
			<input class="btn" type="submit" name="reset" value="Reset" />
		</div> <!-- .actions -->
	</form>
	<form class="" id="" name="page-filter" action="#" method="get">
		<div class="control-group">
			<label for="page-filter">Rows per page:</label>
			<select name="limit" id="pages">
				<option value="10" <?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '10') { echo "selected"; } ?>>10</option>
				<option value="25" <?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '25') { echo "selected"; } ?>>25</option>
				<option value="50" <?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '50' || !isset($_REQUEST['page-filter'])) { echo "selected"; } ?>>50</option>
				<option value="100"<?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '100') { echo "selected"; } ?>>100</option>
				<option value="200"<?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '200') { echo "selected"; } ?>>200</option>
				<option value="500"<?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === '500') { echo "selected"; } ?>>500</option>
				<option value="all"<?php if(isset($_REQUEST['page-filter']) && $_REQUEST['page-filter'] === 'all') { echo "selected"; } ?>>All</option>
			</select>
		</div><!-- .control-group -->
	</form> <!-- .page-filter -->
</div> <!-- .sort-area -->