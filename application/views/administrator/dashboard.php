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
        					   <span class="li_clip"></span>
        					   <h3>All Products</h3>
                          	</div>
                            <p>Products of I&nbsp;N&nbsp;E&nbsp;R&nbsp;R&nbsp;E</p>
                      	</a>
                  	</div>
                    <div class="col-md-2 col-sm-2 box0">
                        <a href="administrator/productadd">
                            <div class="box1">
                               <span class="li_pen"></span>
                               <h3>Add Product</h3>
                            </div>
                            <p>Add New Product</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <a href="administrator/categoryadd">
                            <div class="box1">
                               <span class="li_tag"></span>
                               <h3>Add Category</h3>
                            </div>
                            <p>Add New Category</p>
                        </a>
                    </div>
                  	<div class="col-md-2 col-sm-2 box0">
                        <a href="administrator/messagecenter">
                            <div class="box1">
                              <span class="li_mail"></span>
                              <h3>Message Center</h3>
                            </div>
    					  		     <p>Message Center</p>
    				            </a>
                  	</div>

                    <div class="col-md-2 col-sm-2 box0">
                        <a href="administrator/portfolio">
                            <div class="box1">
                              <span class="li_display"></span>
                              <h3>Portfolio</h3>
                            </div>
                         <p>Portfolio</p>
                        </a>
                    </div>
            </div><!-- /row mt -->	
            </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
    <script src="/assets_admin/js/jquery.js"></script>
<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>