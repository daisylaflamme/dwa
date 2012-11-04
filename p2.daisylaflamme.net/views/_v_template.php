<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>
	<link rel="shortcut icon" href="/img/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/daisy.css" type="text/css">
	<script src="register_library.js"></script>
    <script src="register.js"></script>
	<?php echo @$client_files; ?>
	
</head>

<body>	

<header>
<img src="/img/fff.gif" alt="angry logo" height="80">
<hgroup>
<h1>Anger Managment Blog</h1>
<h2>Share How You Cope with Anger</h2>
</hgroup>
</header>
	<nav id='menu'>
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
		<ul>
			<li><a href='/'>Home</a></li>
			<li><a href='/posts/users/'>Follow People</a></li>
			<li><a href='/posts/'>View posts</a></li>
			<li><a href='/posts/add'>Add a new post</a>	</li>		
			<li><a href='/users/logout'>Logout</a></li>
		</ul>
		<!-- Menu options for users who are not logged in -->	
		<? else: ?>
		<ul>
			<li><a href='/users/signup'>Sign up</a></li>
			<li><a href='/users/login'>Log in</a></li>
		</ul>
		<? endif; ?>
	
	</nav>
	
	<br>
<section>
	<?=$content;?> 
</section>
<nav id='menu'>
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
		<ul>
			<li><a href='/'>Home</a></li>
			<li><a href='/posts/users/'>Follow People</a></li>
			<li><a href='/posts/'>View posts</a></li>
			<li><a href='/posts/add'>Add a new post</a>	</li>		
			<li><a href='/users/logout'>Logout</a></li>
		</ul>
		<!-- Menu options for users who are not logged in -->	
		<? else: ?>
		<ul>
			<li><a href='/users/signup'>Sign up</a></li>
			<li><a href='/users/login'>Log in</a></li>
		</ul>
		<? endif; ?>
	
	</nav>
<footer>
<p>
         Daisy LaFlamme, Boston, MA <br>
        otli4ni4ka@yahoo.com<br>
      
    	</p>
</footer>
</body>
</html>