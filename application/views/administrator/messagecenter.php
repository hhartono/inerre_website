<?php 
	$this->load->view('administrator/template/header');
?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Inerre</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
			        <li><a href="#">Link</a></li>
			        <li><a href="#">Logout</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>


	<div class="container" style="padding-top:70px;">	

	<div class="row">
	<div class="col-md-12">
		<div class="">
			<label for="statusmessageoption">Message(s)</label>
			<select name="statusmessageoption" id="statusmessageoption" onchange="loadMessageStatus();">
				<option value="0">All</option>
				<option value="1">Unreplied</option>
				<option value="2">Replied</option>
			</select>

			<div id="datamessage">
				<!-- load data here -->
			</div>
		</div>
	</div>
</div>

<?php 
	$this->load->view('administrator/template/footer');
?>