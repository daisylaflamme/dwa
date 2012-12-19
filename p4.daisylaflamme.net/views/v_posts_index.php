<div class="sec">
<p class="small">You can see current organizations' fundracings only if you follow them!</p>

<? foreach($posts as $post): ?>
	<div class="message">
	<h2><?=$post['first_name']?>, <?=$post['last_name']?> </h2>	
	
	<h5>Website</h5><a href="http://<?=$post['link']?>" target="_blank"><?=$post['link']?> </a><br><br>
	<h5>Mission</h5><p><?=$post['mission']?></p><br>
	<h5>Vision</h5><p><?=$post['vision']?></p><br>
	<h5>Current Fundracing</h5><p><?=$post['program']?></p><br>
	<h5>Message to you:</h5> <p><?=$post['content']?></p> 
	<br>
	
	<span class="small">Posted on: 
	<?
	$timestamp = $post['posts_created'];
	# This is equivalent to saying date('F j, Y g:ia', $time);
	echo Time::display($timestamp);
	//# You can override the default TIME_FORMAT on a case by case basis
	//echo Time::display($timestamp, 'M D Y'); ?>
	</span>
	<br><br>
	</div>
	
<? endforeach; ?>


</div>

