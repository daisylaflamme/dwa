<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		//echo "users_controller construct called<br><br>";
	} 
	
	public function index() {
		//echo "Welcome to the users's department";
	}
	
	public function signup() {
		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->title   = "Signup";
			
		# Render template
			echo $this->template;
		
		#Send confirmation email
		# Build a multi-dimension array of recipients of this email
		$to[] = Array (Array("name" => "Judy Grimes", "email" => "judy@gmail.com"),
						Array( "name" => "daisy", "email" => "otli4ni4ka@yahoo.com")
						);

		# Build a single-dimension array of who this email is coming from
		# note it's using the constants we set in the configuration above)
		$from = Array("name" => "Daisy LaFlamme's Microblog",
						"email" => "daisy@daisylaflamme.net");
		# Subject
		$subject = "Welcom to Daisy LaFlamme's Microblog";

		# You can set the body as just a string of text
		$body = "Congratulations! You are  successfully registered at p2.daisylaflamme.net";

		# OR, if your email is complex and involves HTML/CSS, you can build the body via a View just like we do in our controllers
		# $body = View::instance('e_users_welcome');

		# Build multi-dimension arrays of name / email pairs for cc / bcc if you want to 
		$cc  = "";
		$bcc = "";

		# With everything set, send the email
		$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);
	}
	
	public function p_signup() {
		
	# Dump out the results of POST to see what the form submitted
	// print_r($_POST);
	
	# Encrypt the password	
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	# More data we want stored with the user	
	$_POST['created']  = Time::now();
	$_POST['modified'] = Time::now();
	$_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
	# Insert this user into the database
	$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
	
	# For now, just confirm they've signed up - we can make this fancier later
	echo "You're signed up <a href='/users/login'>Log in</a>";
	Router::redirect("/users/login");	
}
	
	public function login($error = NULL) {
	
	# Set up the view
	$this->template->content = View::instance("v_users_login");
	
	# Pass data to the view
	$this->template->content->error = $error;
	
	# Render the view
	echo $this->template;
	
}
	
public function p_login() {
	
	# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
	$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
	# Hash submitted password so we can compare it against one in the db
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
	# Search the db for this email and password
	# Retrieve the token if it's available
	$q = "SELECT token 
		FROM users 
		WHERE email = '".$_POST['email']."' 
		AND password = '".$_POST['password']."'";
	
	$token = DB::instance(DB_NAME)->select_field($q);	
				
	# If we didn't get a token back, login failed
	if(!$token) {
			
		# Send them back to the login page
		Router::redirect("/users/login/error");
		
		
	# But if we did, login succeeded! 
	} else {
			
		# Store this token in a cookie
		setcookie("token", $token, strtotime('+1 year'), '/');
		
		# Send them to the main page - or whever you want them to go
		Router::redirect("/");
					
		}
	# Login failed
	#if($token == "") 
	}
	
	public function logout() {
	
	# Generate and save a new token for next login
	$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
	# Create the data array we'll use with the update method
	# In this case, we're only updating one field, so our array only has one entry
	$data = Array("token" => $new_token);
	
	# Do the update
	DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
	# Delete their token cookie - effectively logging them out
	setcookie("token", "", strtotime('-1 year'), '/');
	
	echo "You have been logged out.";
	# Send them back to the login page
		Router::redirect("/users/login/");

	}
	
	public function profile($user_name = NULL) {
	
	if($user_name == NULL) {
			echo "No user Specified. <a href='/users/login'>Login</a>";
		}
	else {
	
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
		echo "Members only. <a href='/users/login'>Login</a>";
		
		# Return will force this method to exit here so the rest of 
		# the code won't be executed and the profile view won't be displayed.
		return false;
		}
	
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile for ".$user_name;
		
		# Load CSS / JS
		$client_files = Array(
				"/css/daisy.css",
				"/js/users.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);

		# Pass information to the view
		$this->template->content->user_name = $user_name;
				
		# Render template
		echo $this->template;
		}	
	}
		
} # end of the class