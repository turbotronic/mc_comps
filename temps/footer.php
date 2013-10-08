	<footer>
		<div class="container">
			<p>Copyright Media Center</p>
			<button class="btn primary lg square"><span class="glyphicon glyphicon-list"></span></button>
			<button class="btn primary lg square pull-right"><span class="glyphicon glyphicon-filter"></span></button>
			<button class="btn primary lg square pull-right"><span class="glyphicon glyphicon-cog"></span></button>
		</div>
	</footer>

	<!-- JAVASCRIPTS -->
	
	<!-- JQUERY: Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo JS_DIR; ?>/lib/jquery.js"><\/script>')</script>
	
	<!--[if lt IE 9]>
	  <script src="<?php echo JS_DIR; ?>/ie/selectivizr.js"></script>
	  <script src="<?php echo JS_DIR; ?>/ie/respond.js"></script>
	<![endif]-->
	<script src="<?php echo JS_DIR; ?>/plugins/bootstrap.min.js"></script>
	<script src="<?php echo JS_DIR; ?>/plugins/packery.min.js"></script>
	<script src="<?php echo JS_DIR; ?>/script.js"></script>
	
	<script type="text/javascript">

	var container = document.querySelector('#container'),
	    pckryOptions = {
		  // options
		  itemSelector: '.col',
		  gutter: 0
		},
		pckry = new Packery(container, pckryOptions)

	$(function() {
		$.each($('.share-toggle'), function() {
			$(this).on('click', function(e){
				e.preventDefault();
				$(this).closest($('.share-tools ul')).toggleClass('active');
				$(this).closest($('.meta')).find($('p')).toggleClass('active');
			});
		});

		$.each($('.toggle'), function() {
			$(this).on('click', function(e){
				e.preventDefault();
				$(this).parent().toggleClass('active');
			});
		});

		// $('.toggle').on('click', function(e){
		// 	console.log('click');
		// 	e.preventDefault();
		// 	$(this).parent().toggleClass('active');
		// });
	});

	</script>
	
</body>
</html>