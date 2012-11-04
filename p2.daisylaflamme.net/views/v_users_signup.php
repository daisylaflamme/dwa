<script>
function greeting()
{
alert("Welcome " + document.forms["registration_form"]["first_name"].value + "! You have been successfully registered. We sent you a confirmation Email. Please Log In! ")
}
</script>

<form method='POST' action='/users/p_signup' name='registration_form' id='registration_form' onsubmit='greeting()'>
	<fieldset>
		<legend>Registration Information</legend>
		<label for='first_name'>First Name &nbsp;</label>
		<input type='text' name='first_name' id='first_name' autofocus required>
			<span id='first_name_error'>&nbsp;</span><br>
		
		<label for='last_name'>Last Name &nbsp;</label>
		<input type='text' name='last_name' id='last_name' required>
			<span id='last_name_error'>&nbsp;</span><br>

		<label for='email'>E-Mail &nbsp;</label>
		<input type='email' name='email' id='email' required>
			<span id='email_error'>Must be a valid  email address.</span><br>
		
		<label for='password'>Password &nbsp;</label>
		<input type='password' name='password' id='password' required>
		
        
                    <span id='verify_error'>&nbsp;</span><br><br>
		
		<input type='submit'>
	</fieldset>
</form> 