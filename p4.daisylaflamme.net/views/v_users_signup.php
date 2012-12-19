<script type='text/javascript'>
function greeting()
{
	$('#result')html("You are registered. Please log in.");
}
</script>

<form method='POST' action='/users/p_signup' name='registration_form' id='registration_form' onsubmit='greeting()'>
	<fieldset>
		<legend>Registration - all fields required</legend>
		<label for='first_name'>Organization Name &nbsp;</label>
		<input type='text' name='first_name' id='first_name' autofocus required>
			<span id='first_name_error'>&nbsp;</span><br>
		
		<label for='last_name'>City &nbsp;</label>
		<input type='text' name='last_name' id='last_name' required>
			<span id='last_name_error'>&nbsp;</span><br>

		<label for='email'>E-Mail &nbsp;</label>
		<input type='email' name='email' id='email' required>
			<span id='email_error'>Must be a valid  email address.</span><br>
		
		<label for='password'>Password &nbsp;</label>
		<input type='password' name='password' id='password' required><br>
		
		<label for='link'>Website Link: &nbsp; </label>
		<input name='link' id='link' required><br>
		
		<label for='mission'>Mission: &nbsp; </label>
		<textarea name='mission' required></textarea><br>
		
		<label for='vision'>Vision: &nbsp; </label>
		<textarea name='vision' required></textarea><br>
		
		<label for='program'>Current Fundracing: &nbsp; </label>
		<textarea name='program' required></textarea><br>
		
        
                    <span id='verify_error'>&nbsp;</span><br><br>
		
		<input type='submit' value='Register'>
	</fieldset>
</form> 

<div id='result'></div>
