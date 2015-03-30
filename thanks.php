<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>inerre | coming soon</title>
	<link rel="icon" type="image/png" href="images/favico.png">
	<link href="tools/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="tools/jquery.min.js"></script> 
	<script type="text/javascript" src="tools/cufon-yui.js"></script>
	<script type="text/javascript" src="tools/Museo_Slab_100_400-Museo_Slab_700_400.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('p.big_text, p.small_text', {fontFamily: 'Museo Slab 100'});
		Cufon.replace('p.big_text strong, p.small_text strong', {fontFamily: 'Museo Slab 700'});
	</script>
</head>
<body>
<div id="transy">
</div>
<div id="wrapper">
	<div class="logo"><img src="images/logo.png" title=""></div>
	<div class="content">
		<p class="big_text"><strong>thank you!</strong> for your interest</p>
		<p class="small_text">we will get back to you as soon as we launch our website.</p>	
	</div>

	<?php
		if(!empty($_POST["email"])){
			$message = "Email has been submitted: " . $_POST["email"]; 
			mail('hanskristian.1989@gmail.com', 'Somebody Submit His/Her email', $message);
		} 
	?>
</div>
</body>
</html>
