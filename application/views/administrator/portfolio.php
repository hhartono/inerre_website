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
          	<section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> All Portfolios</h3>
		  		
		  	<div class="row mt">
              <div class="col-lg-12">
                  <div class="content-panel">
                        <!-- <h4>
                            <i class="fa fa-angle-right"></i>Products
                        </h4> -->
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
                          <section id="no-more-tables">
                          <?php
                            if(isset($loadAllPortfolio)){
                          ?>
                              <table id="tableproduct" class="table table-striped cf display">
                                  <thead>
                                    <!-- <th>No.</th> -->
                                    <th>No</th>
                                    <th>Project</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody>
                          <?php
                                $no=1;
                                foreach ($loadAllPortfolio as $lap) {
                          ?>
                                    <tr>
                                        <!-- <td data-title="No"><?php// echo $no;?></td> -->
                                        <td data-title="Kode">
                                            <?php echo $no;?>
                                        </td>
                                        <td data-title="Title"><?php echo $lap->portfolio_title;?></td>
                                        <td data-title="Description"><?php echo $lap->portfolio_description;?></td>
                                        <td data-title="Action">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal" 
                                                    data-title="<?php echo $lap->portfolio_title;?>" 
                                                    data-description="<?php echo $lap->portfolio_description;?>" >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#editModal"
                                                    data-edittitle="<?php echo $lap->portfolio_title;?>" 
                                                    data-editdescription="<?php echo $lap->portfolio_description;?>" 
                                                    data-idportfolio="<?php echo $lap->id;?>"
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#deleteModal"
                                                    data-deletetitle="<?php echo $lap->portfolio_title;?>"
                                                    data-idportfolio="<?php echo $lap->id;?>"
                                                >
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                          <?php
                                    $no++;
                                }
                          ?>
                                  </tbody>
                              </table>
                          <?php
                            }else{
                          ?>
                              <table id="tableproduct" class="table table-striped cf display">
                                    <thead>
                                        <!-- <th>No.</th> -->
                                        <<th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                              </table>
                          <?php
                            }
                          ?>
                          </section>


                    <!-- MODAL FOR VIEW DETAIL -->
                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="viewModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td class="bolder">Title</td>
                                        <td id="title-table"></td>
                                    </tr>
                                    <tr>
                                        <td class="bolder">Description</td>
                                        <td id="description-table"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                    </div>  
                    <!-- END MODAL FOR VIEW DETAIL -->
                    
                    <!-- MODAL FOR EDIT -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="editModalLabel">Modal title</h4>
                                </div>

                                <form method="POST" class="form-horizontal style-form">
                                    <div class="modal-body">
                                    <div id="message_result_edit"></div>
                                        <!-- <input type="hidden" name="idportfolio" id="idportfolio" value=""> -->
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Title</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="title" id="title" class="form-control">
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="description" id="description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" id="submitupdateproduct" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                    <!-- END MODAL FOR EDIT ->

                    <!-- MODAL FOR DELETE -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    </div>
                    <!-- END MODAL FOR DELETE -->
                    

                  </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

			</section><! --/wrapper -->
        </section><!-- /MAIN CONTENT -->
        <!--main content end-->

        <script src="/assets_admin/js/jquery.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            // data table of products
            $('#tableproduct').DataTable();

        });

        /*
         * modal for view product
         */
        $('#viewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var title = button.data('title')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-title').text(title)
            modal.find('.modal-body table tr td#title-table').text(title)
            modal.find('.modal-body table tr td#description-table').text(description)
        });

        /*
         * modals for edit product
         */
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var title = button.data('edittitle')
            var description = button.data('editdescription')
            var idportfolio = button.data('idportfolio')
            var modal = $(this)
            modal.find('.modal-title').text('Edit ' + title)
            modal.find('.modal-body div.form-group div input#title').val(title)
            modal.find('.modal-body div.form-group div input#description').val(description)
            modal.find('.modal-body div.form-group div input#idportfolio').val(idportfolio)
        });
        
        $('#editModal').on('hidden.bs.modal',function(){
            location.reload();
        })
      
        /*
         * modal for delete product
         */
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var deletetitle = button.data('deletetitle')
            var idportfolio = button.data('idportfolio')
            var modal = $(this)
            modal.find('.modal-title').text(deletetitle)
            modal.find('.modal-body h2#h2alert').text('Hapus  ' +deletetitle)
            modal.find('.modal-footer a#deletelink').attr("href", 'portfoliodelete/'+idportfolio)
        });

        
        </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>