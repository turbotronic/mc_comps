	<footer id="site-footer">
		<div class="container">
			<div id="ticker" class="moving-feed hidden-sm-down">

			</div>
			<button type="button" href="#wheel3" class="menu-toggle ne wheel-button"><span class="glyphicon glyphicon-list"><span class="sr-only">Menu</span></span></button>
			<button type="button" data-container=".filter-toggle" data-toggle="popover" data-placement="auto top" data-header="Filters" data-html="true" data-title="<h4>Filters</h4>" data-content='<?php include('temps/ui/filters.php');?>' class="filter-toggle pull-right"><span class="glyphicon glyphicon-filter"><span class="sr-only">Filter</span></span></button>
			<button type="button" data-container=".settings-toggle" data-toggle="popover" data-placement="top" data-header="Settings" data-html="true" data-title="<h4>Settings</h4>" data-content='<?php include('temps/ui/settings-menu.php');?>' class="settings-toggle pull-right"><span class="glyphicon glyphicon-cog"><span class="sr-only">Settings</span></span></button> 
		</div> <!-- .container -->
	</footer>
	
	<!-- global nav -->
    <ul id="global-nav" role="navigation" class="main-menu">
        <li class="news"><a href="#home"><span class="glyphicon glyphicon-floppy-open"></span><span class="menu-title">News</span></a></li>
        <li class="sports"><a  href="#home"><span class="glyphicon glyphicon-glass"></span><span class="menu-title">Sports</span></a></li>
        <li class="entertainment"><a  href="#home"><span class="glyphicon glyphicon-hd-video"></span><span class="menu-title ">Entertainment</span></a></li>
        <li class="images"><a href="#home"><span class="glyphicon glyphicon-hdd"></span><span class="menu-title">Images of the Day</span></a></li>
        <li class="projects"><a href="#home"><span class="glyphicon glyphicon-home"></span><span class="menu-title ">Special projects</span></a></li>
        <li class="video"><a href="#home"><span class="glyphicon glyphicon-hd-video"></span><span class="menu-title">Videos</span></a></li>
    </ul>


	<?php include('temps/ui/signin.php'); ?>

	<!-- JAVASCRIPTS -->
	<script src="<?php echo JS_DIR; ?>/lib/jquery.js"></script>
	<!--[if lt IE 9]>
	  <script src="<?php echo JS_DIR; ?>/ie/selectivizr.js"></script>
	  <script src="<?php echo JS_DIR; ?>/ie/respond.js"></script>
	<![endif]-->
    <script src="<?php echo JS_DIR; ?>/lib/handlebars.js"></script>
	<script src="<?php echo JS_DIR; ?>/plugins/bootstrap.min.js"></script>
    <script src="<?php echo JS_DIR; ?>/plugins/packery.min.js"></script>
    <script src="<?php echo JS_DIR; ?>/plugins/jquery.cookie.min.js"></script>

	<script type="text/javascript">
		$(document).data('cookiename', '<?php echo COOKIE_NAME; ?>');
		$(document).data('baseurl', '<?php echo BASE_URL; ?>');
		$(document).data('currenturl', '<?php echo $this_url; ?>');
	</script>
	
	<script id="tickertpl" type="text/x-handlebars-template">
		<h5>Breaking news from <a href="http://www.denverpost.com">The Denver Post</a>:</h5>
		<ul class="ticker-feed">
		{{#articles}}
			<li id="{{id}}" title="{{link}}">
				<a href="{{link}}">{{title}}</a>
			</li>
		{{/articles}}
		</ul>
	</script>
	
	<script type="text/javascript">
	
	// HANDLEBARS HELPERS
	Handlebars.registerHelper('unless_blank', function(item, block) {
	  return (item && item.replace(/\s/g,"").length) ? block.fn(this) : block.inverse(this);
	});
	
	// PACKERY
	var container = document.querySelector('#content'),
	    pckryOptions = {
		  // options
		  itemSelector: '.col',
		  isInitLayout: false,
		  gutter: 0
		},
		pckry = new Packery(container, pckryOptions),
		init = true;
	
		pckry.on( 'layoutComplete', function() {
		if (init) {
			container.className += ' ready';
			init = false;
			pckry.layout();
		}
		});
		
		// manually trigger initial layout
		function setLayout(){ pckry.layout() }
		setTimeout(setLayout, 300); // delay
	
	
	
	// JQUERY
	;(function (window, document, $) {
		
		
		// TICKER STUFF
		/////////////////////////////////
		var baseURL = $(document).data('baseurl'),
			currentURL = $(document).data('currenturl'),
			currentLatestFeed;

		$.ajaxSetup({ cache: false });

		loadLatest();

		function loadLatest(xmlFeed) {
			var source, template, html;
			var $target = $('#ticker');
			xF = (xmlFeed == undefined) ? baseURL + '/inc/feed.php?feed=dp-news-breaking' : xmlFeed;
			//xF = (xmlFeed == undefined) ? baseURL + '/inc/staticfeed.php' : xmlFeed;
			currentLatestFeed = xF;
			
			var jqxhr = $.getJSON(xF, function(data) {
				source  = $("#tickertpl").html(),
				template = Handlebars.compile(source);
				html = template(data);
				$target.html(html); // add to zone 1
			}); 
			jqxhr.complete(function() {
			  setTimeout(tickerGo, 1000);
			});//getJSON
		}
		
		var $ticker = $('#ticker'),
		    containerPos = 0,
		    currentIndex = 0,
		    $tickerContainer,
		    items,
		    totalItems,
		    currentItem,
		    init = true;
		
		function tickerGo() {
			if(init) {
				$tickerContainer = $ticker.find('ul');
				items = $ticker.find('li');
				totalItems = items.length;
				currentItem = $(items[currentIndex]);
				init = false;
				console.log('ticker!');
			}
			$ticker.find('li.active').removeClass('active');
			currentItem.addClass('active');
			setTimeout(moveTicker, 7000);
		}
		
		function moveTicker() {
			currentIndex ++;
			containerPos = (containerPos - 48); 
			currentItem = $(items[currentIndex]);
			$tickerContainer.css({'top' : containerPos + 'px'});
			if(currentIndex == (totalItems)) {
				setTimeout(resetTicker, 500);
			} else {
				setTimeout(tickerGo, 500);
			}
		}
		
		function resetTicker() {
			containerPos = 0;
			currentIndex = 0;
			currentItem = $(items[currentIndex]);
			$ticker.find('li.active').removeClass('active');
			$tickerContainer.css({'visiblity' : 'hidden'});
			setTimeout(reloadTicker, 500);
		}
		function reloadTicker(){
			$tickerContainer.css({
				'visiblity' : 'visible',
				'top' : '0'
			});
			loadLatest(currentLatestFeed);
		}
		
		// Footer toggles
		$('.settings-toggle').click(function(){
			$(this).toggleClass('active')
			if($('#global-nav').hasClass('active')) {
				$('#global-nav').removeClass('active');
			}
			if($('.filter-toggle .popover').is(':visible')) {
				$('.filter-toggle').popover('hide').removeClass('active');
			}
		});
		$('.filter-toggle').click(function(){
			$(this).toggleClass('active');
			if($('#global-nav').hasClass('active')) {
				$('#global-nav').removeClass('active');
			}
			if($('.settings-toggle .popover').is(':visible')) {
				$('.settings-toggle').popover('hide').removeClass('active');
			}
		});
		$('.menu-toggle').click(function(){
			$(this).toggleClass('active');
			$('#global-nav').toggleClass('active');
			if($('.settings-toggle .popover').is(':visible')) {
				$('.settings-toggle').popover('hide').removeClass('active');
			}
			if($('.filter-toggle .popover').is(':visible')) {
				$('.filter-toggle').popover('hide').removeClass('active');
			}
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
		var $shareToggles = $('#content').find($('.share-toggle')),
		    $headerShareToggle = $('#site-header').find($('.share-toggle')),
		    $headerSearchToggle = $('#site-header').find($('.search-toggle'));
		
		$.each($shareToggles, function() {
			$(this).on('click', function(e){
				e.preventDefault();
				console.log('hello');
				$(this).parent().parent().toggleClass('active');
			});
		});
		$headerShareToggle.on('click', function(e){
          $('#site-header').toggleClass('share-active').removeClass('search-active');
		});
		$headerSearchToggle.on('click', function(e){
		  $('#site-header').toggleClass('search-active').removeClass('share-active');
          ($('#site-header').delay(500).hasClass('search-active')) ? $('#search-field').focus() :  $('#search-field').blur();
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
	
		}(this, document, window.jQuery||window.Zepto));

	</script>
</body>
</html>