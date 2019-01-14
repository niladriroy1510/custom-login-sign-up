<?php
 /**
	Template Name:Sign up Page 
 **/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/cus-login/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/cus-login/css/all.css"/>
</head>
<body>	
	<div class="liton-main-section">
		<div class="liton-singup-heading">
			<h1>Sign Up</h1>
		</div>
		
<?php
	
global $wpdb;

if ($_POST){
	
	 $fullname = $wpdb->escape($_POST['textfullname']);
	 $emailuser = $wpdb->escape($_POST['textemailuser']);
	 $emailuserconf = $wpdb->escape($_POST['textemailconf']);
	 $userpass = $wpdb->escape($_POST['textuserpassword']);
	 $tarmsche = $wpdb->escape($_POST['turmscondi']);
	

	
	
	$error = array();
	 if (empty($fullname)) {
        $error['username_empty'] = "Needed Full Name must";
    }
	
	if (!is_email($emailuser)) {
        $error['email_valid'] = "Email has no valid value";
    }
	
	if (!is_email($emailuserconf)) {
        $error['email_valid'] = "Conform Email has no valid value";
    }
	
	if (strcmp($emailuser, $emailuserconf) !== 0) {
        $error['email'] = "Email didn't match";
    }

    if (email_exists($emailuser)) {
        $error['email_existence'] = "Email already exists";
    }
	
	
	if (count($error) == 0) {

        wp_create_user($fullname, $emailuser, $emailuserconf, $userpass );
			echo "<script> window.location = '".site_url()."'</script>";
        exit();
    }else{
        
        print_r($error);
        
    }
	
}
?>
		
		<div class="liton-container">			
			<form action="" method="POST">
				<p><input type="text" name="textfullname" id="textfullname" placeholder="Full Name"/></p>
				<p><input type="mail" name="textemailuser" id="textemailuser" placeholder="Email"/></p>
				<p><input type="mail" name="textemailconf" id="textemailconf" placeholder="Conform Email"/></p>
				<p><input type="password" name="textuserpassword" id="textuserpassword" placeholder="Password"/></p>
				<p><input type="checkbox" name="turmscondi" id="turmscondi" />You agree to our<a class="decoration" href="#">Terms of Use</a></p>
				<input type="submit" name="btnsubmit" value="SIGN UP"/>				
			</form>	
			<div class="liton-signup">
				<P>or sign up with Facebook</P>	
			</div>					
			<div class="liton-facebook">
				<p><i class="fab fa-facebook-square"><span class="liton-with">SIGN UP WITH FACEBOOK</span></i></p>
			</div>
			<div class="liton-login">
				<P>Already have an account?<a href="lonin.html">Log in</a></P>
			</div>
			<!-- <div class="liton-create">
				<p><a href="#">Already a full-time creator?</a></p>
			</div> -->
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>	
</body>
</html>