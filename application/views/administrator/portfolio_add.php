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
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="form-panel">
                        <!-- action="/administrator/productaddsubmit"-->
                        <form class="form-horizontal style-form " id="portfolioform" >
                        
                            <div id="message_result"></div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" id="location" name="location" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" id="description" name="description" class="form-control">
                                </div>
                            </div>
                            <!-- <input type="file" name="file" /> -->
                            <div id="portfolioDropzone" class="dropzone dropzone-previews" style="min-height:200px; border:solid 1px #ccc; cursor:pointer;"></div>
                            <div class="form-group">
                                
                            </div>
                            
                          	<div class="form-group">
                          		<div class="showback">
								<!-- <input id="submitportfolio" type="submit" value="Add Portfolio" class="btn btn-primary"> -->
                                <button type="submit" id="buttonportfolio" class="btn btn-primary">Submit data and files!</button>
								</div>
                          	</div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
            </section><! --/wrapper -->
        </section><!-- /MAIN CONTENT -->

         <!-- Modal -->
         <div class="modal fade" id="uploadSuccessModal" tabindex="-1" role="dialog" aria-labelledby="uploadSuccessModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="uploadSuccessModalLabel">Success</h4>
               </div>
               <div class="modal-body" id="uploadSuccess">
                    <h2 id="h2alert">Portfolio telah tersimpan!</h2>
               </div>
               <div class="modal-footer">
                   <a id="ok" href="/administrator/portfolio" class="btn btn-danger">Close</a>
               </div>
            </div>
           </div>
         </div>

         <!-- MODAL FOR DELETE -->
            <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="deleteModalLabel">Delete...</h4>
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
            </div>   -->
        <!-- END MODAL FOR DELETE -->
    <script src="/assets_admin/js/jquery.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){
        //submitProduct();
        
    });
    </script>
    
<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>