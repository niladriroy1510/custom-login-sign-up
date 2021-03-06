<?php
 /**
	Template Name:Sign up Page 
 **/
 get_header();
?>


	<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

	
	<div class="tab_container_login">
		<div id="tab1_login" class="tab_content_login">
		
 <?php $register = $_GET['register']; if ($register == true) { ?>

			<h3>Success!</h3>
			<p>Check your email for the password and then return to log in.</p>

			<?php } ?>

		</div>
		
		
		<div id="tab2_login" class="tab_content_login">
			<h3>Register for this site!</h3>
			<p>Sign up now for the good stuff.</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username'); ?>: </label>
					<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
				</div>
				<div class="password">
					<label for="user_email"><?php _e('Your Email'); ?>: </label>
					<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
				</div>
				<div class="login_fields">
					<?php do_action('register_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit" tabindex="103" />
					<?php $register = $_GET['register']; if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?register=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
	
	</div>
	

	<?php } ?>



<?php get_footer(); ?>