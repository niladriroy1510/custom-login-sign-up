<div id="registration_rom">
    
    <?php
    $err = '';
    $success = '';
 
    global $wpdb, $PasswordHash, $current_user, $user_ID;
 
    if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
 
        
        $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
        $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
        $first_name = $wpdb->escape(trim($_POST['first_name']));
        $phone_number = $wpdb->escape(trim($_POST['phone_number']));
        $business_sector = $wpdb->escape(trim($_POST['business_sector']));
        $last_name = $wpdb->escape(trim($_POST['last_name']));
        $email = $wpdb->escape(trim($_POST['email']));
        $username = $wpdb->escape(trim($_POST['username']));
        
        if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
            $err = 'Please don\'t leave the required fields.';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err = 'Invalid email address.';
        } else if(email_exists($email) ) {
            $err = 'Email already exist.';
        } else {
 
            $user_id = wp_insert_user( array (
                'first_name' => apply_filters('pre_user_first_name', $first_name), 
                'last_name' => apply_filters('pre_user_last_name', $last_name), 
                'user_pass' => apply_filters('pre_user_user_pass', $pwd1), 
                'user_login' => apply_filters('pre_user_user_login', $username), 
                'user_email' => apply_filters('pre_user_user_email', $email), 
                'business_sector' => 'business_sector', 
                'phone_number' => 'phone_number', 
                'role' => 'subscriber' ) );
            if( is_wp_error($user_id) ) {
                $err = 'Error on user creation.';
            } else {
                do_action('user_register', $user_id);
                if (get_user_meta($userID, 'business_sector', true)){
                      update_user_meta( $user_id, 'business_sector', $_POST['business_sector'], true );
                }else{
                      add_user_meta( $user_id, 'business_sector', $_POST['business_sector'], false );
                }
                if (get_user_meta($userID, 'phone_number', true)){
                      update_user_meta( $user_id, 'phone_number', $_POST['phone_number'], true );
                }else{
                      add_user_meta( $user_id, 'phone_number', $_POST['phone_number'], false );
                }
                $success = 'You\'re successfully register';
            }
            
        }
        
    }
    ?>
 
        <!--display error/success message-->
    <div id="message">
        <?php 
            if(! empty($err) ) :
                echo '<p class="error">'.$err.'';
            endif;
        ?>
        
        <?php 
            if(! empty($success) ) :
                echo '<p class="error">'.$success.'';
            endif;
        ?>
    </div>
 
    <form method="post">
        <p><label>Last Name</label></p>
        <p><input type="text" value="" name="last_name" id="last_name" /></p>
        <p><label>First Name</label></p>
        <p><input type="text" value="" name="first_name" id="first_name" /></p>
        <p><label>Email</label></p>
        <p><input type="text" value="" name="email" id="email" /></p>
        <p><label>Username</label></p>
        <p><input type="text" value="" name="username" id="username" /></p>
        <p><label>Password</label></p>
        <p><input type="password" value="" name="pwd1" id="pwd1" /></p>
        <p><label>Password again</label></p>
        <p><input type="password" value="" name="pwd2" id="pwd2" /></p>
        <p><label>Business Sector</label></p>
        <p><input type="text" value="" name="business_sector" id="business_sector" /></p>
        <p><label>Phone Number</label></p>
        <p><input type="text" value="" name="phone_number" id="phone_number" /></p>
        <div class="alignleft"><p><?php if($sucess != "") { echo $sucess; } ?> <?php if($err != "") { echo $err; } ?></p></div>
        <button type="submit" name="btnregister" class="button" >Submit</button>
        <input type="hidden" name="task" value="register" />
    </form>

    <a id="displayLoginForm" href="#">Login Form</a>
 
</div>

<div id="login_form" style="display:none">
    <?php wp_login_form(); ?>
    <a id="displayRegistrationForm" href="#">Sign Up</a>
</div>


<script type="text/javascript">

(function( $ ) {
  $(function() {

    $('#displayLoginForm').click(function() {
        $('#registration_rom').hide(400);
        $('#login_form').delay(400).show();
    });

    $('#displayRegistrationForm').click(function() {
        $('#login_form').hide(400);
        $('#registration_rom').delay(400).show();
    });

  });
})(jQuery);

</script>