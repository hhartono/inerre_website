<?php
	// load header
	$this->load->view('administrator/template/header_new');
	// load menu / sidebar
	$this->load->view('administrator/template/menu_new');
?>	
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
                                    <th>Location</th>
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
                                        <td data-title="Location"><?php echo $lap->portfolio_location;?></td>
                                        <td data-title="Description"><?php echo $lap->portfolio_description;?></td>
                                        <td data-title="Action">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal" 
                                                    data-title="<?php echo $lap->portfolio_title;?>"
                                                    data-location="<?php echo $lap->portfolio_location;?>" 
                                                    data-description="<?php echo $lap->portfolio_description;?>" >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button class="btn btn-success" data-toggle="modal" data-target="#editModal"
                                                    data-edittitle="<?php echo $lap->portfolio_title;?>" 
                                                    data-editlocation="<?php echo $lap->portfolio_location;?>" 
                                                    data-editdescription="<?php echo $lap->portfolio_description;?>" 
                                                    data-idportfolio="<?php echo $lap->id;?>"
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a href="/administrator/portfolioprojectadd/<?php echo $lap->id;?>" class="btn btn-info" role="button"><i class="fa fa-plus"></i></a>
                                                    
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
                                        <td class="bolder">Location</td>
                                        <td id="location-table"></td>
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
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Title</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="title" id="title" class="form-control">
                                                 <input type="hidden" name="idportfolio" id="idportfolio" value="">
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="location" id="location" class="form-control">
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
                                      <button type="submit" id="submitupdateportfolio" class="btn btn-primary">Save changes</button>
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
         * modal for view portfolio
         */
        $('#viewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var title = button.data('title')
            var location = button.data('location')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-title').text(title)
            modal.find('.modal-body table tr td#title-table').text(title)
            modal.find('.modal-body table tr td#location-table').text(location)
            modal.find('.modal-body table tr td#description-table').text(description)
        });

        /*
         * modals for edit portfolio
         */
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var title = button.data('edittitle')
            var location = button.data('editlocation')
            var description = button.data('editdescription')
            var idportfolio = button.data('idportfolio')
            var modal = $(this)
            modal.find('.modal-title').text('Edit ' + title)
            modal.find('.modal-body div.form-group div input#title').val(title)
            modal.find('.modal-body div.form-group div input#location').val(location)
            modal.find('.modal-body div.form-group div input#description').val(description)
            modal.find('.modal-body div.form-group div input#idportfolio').val(idportfolio)
            submitUpdatePortfolio();
        });
        
        $('#editModal').on('hidden.bs.modal',function(){
            location.reload();
        })
      
        /*
         * modal for delete portfolio
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

        
        function submitUpdatePortfolio(){
            $('#submitupdateportfolio').click(function(){
                var output = "";
                var idportfolio = $('input[name=idportfolio]').val();
                var title = $('input[name=title]').val();
                var location = $('input[name=location]').val();
                var description = $('input[name=description]').val();
                var proceed = true;
                if(title == ""){
                    $('input[name=title]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(location == ""){
                    $('input[name=location]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(description == ""){
                    $('input[name=description]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                $("input.form-error-focus:first").focus().removeClass('form-error-focus');
                $("#message_result_edit").hide().html(output).slideDown();
                if(proceed){
                    $.ajax({
                        type: "POST",
                        url: "portfolioupdatesubmit",
                        data: {idportfolio:idportfolio, title:title, location:location, description:description},
                        dataType: "json",
                        success: function(response){
                            if(response.type=='error'){
                                console.log("error");
                                output = '<div class="alert alert-danger">' + response.validation_errors  + '</div>';  
                                
                                $("input.form-error-focus:first").focus();
                                $("input.form-error-focus").removeClass('form-error-focus');
                            }else{
                                output = '<div class="alert alert-success">'+ response.text +'</div>';
                            }
                            $("#message_result_edit").hide().html(output).slideDown();
                        }
                    }); 
                }
                return false;
            });
        }
        </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>