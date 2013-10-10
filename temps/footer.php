	<footer id="site-footer">
		<div class="container">
			<p>Copyright Media Center</p>
			<button type="button" href="#wheel3" class="menu-toggle ne wheel-button"><span class="glyphicon glyphicon-list"><span class="sr-only">Menu</span></span></button>
			<button type="button" data-container=".filter-toggle" data-toggle="popover" data-placement="auto top" data-header="Filters" data-html="true" data-title="<h4>Filters</h4>" data-content='<?php include('temps/ui/filters.php');?>' class="filter-toggle pull-right"><span class="glyphicon glyphicon-filter"><span class="sr-only">Filter</span></span></button>

				
			<button type="button" data-container=".settings-toggle" data-toggle="popover" data-placement="top" data-header="Settings" data-html="true" data-title="<h4>Settings</h4>" data-content='<?php include('temps/ui/settings-menu.php');?>' class="settings-toggle pull-right"><span class="glyphicon glyphicon-cog"><span class="sr-only">Settings</span></span></button> 
		</div>
	</footer>
	
	
	
	
	
	<ul id="wheel3" data-angle="NE" class="wheel">
        <li class="news"><a href="#home"><span class="glyphicon glyphicon-floppy-open"></span><span class="menu-title">News</span></a></li>
        <li class="sports"><a  href="#home"><span class="glyphicon glyphicon-glass"></span><span class="menu-title">Sports</span></a></li>
        <li class="entertainment"><a  href="#home"><span class="glyphicon glyphicon-hd-video"></span><span class="menu-title ">Entertainment</span></a></li>
        <li class="images"><a href="#home"><span class="glyphicon glyphicon-hdd"></span><span class="menu-title">Images of the Day</span></a></li>
        <li class="projects"><a href="#home"><span class="glyphicon glyphicon-home"></span><span class="menu-title ">Special projects</span></a></li>
        <li class="video"><a href="#home"><span class="glyphicon glyphicon-hd-video"></span><span class="menu-title">Videos</span></a></li>
      </ul>





	<?php include('temps/ui/signin.php'); ?>

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
	<script src="<?php echo JS_DIR; ?>/plugins/wheelmenu.js"></script>
	
	<script type="text/javascript">
	var container = document.querySelector('#container'),
	    pckryOptions = {
		  // options
		  itemSelector: '.col',
		  gutter: 0
		},
		pckry = new Packery(container, pckryOptions);
	
	$(function() {
		
		// active wheel menu
		
		// $('.wheel-button').wheelmenu({
		// 	      trigger: "click",
		// 	      animation: "fly",
		// 	      angle: "NW"
		// 	    });
	
		
		
		// toggle actives
		$('.settings-toggle').click(function(){
			$(this).toggleClass('active')
			if($('.filter-toggle .popover').is(':visible')) {
				$('.filter-toggle').popover('hide').removeClass('active');
			}
		});
		$('.filter-toggle').click(function(){
			$(this).toggleClass('active');
			if($('.settings-toggle .popover').is(':visible')) {
				$('.settings-toggle').popover('hide').removeClass('active');
			}
		});
		$('.menu-toggle').click(function(){
			$(this).toggleClass('active');
			$('.wheel').toggleClass('active');
			});
		
		// reset everything on resize
		$(window).resize(function(){
			$('.settings-toggle').removeClass('active');
			$('.filter-toggle').removeClass('active');
			$('.menu-toggle').removeClass('active');
			$('[data-toggle=popover]').popover('hide');
		});
		
		// hide popover on modal showing
		$('#login-form').on('show.bs.modal', function () {
		 $('[data-toggle=popover]').popover('hide');
		});
		
		// share toggles
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
		
		// tooltips
		$('.share-tools').tooltip({
	      selector: "[data-toggle=tooltip]",
	      placement: 'bottom',
	      container: "body",
	      delay: { show: 500, hide: 0 }
	    });
	
	    // popover
	    $("[data-toggle=popover]").popover();
	
	});

	</script>
</body>
</html>