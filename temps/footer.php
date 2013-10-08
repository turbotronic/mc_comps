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
	
	<script type="text/javascript">

	var container = document.querySelector('#container'),
	    pckryOptions = {
		  // options
		  itemSelector: '.col',
		  gutter: 0
		},
		pckry = new Packery(container, pckryOptions)

	$(function() {
		var $shareToggles = $('#container').find($('.share-toggle')),
		     $headerShareToggle = $('#site-header').find($('.share-toggle')),
		     $headerSearchToggle = $('#site-header').find($('.search-toggle'));
		
		$.each($shareToggles, function() {
			$(this).on('click', function(e){
				e.preventDefault();
				$(this).parent().toggleClass('active');
			});
		});
		$headerShareToggle.on('click', function(e){
			$('#site-header').toggleClass('share-active').removeClass('search-active');
		});
		$headerSearchToggle.on('click', function(e){
				$('#site-header').toggleClass('search-active').removeClass('share-active');
		});
		$('.share-tools').tooltip({
	      selector: "[data-toggle=tooltip]",
	      placement: 'bottom',
	      container: "body",
	      delay: { show: 500, hide: 0 }
	    })
		
	});

	</script>
	
</body>
</html>