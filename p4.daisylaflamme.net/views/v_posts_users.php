<div class="message"><h1>Find Organizations to Follow!</h1><br>
<form method='POST' action='/posts/p_follow'>
		
	<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<span class="dark"><?=$user['first_name']?>, <?=$user['last_name']?></span>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<a href='/posts/unfollow/<?=$user['user_id']?>' class="message">Unfollow</a>
		
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<a href='/posts/follow/<?=$user['user_id']?>' class="message">Follow</a>
		<? endif; ?>
	
		<br><br>
	
	<? endforeach; ?>
	
</form>
</div>
<script type='text/javascript'>
                
        $(document).ready(function() {
                
                var options = {
                        type: 'post',
                        url: '/posts/p_follow',
                }        

// Attach the Ajax form plugin to this form so that when it's submitted, it will be submitted via Ajax        
        $('form').ajaxForm(options);
                
}); // end doc ready

</script>