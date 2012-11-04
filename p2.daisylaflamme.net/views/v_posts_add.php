<script>
function greeting()
{
alert("Your post has been added.")
}
</script>


<form method='POST' action='/posts/p_add' onsubmit='greeting()'>
	<fieldset>
	<legend>Add New Post</legend><br>
	<label for='content'>New Post: &nbsp; </label>
	<textarea name='content' required></textarea>

	<br><br>
	<input type='submit'>
	</fieldset>
</form>