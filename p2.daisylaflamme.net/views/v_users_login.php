<form method='POST' action='/users/p_login'>
	<fieldset>
	<legend>Log In Information</legend>
	<label for='email'>Email &nbsp;</label>
	<input type='text' name='email'>	
	<br><br>
	
	<label for='password'>Password &nbsp;</label>
	<input type='password' name='password'>
	<br><br>
	
	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>
&nbsp;
	<input type='submit'>
	</fieldset>
</form>