<?php 
/**
Template Name: Forget Password Page
**/

get_header();
?>


	<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

	<div class="tab_container_login">
		<div id="tab1_login" class="tab_content_login">

			<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($reset == true) { ?>

			<h3>Success!</h3>
			<p>Check your email to reset your password.</p>

			<?php } elseif($reset == true){?>
				<h3>Not valid!</h3>
				<p>Please enter your email</p>
				
			<?php } ?>

		
		<div id="tab3_login" class="tab_content_login">
			<h3>Lose something?</h3>
			<p>Enter your username or email to reset your password.</p>
			<form method="post"  class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>

	</div>

	<?php } ?>







	
<?php get_footer();	?>