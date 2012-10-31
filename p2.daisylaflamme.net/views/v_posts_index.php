<? foreach($posts as $post): ?>
	
	<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>
	
	<br>
	Posted on: 
	<?
	$timestamp = $post['posts_created'];
	# This is equivalent to saying date('F j, Y g:ia', $time);
	echo Time::display($timestamp);
	//# You can override the default TIME_FORMAT on a case by case basis
	//echo Time::display($timestamp, 'M D Y'); ?>
	
	<br><br>
	
<? endforeach; ?>