<?php 
// handles title additions
$sm_title = (!isset($title)) ? THE_TITLE : $title; 
?>
<ul class="sharebar list-inline">
	<li><a class="fc-webicon facebook small" title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo htmlentities($this_url);?>">Facebook</a></li>
	<li><a class="fc-webicon twitter small" title="Share on Twitter" href="http://twitter.com/intent/tweet?source=webclient&text=<?php echo htmlentities($sm_title);?> <?php echo htmlentities($this_url);?>">Twitter</a></li>
	<li><a class="fc-webicon googleplus small" title="Share on GooglePlus" href="https://plus.google.com/share?url=<?php echo htmlentities($this_url);?>">GooglePlus</a></li>
	<li><a class="fc-webicon mail small" title="Email this to a friend" href="mailto:?subject=<?php echo $sm_title; ?>&amp;body=<?php echo htmlentities($this_url);?>">Email</a></li>
</ul><!-- .social-sharebar -->