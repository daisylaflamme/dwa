
<div class="message">
<form name='new-post' method='POST' action='/posts/p_add'>
	<fieldset>
	<legend>Add New Fundracing</legend><br>
	<label for='content'>New Fundracing: &nbsp; </label>
	<textarea name='content' required></textarea>

	<br><br>
	<input type='submit' value="Post">
	</fieldset>
</form>

<div id='results' class='sec'></div>

<script type='text/javascript'>
	
	// Set up the options for Ajax and our form
	var options = { 
		type: 'POST',
		url: '/posts/p_add/',
		beforeSubmit: function() {
			$('#results').html("Adding...");
		},
		success: function(response) { 	
			//$('#results').html("Your post was added.");
			$('#results').html(response);
		} 
	}; 
		
	// Using the above options, Ajax'ify the form	
	$('form[name=new-post]').ajaxForm(options);
	
</script>
</div>
