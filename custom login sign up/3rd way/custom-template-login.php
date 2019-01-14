<?php 
/**
Template Name: Sign Page
**/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/cus-login/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/cus-login/css/all.css"/>
</head>
<body>	
	
	
	<div class="liton-main-section">
		<div class="liton-singup-heading">
			<h1>Sign In</h1>
		</div>
	
	<?php
		
	global $user_ID;
	global $wpdb;	
	if(!$user_ID){ 		
		if($_POST){		
		$email = $wpdb->escape($_POST['email']);
		$password = $wpdb->escape($_POST['password']);		
		$login_array = array();
		$login_array ['user_login'] = $email;
		$login_array ['user_password'] = $password;		
		$verify_user = wp_signon($login_array, true);		
		if(!is_wp_error($verify_user)){		
			echo "<script> window.location = '".site_url()."'</script>";		
		}else{
			echo "Not Valid";
		}		
		}else{ ?>		
		<div class="liton-container">			
			<form action="" method="POST">
				<p><input type="mail" name="email" placeholder="Email"/></p>
				<p><input type="password" name="password" placeholder="Password"/></p><br>
				<input type="submit" name="btn_submit" value="SIGNIN"/>				
			</form>	<br>					
			<div class="liton-facebook">
				<p><i class="fab fa-facebook-square"><span class="liton-with">SIGNIN WITH FACEBOOK</span></i></p>
			</div>
			<div class="liton-login">
				<P>Don't have an account?<a href="#">Sign Up</a></P>
			</div>			
		</div>		
<?php }	
}else{
	echo "Already You Login!";
}		
?>
</div>		
</body>
</html>