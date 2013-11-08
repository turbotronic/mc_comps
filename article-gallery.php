<?php require_once('inc/init.php'); // load in base objects ?>
<?php $page_type = "article"; // define page ?>
<?php require_once('temps/header.php'); // load in header ?>
<div id="content" class="container">
	<div class="gallery">
		
	</div>
	<div class="story">
			<div class="content-well">
				<div class="story-info">
					<h5 class="section-name">Archive</h5>
					<h1>Photographs from Detroit: Survival, renewal and urban farming</h1>
					<div class="meta">
						<p><span class="posted-by">Posted by <a href="#">Meghan Lyden</a> on <span class="timestamp">12.13.12</span></span><span class="divider"></span><span class="tags">tags: <a href="#">Tag name here</a>, <a href="#">another tag</a>, <a href="#">another tag</a></span></p>
						<div class="share-zipper">
							<div class="drawer">
								<ul class="share-tools">
									<li><a class="fc-webicon facebook large" href=""><span class="sr-only">Facebook</span></a></li>
									<li><a class="fc-webicon twitter large" href=""><span class="sr-only">Twitter</span></a></li>
									<li><a class="fc-webicon googleplus large" href=""><span class="sr-only">Google Plus</span></a></li>
									<li><a class="fc-webicon mail large" href=""><span class="sr-only">Email</span></a></li>
								</ul> <!-- .share-tools -->
							</div> <!-- .drawer -->
						<button class="share-toggle"><span class="glyphicon glyphicon-share-alt"><span class="sr-only">Share</span></span></button>
						</div> <!-- .share-zipper -->
					</div> <!-- .meta -->
					<p>Erica Yoon visited Detroit in October 2012 to investigate urban gardening initiatives for a project as a graduate student in photojournalism at Ohio University. The idea of urban farms popping up amid the chaos in Detroit seemed to be a great way to visualize how people were attempting to weather the economic storm there. She spent ten days meeting people, photographing and trying to parse what she’d read about Detroit from what she was hearing from people on the ground.</p>
					<p>“I realized early on that I couldn’t just focus on the process of urban gardening anymore,” writes Yoon. “Urban gardening alone was not going to fix the problems of the economically strained in Detroit. But instead, it became much more about all of the different people and communities who were working towards this momentum of change.”</p>
				</div> <!-- .story-info -->
				<ul class="pager plain">
			        <li class="prev">
			        	<p class="position"><span class="glyphicon glyphicon-chevron-left"></span> Previous Post</p>
			            <p><a href="#">Post name goes in this space right here</a></p>
			        </li>
			        <li class="next">
			        	<p class="position"></span>Next Post<span class="glyphicon glyphicon-chevron-right"></p>
			            <p><a href="#">Post name goes in this space right here</a></p>    
				    </li>
			      </ul> <!-- .pager -->
				<div class="comments" id="comments">
					comments placeholder here
				</div>
			</div> <!-- .content-well -->
			
			
			<div class="ad-well">
				<div class="ad">
					<img src="http://placehold.it/300x250" alt="" />
				</div>
				<ul class="stats">
					<li><span class="glyphicon glyphicon-comment"></span><a href="#comments">Comments (53)</a></li>
					<li><span class="glyphicon glyphicon-thumbs-up"></span><a href="">Like (74)</a></li>
					<li><span class="glyphicon glyphicon-retweet"></span><a href="">Retweet (25)</a></li>
					<li><span class="glyphicon glyphicon-envelope"></span><a href="">Email</a></li>
					<li><span class="glyphicon glyphicon-bookmark"></span><a href="">Bookmark</a></li>
					<li><span class="icon-rss"></span></span><a href="">Subscribe to RSS</a></li>
				</ul>
			<div class="related-posts">
				<h4>Related Posts</h4>
				<ul class="sm-block-grid-2">
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/miley1.jpg">
				    <div class="quick-info">
				    	<h4>A pic of Miley Cyrus in this space here</h4>
				    </div>
				    </a>
				  </li>
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/miley2.jpg">
				    <div class="quick-info">
				    	<h4>Another pic of Miley Cyrus in this space</h4>
				    </div>
				    </a>
				  </li>
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/miley3.jpg">
				    <div class="quick-info">
				    	<h4>Hmmm ... yet another pic of Miley Cyrus in this space</h4>
				    </div>
				    </a>
				  </li>
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/miley4.jpg">
				    <div class="quick-info">
				    	<h4>And one more pic of Miley Cyrus</h4>
				    </div>
				    </a>
				  </li>
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/miley5.jpg">
				    <div class="quick-info">
				    	<h4>Geez, no Ryan Gosling pictures?</h4>
				    </div>
				    </a>
				  </li>
				  <li>
					<a href="">
					<img src="<?php echo ASSETS_IMG;?>/not-miley.jpg">
				    <div class="quick-info">
				    	<h4>This is not a picture of Miley Cyrus</h4>
				    </div>
				    </a>
				  </li>
				</ul>
			</div> <!-- .related-posts -->
		</div> <!-- .ad-well -->
	</div> <!-- .story -->
	
</div> <!-- #content -->
<?php require_once('temps/footer.php'); // load in footer ?>