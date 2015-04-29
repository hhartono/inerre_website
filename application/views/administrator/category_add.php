<?php
	// load header
	$this->load->view('administrator/template/header_new');
	// load menu / sidebar
	$this->load->view('administrator/template/menu_new');
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $title_page;?></h3>
          	<div class="row mt">
                <div class="col-lg-12">

                    <div class="col-lg-6">
                       
                        <div class="form-panel">
                            <form method="POST" class="form-horizontal style-form" >
                                <div id="message_result"></div>
                                <div class="form-group">
                                    <label for="kategori" class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kategori" class="form-control" id="kategori">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kodekategori" class="col-sm-2 col-sm-2 control-label">Kode Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kodekategori" class="form-control" id="kodekategori">
                                        <span class="help-block">Kode harus terdiri dari 3 huruf</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <!-- <input type="submit" class="btn btn-primary" id="submitcategory" value="Add Category"> -->
                                        <button class="btn btn-primary" id="submitcategory">Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div id="data" class=""></div>
                    </div>
                    
                    <!-- MODAL FOR DELETE -->
                    <div class="modal fade" id="deletecatModal" tabindex="-1" role="dialog" aria-labelledby="deletecatModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="deletecatModalLabel">Delete...</h4>
                            </div>
                            <div class="modal-body">
                                <h2 id="h2alert"></h2>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a id="deletelink" href="" class="btn btn-danger">Delete</a>
                            </div>
                            </div>
                        </div>
                    </div>  
                    <!-- END MODAL FOR DELETE -->

                </div>
            </div>
		</section><!--/wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>