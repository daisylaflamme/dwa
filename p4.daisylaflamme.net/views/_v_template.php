<!DOCTYPE html>
<html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<!--[if lt IE 9]>
        <script>
            document.createElement('header');
            document.createElement('nav');
            document.createElement('section');
            document.createElement('article');
            document.createElement('aside');
            document.createElement('footer');
            document.createElement('hgroup');
        </script>
 <![endif]-->

	<title><?=@$title; ?></title>
        <meta http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=1.000,Transition=18)">
	<link rel="shortcut icon" href="/img/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://Ajax.googleapis.com/Ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script>
    $(function() {
    var $slider = $('.panel-inner'); //get the slider
    var liW = 500; //define single LI width
    var liFW = parseInt(liW * ($slider.find('li').length + 1)); //find the full width of the UL 191 * LI's
    $slider.css('width', liFW + 'px'); //apply the full-width to the UL
    $('.button').click(function() {
    //if arrow right OR left, get the current left: CSS property of the UL
    var leftX = (this.id == 'right') ? parseInt($slider.css('left').toString().replace('-', '')) : parseInt($slider.css('left'));
    //check and see if we have reached the end OR start of the UL width
    var leftY = (this.id == 'right') ? ((leftX + 404) == liFW) ? 0: -(leftX + liW) : (leftX < 0) ? -(parseInt(leftX.toString().replace('-', '')) - liW) : 0;
    //apply the animation
    rotate(leftY);
    });
    var rotate = function(leftY) {$slider.animate({left: leftY},500);}
    });
    </script>
	
	<!-- Google Analytics API-->
	<script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-33553732-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
	
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
<h1>Nonprofit Organizations Network</h1>
<h2>World->Community->People</h2>
</hgroup>
</header>
	<nav id='menu'>
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
		<ul>
			<li><a href='/'>Home</a></li>
			<li><a href='/posts/users/'>Organizations</a></li>
			<li><a href='/posts/'>Fundracings</a></li>
			<li><a href='/posts/add'>Add fundracing</a>	</li>		
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
<aside>
	 <!-- Slide Show-->
        <div id="carousel" class="message">
        
        <div class="panel">
        <ul class="panel-inner" style="width: 525px;">
        <li>
        
        <a href="<?=$post['link']?>" target="_blank"><img alt="Drupal Website" src="/images/2.jpg"></a>        
        </li>
        <li>
        
        <a href="http://daisylaflamme.com/wordpress1/" target="_blank"><img alt="Wordpress Blog" src="/images/1.jpg"></a>
        </li>
        <li>
        
        <a href="http://otli4ni4ka.wix.com/daisylaflamme" target="_blank"><img alt="Wix Website Portfolio" src="/images/3.jpg"></a>
        </li>
        <li>
        
        <a href="http://p2.daisylaflamme.net/" target="_blank"><img alt="Micro Blog - Anger Management" src="/images/4.jpg"></a>
        </li>
        <li>
        
        <a href="http://www.daisylaflamme.net/dwa/p3/project.html" target="_blank"><img alt="Time manager tool - javascript/jquery" src="/images/5.jpg"></a>
        </li>
        <li>
        
        <a href="http://daisylaflamme.com/moodle/enrol/index.php?id=2" target="_blank"><img alt="Moodle Website" src="/images/6.jpg"></a>
        </li>
        <li>
        
        <a href="http://globalpeaceaid.org/index.html" target="_blank"><img alt="Global Peace Aid Website" src="/images/7.jpg"></a>
        </li>
        <li>
        
       <a href="http://scratch.mit.edu/projects/desislava/2778494" target="_blank"> <img alt="Web Game" src="/images/8.jpg">
        </li></a>
        <li>
        
        <a href="http://creativehobbies.wall.fm/index" target="_blank"><img alt="Social Network for Hobbies" src="/images/9.jpg"></a>
        </li>
        </ul>
        </div>
        <div id="left" class="button">
        <img alt="click for left image" src="/images/left.jpg">
        </div>
        <div id="right" class="button">
        <img alt="click for next image" src="/images/right.jpg">
        </div>
        </div>
</aside>
<nav id='menu'>
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
		<ul>
			<li><a href='/'>Home</a></li>
			<li><a href='/posts/users/'>Organizations</a></li>
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
<p>		CSICE-75<br>
         Nonprofit Organizations Network<br>
		 Boston MA<br>
		daisy@daisylaflamme.net<br>
		Last Updated: December 19, 2012<br>
      
    	</p>
</footer>
</body>
</html>