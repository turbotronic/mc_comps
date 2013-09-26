		</div><!-- .container -->
	</div> <!-- #content -->
	<footer id="site-footer">
		<hr>
		<div class="container">
		    <p>&copy; Company 2012</p>
		</div><!-- .container -->
		<!-- FACEBOOK IMAGE <?php echo IMG_DIR; ?>/facebook.jpg -->
		<img style="display:none;" src="" alt="This the icon for the article when viewed on Facebook" />
	</footer><!-- #site-footer -->
	
	<!-- JAVASCRIPTS -->
	
	<!-- JQUERY: Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo JS_DIR; ?>/lib/jquery-2.0.0.min.js"><\/script>')</script>
	
	<!-- OMNITURE -->
	<script type="text/javascript">
	function omniture_track(param){
	    frames['click_iframe'].location.href = 'omniture.php?ne=' + param;
	};
	</script>
	<!--[if lt IE 9]>
	  <script src="<?php echo JS_DIR; ?>/ie/selectivizr.js"></script>
	  <script src="<?php echo JS_DIR; ?>/ie/respond.js"></script>
	<![endif]-->
	<script src="<?php echo JS_DIR; ?>/plugins/bootstrap.min.js"></script>
	<script src="<?php echo JS_DIR; ?>/plugins/foundation.min.js"></script>
	<script src="<?php echo JS_DIR; ?>/script.js"></script>
</body>
</html>