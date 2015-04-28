<?php
	// load header
	$this->load->view('administrator/template/header_new');
	// load menu / sidebar
	$this->load->view('administrator/template/menu_new');
?>	
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Dashboard - I&nbsp;N&nbsp;E&nbsp;R&nbsp;R&nbsp;E</h3>
          		<div class="row mtbox">
                  	<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  		<a href="administrator/product">
                  		<div class="box1">
					 		<span class="li_tag"></span>
					  		<h3>Products</h3>
                  		</div>
                  			<p>Products of I&nbsp;N&nbsp;E&nbsp;R&nbsp;R&nbsp;E</p>
                  		</a>
                  	</div>
                  	<div class="col-md-2 col-sm-2 box0">
                  		<a href="administrator/messagecenter">
                  		<div class="box1">
					  		<span class="li_mail"></span>
					  		<h3>Messages</h3>
                  		</div>
					  		<p>Message Center</p>
					  	</a>
                  	</div>
                  	<div class="col-md-2 col-sm-2 box0">
                  		<div class="box1">
					  		<span class="li_stack"></span>
					  		<h3>23</h3>
                  		</div>
					  		<p>You have 23 unread messages in your inbox.</p>
                  	</div>
                  	<div class="col-md-2 col-sm-2 box0">
                  		<div class="box1">
					  		<span class="li_news"></span>
					  		<h3>+10</h3>
                  		</div>
					  		<p>More than 10 news were added in your reader.</p>
                  	</div>
                  	<div class="col-md-2 col-sm-2 box0">
                  		<div class="box1">
					  		<span class="li_data"></span>
					  		<h3>OK!</h3>
                  		</div>
					  		<p>Your server is working perfectly. Relax & enjoy.</p>
                  	</div> 	
                 </div><!-- /row mt -->	
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>