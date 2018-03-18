<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa lwa-divs-only">
	<span class="lwa-status"></span>
	<form class="lwa-form uk-form" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
		<div class="lwa-username uk-form-row">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-user"></i>
				<input type="text" name="log" id="lwa_user_login" class="input uk-form-large uk-width-1-1" placeholder="<?php esc_html_e( 'Username','login-with-ajax' ) ?>">
			</div>
		</div>
		<div class="lwa-password uk-form-row">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-lock"></i>
				<input type="password" name="pwd" id="lwa_user_pass" class="input uk-form-large uk-width-1-1" placeholder="<?php esc_html_e( 'Password','login-with-ajax' ) ?>">
			</div>
		</div>

			<?php do_action('login_form'); ?>
   		
   		<div class="uk-form-row uk-clearfix">
	 		<div class="lwa-submit-button uk-float-right">
				<input type="submit" name="wp-submit" id="lwa_wp-submit" class="uk-button uk-button-large uk-button-primary" value="<?php esc_attr_e('Log In','login-with-ajax'); ?>" tabindex="100" >
				<input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr($lwa_data['profile_link']); ?>" />
				<input type="hidden" name="login-with-ajax" value="login" />
				<?php if( !empty($lwa_data['redirect']) ): ?>
				<input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
				<?php endif; ?>
			</div>
			
			<div class="lwa-links uk-float-left">
				<input name="rememberme" type="checkbox" class="lwa-rememberme" value="forever" /> <label><?php esc_html_e( 'Remember Me','login-with-ajax' ) ?></label>
				<br />
	        	<?php if( !empty($lwa_data['remember']) ): ?>
				<a class="lwa-links-remember" href="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','login-with-ajax') ?>"><?php esc_attr_e('Lost your password?','login-with-ajax') ?></a>
				<?php endif; ?>
				<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
				<br />  
				<a href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" class="lwa-links-register-inline"><?php esc_html_e('Register','login-with-ajax'); ?></a>
				<?php endif; ?>
			</div>		
   		</div>
	</form>
	<?php if( !empty($lwa_data['remember']) && $lwa_data['remember'] == 1 ): ?>
	<form class="lwa-remember uk-form uk-clearfix" action="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" method="post" style="display:none;">
		<p><strong><?php esc_html_e("Forgotten Password",'login-with-ajax'); ?></strong></p>

		<div class="lwa-remember-email uk-form-row">
			<div class="uk-form-icon uk-width-1-1">
				<i class="uk-icon-envelope"></i>
				<?php $msg = __("Enter username or email",'login-with-ajax'); ?>
				<input type="text" name="user_login" id="lwa_user_remember" class="input uk-form-large uk-width-1-1" value="<?php echo esc_attr($msg); ?>" placeholder="<?php echo esc_attr($msg); ?>">
			</div>
			<?php do_action('lostpassword_form'); ?>
		</div>
 		<div class="lwa-submit-button uk-form-row uk-text-right">
			<input type="submit" class="uk-button uk-button-large uk-button-primary" value="<?php esc_attr_e("Get New Password", 'login-with-ajax'); ?>" />
			<a href="#" class="lwa-links-remember-cancel"><?php esc_attr_e("Cancel", 'login-with-ajax'); ?></a>
			<input type="hidden" name="login-with-ajax" value="remember" />         
		</div>

	</form>
	<?php endif; ?>
	<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) && $lwa_data['registration'] == 1 ) : ?>
	<div class="lwa-register" style="display:none;" >
		<form class="registerform" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
			<p><strong><?php esc_html_e('Register For This Site','login-with-ajax'); ?></strong></p>         
			<div class="lwa-username">
				<?php $msg = __('Username','login-with-ajax'); ?>
				<input type="text" name="user_login" id="user_login"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}" />   
		  	</div>
		  	<div class="lwa-email">
		  		<?php $msg = __('E-mail','login-with-ajax'); ?>
				<input type="text" name="user_email" id="user_email"  value="<?php echo esc_attr($msg); ?>" onfocus="if(this.value == '<?php echo esc_attr($msg); ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo esc_attr($msg); ?>'}"/>   
			</div>
			<?php
				//If you want other plugins to play nice, you need this: 
				do_action('register_form'); 
			?>
			<p class="lwa-submit-button">
				<?php esc_html_e('A password will be e-mailed to you.','login-with-ajax') ?>
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Register', 'login-with-ajax'); ?>" tabindex="100" />
				<a href="#" class="lwa-links-register-inline-cancel"><?php esc_html_e("Cancel", 'login-with-ajax'); ?></a>
				<input type="hidden" name="login-with-ajax" value="register" />
			</p>
		</form>
	</div>
	<?php endif; ?>
</div>