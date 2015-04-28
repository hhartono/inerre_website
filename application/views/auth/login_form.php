<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>I N E R R E Administrator Login Page</title>
    <link rel="shortcut icon" href="/assets_admin/img/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="/assets_admin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets_admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/assets_admin/css/style.css" rel="stylesheet">
    <link href="/assets_admin/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
		
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page">
	  	<div class="container">

			<?php
			$form_attr = array(
				'class' => 'form-login',
				'id' => 'form'
			);
			if ($login_by_username AND $login_by_email) {
				$login_label = 'Email or Username';
			} else if ($login_by_username) {
				$login_label = 'Login';
			} else {
				$login_label = 'Email';
			}
			$login = array(
				'name'	=> 'username',
				'id'	=> 'username',
				'value' => set_value('login'),
				'maxlength'	=> 80,
				'size'	=> 30,
				'class' => 'form-control',
				'placeholder' => 'Email or Username'
			);
			
			$password = array(
				'name'	=> 'password',
				'id'	=> 'password',
				'size'	=> 30,
				'class' => 'form-control',
				'placeholder'=> 'Password'
			);
			$remember = array(
				'name'	=> 'remember',
				'id'	=> 'remember',
				'value'	=> 1,
				'checked'	=> set_value('remember'),
				'style' => 'margin:0;padding:0',
			);
			$captcha = array(
				'name'	=> 'captcha',
				'id'	=> 'captcha',
				'maxlength'	=> 8,
			);
			?>
				<?php echo form_open('auth/login', $form_attr); ?>
					<h2 class="form-login-heading">Login</h2>
					<div class="login-wrap">
						
						<?php echo form_input($login); ?>
						<!-- Error Notice -->
						<?php echo form_error($login['name']); ?>
						<?php echo isset($errors[$login['name']])? '<div class="alert error"><i class="fa fa-lg  fa-times-circle"></i> '.$errors[$login['name']].'</div>'  :  ''; ?>
						<br>
						

						<?php echo form_password($password); ?>
						<!-- Error Notice -->
						<?php echo form_error($password['name']); ?>
						<?php echo isset($errors[$password['name']])? '<div class="alert error"><i class="fa fa-lg  fa-times-circle"></i> '.$errors[$password['name']].'</div>' : ''; ?>
						<br>


						<?php if ($show_captcha) {
							if ($use_recaptcha) { ?>
								<div id="recaptcha_image"></div>
								<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
								<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
								<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
							
								<div class="recaptcha_only_if_image">Enter the words above</div>
								<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
								<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
								<?php echo form_error('recaptcha_response_field'); ?>
							<?php echo $recaptcha_html; ?>
						
						<?php } else { ?>
						
								<p>Enter the code exactly as it appears:</p>
								<?php echo $captcha_html; ?>
								<?php echo form_label('Confirmation Code', $captcha['id']); ?>
								<?php echo form_input($captcha); ?>
								<?php echo form_error($captcha['name']); ?>
						<?php }
						} ?>
						<?php echo form_checkbox($remember); ?>
						<?php echo form_label('Remember Me', $remember['id']); ?>
						<?php echo anchor('/auth/forgot_password/', 'Forgot Password'); ?>
						<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
							
					<?php //echo form_submit('submit', 'Let me in'); ?>
						<input type="submit" value="Let me in" class="btn btn-theme btn-block">
					</div>
				<?php echo form_close(); ?>
		</div>
	</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/assets_admin/js/jquery.js"></script>
    <script src="/assets_admin/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/assets_admin/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/assets/images/subheader/subheader_about_2.jpg", {speed: 500});
    </script>


  </body>
</html>