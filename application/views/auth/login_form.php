<!DOCTYPE html>
<html>
    <head>
        <title>INERRE interior &mdash; Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Hans Hartono">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- Favicons -->
        <link rel="shortcut icon" href="/assets/images/favicon.png">
        <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png">
        <!-- CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/style-responsive.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <link rel="stylesheet" href="/assets/css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
        
        <!-- Load Google Analytic Code -->
        <?php //$this->load->view('public_template/analyticstracking');?>
    </head>

    <body class="">
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
		<div class="container">
			<div class="row">
			<?php
			$form_attr = array(
				'class' => 'form',
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
				'class' => 'input-md form-control',
				'placeholder' => 'Email or Username'
			);
			
			$password = array(
				'name'	=> 'password',
				'id'	=> 'password',
				'size'	=> 30,
				'class' => 'input-md form-control',
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
				<div style="margin-top:100px;" class="col-md-4 col-md-offset-4">
					<h1 class="hs-line-11 ">Login</h1>

				<?php echo form_open('auth/login', $form_attr); ?>
				
					<div class="mb-20 mb-md-10">
					<?php echo form_input($login); ?>
					<!-- Error Notice -->
					<?php echo form_error($login['name']); ?>
					<?php echo isset($errors[$login['name']])? '<div class="alert error"><i class="fa fa-lg  fa-times-circle"></i> '.$errors[$login['name']].'</div>'  :  ''; ?>
						
					</div>
					<div class="mb-20 mb-md-10">
					<?php echo form_password($password); ?>
					<!-- Error Notice -->
					<?php echo form_error($password['name']); ?>
					<?php echo isset($errors[$password['name']])? '<div class="alert error"><i class="fa fa-lg  fa-times-circle"></i> '.$errors[$password['name']].'</div>' : ''; ?>
						
					</div>

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
				<input type="submit" value="Let me in" class="col-md-12 btn btn-mod btn-border btn-medium">
				<?php echo form_close(); ?>
				</div>
			</div>

            <!-- Footer -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="/assets/images/logo-footer.png" width="50" height="80" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <a href="https://www.facebook.com/inerre.interior" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/inerre_interior" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.behance.net/inerre_interior" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                        <a href="https://www.linkedin.com/company/inerre-interior" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://pinterest.com/inerre_interior" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a href="https://www.instagram.com/inerre_interior" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <!-- End Social Links -->
                    <!-- Footer Text -->
                    <div class="footer-text">
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="/home" target="_blank">&copy; INERRE 2015</a>.
                        </div>
                        <!-- End Copyright -->
                    </div>
                    <!-- End Footer Text -->
                 </div>
                
            </footer>
            <!-- End Footer -->
        </div>
        <!-- End Page Wrap -->
        <!-- JS -->
        <script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.magnific-popup.min.js"></script>
        <!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script-->
        <script type="text/javascript" src="/assets/js/gmap3.min.js"></script>
        <script type="text/javascript" src="/assets/js/wow.min.js"></script>
        <script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="/assets/js/all.js"></script>
        <script type="text/javascript" src="/assets/js/contact-form.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.ajaxchimp.min.js"></script>
        <!--[if lt IE 10]><script type="text/javascript" src="/assets/js/placeholder.js"></script><![endif]-->
    </body>
</html>