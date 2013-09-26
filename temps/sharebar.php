<ul class="social-sharebar">
	<li>Share:&nbsp;&nbsp;</li>
	<li><a class="share-fb" title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo htmlentities($this_url);?>">Facebook</a></li>
	<li><a class="share-twit" title="Share on Twitter" href="http://twitter.com/intent/tweet?source=webclient&text=<?php echo htmlentities(THE_TITLE);?> <?php echo htmlentities($this_url);?>">Twitter</a></li>
	<li><a class="share-stumble" title="Share on StumbleUpon" href="http://www.stumbleupon.com/submit?url=<?php echo htmlentities($this_url);?>&amp;title=<?php echo htmlentities(THE_TITLE);?>">StumbleUpon</a></li>
	<li><a class="share-reddit" title="Share on Reddit" href="http://reddit.com/submit?url=<?php echo htmlentities($this_url);?>&amp;title=<?php echo htmlentities(THE_TITLE);?>">Reddit</a></li>
	<li><a class="share-delic" title="Share on Delicious" href="http://del.icio.us/post?url=<?php echo htmlentities($this_url);?>&amp;title=<?php echo htmlentities(THE_TITLE);?>">Delicious</a></li>
	<li><a class="share-email" title="Email this to a friend" href="mailto:?subject=<?php echo THE_TITLE; ?>&amp;body=<?php echo htmlentities($this_url);?>">Email</a></li>
</ul><!-- .social-sharebar -->