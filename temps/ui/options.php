<div class="options-wrapper">
	<p class="option-toggle">&raquo; More search options</p>
	<div class="options">
		<div class="sorter">
			<label for="">Sort by:</label>
			<div class="radio-field">
				<fieldset>
					<p><input type="radio" name="srttype" value="date" 
					<?php if(isset($_GET['srttype']) && $_GET['srttype'] === 'date') { echo "checked"; } else if(!isset($_GET['srttype'])) { echo "checked"; }?>/> Date</p>
					<p><input type="radio" name="srttype" value="cash" <?php if(isset($_GET['srttype']) && $_GET['srttype'] === 'cash') { echo "checked"; } ?> /> Contribution</p>
				</fieldset>	
				<fieldset>
					<p><input type="radio" name="srttype" value="contrib" <?php if(isset($_GET['srttype']) && $_GET['srttype'] === 'contrib') { echo "checked"; } ?>/> Contributor</p>
					<p><input type="radio" name="srttype" value="credit" <?php if(isset($_GET['srttype']) && $_GET['srttype'] === 'credit') { echo "checked"; } ?>/> Tax Credit</p>	
				</fieldset>
				<fieldset class="order-by">
					<p><input type="radio" name="direction" value="asc" <?php if(isset($_GET['srttype']) && $_GET['direction'] === 'asc') { echo "checked"; } else if(!isset($_GET['direction'])) { echo "checked"; }?> /> Ascending</p>
					<p><input type="radio" name="direction" value="desc" <?php if(isset($_GET['direction']) && $_GET['direction'] === 'desc') { echo "checked"; } ?> /> Descending</p>
				</fieldset>
			</div>
		</div>
		<div class="filter">
			<label for="cost-options">Filter by contribution amount <span class="gray">(no commas)</span></label>
			<fieldset>
				<select id="cost" name="cost-options">
					<option value="more" <?php if(isset($_GET['cost-options']) && $_GET['cost-options'] === 'more') { echo "selected"; } else if(!isset($_GET['cost-options'])) { echo "selected"; }?>>More than</option>
					<option value="equal" <?php if(isset($_GET['cost-options']) && $_GET['cost-options'] === 'equal') { echo "selected"; } ?>>Equal to</option>
					<option value="less" <?php if(isset($_GET['cost-options']) && $_GET['cost-options'] === 'less') { echo "selected"; } ?>>Less than</option>													
				</select>
				<p>$ <input id="price" type="text" name="price" 
					<?php
					if(isset($_GET['price'])) { 
						echo "value='" . $_GET['price'] . "'"; 
					} else { 
						echo' placeholder="Enter dollar amount" ';
					} ?>/></p>
			</fieldset>
		</div>
		<div class="searcher">
			<label for="s">Search for a contributor</label>
			<input id="s" type="text" placeholder="Enter a search term" name="s" />
		</div>
	</div>
</div>