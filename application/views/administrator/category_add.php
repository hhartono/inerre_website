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
                    <?php
                        $message = $this->session->flashdata('message');
                        if(isset($message)){
                        ?>
                            <?php echo $message;?>
                        <?php
                        }else{
                            //echo nothing
                            echo '';
                        }
                        ?>
                    <!-- FORM CATEGORY -->
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
                    <!-- END FORM CATEGORY -->
                    
                    <!-- MODAL FOR EDIT -->
                    <div class="modal fade" id="editcatModal" tabindex="-1" role="dialog" aria-labelledby="editcatModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="editcatModalLabel">Modal title</h4>
                                </div>
                                <form action="/administrator/categoryupdatesubmit" method="POST" class="form-horizontal style-form">
                                    <div class="modal-body">
                                        <div id="message_result_edit"></div>
                                        <input type="hidden" name="idcat" id="idcat" value="">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="kategori_edit" id="kategori_edit" class="form-control">
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_edit" id="kode_edit" class="form-control">
                                                <span class="help-block">Kode harus terdiri dari 3 huruf</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" id="submitupdatecategory" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                    <!-- END MODAL FOR EDIT ->

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