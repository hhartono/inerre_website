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
                                        <input type="text" name="input_category" class="form-control" id="input_category">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kodekategori" class="col-sm-2 col-sm-2 control-label">Kode Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="input_categorycode" class="form-control" id="input_categorycode">
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
                        <div id="data" class="">
                            <section>
                                <table id="table-category" class="table cf display">
                                    <thead>
                                        <tr>
                                        <th>Kategori</th>
                                        <th>Kode Kategori</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>

                            </section>
                        </div>
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
                                <!-- <form action="/administrator/categoryupdatesubmit" method="POST" class="form-horizontal style-form"> -->
                                <form method="POST" class="form-horizontal style-form">
                                    <div class="modal-body">
                                        <div id="message_result_edit"></div>
                                        <input type="hidden" name="idcat" id="idcat" value="">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="input_category_edit" id="input_category_edit" class="form-control">
                                                 <input type="hidden" name="hidden_category_edit" id="hidden_category_edit" value="">
                                              </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="input_categorycode_edit" id="input_categorycode_edit" class="form-control">
                                                <input type="hidden" name="hidden_categorycode_edit" id="hidden_categorycode_edit" value="">
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

        <script src="/assets_admin/js/jquery.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            // load all category
            loadCategory();
            submitCategory();
            submitUpdateCategory();
        })

        /*
         * load all category
         */
        function loadCategory(){
            $.ajax({
                type: "POST",
                url:"loadcategory",
                dataType: "json",
                success:function(response){
                    //var tablecat = '<section><table id="table-category" class="table cf display">'+
                    //                '<thead><tr><th>Kategori</th><th>Kode Kategori</th><th>Action</th></tr></thead>'+
                    //                '</table></section>';
                    //var trFirst = '';
                    //$('#data').append(tablecat);
                    //$('#table-category').after(trFirst);
                    $('#table-category').append('<tbody></tbody>');
                    if(!response){
                        console.log('NULL');
                    }else{
                        var datatablecat;
                        $.each(response, function(key, value){
                            //console.log(value.barang_kategori);
                            datatablecat = '<tr>'+
                                                '<td>'+ value.barang_kategori +'</td>'+
                                                '<td>'+ value.kategori_kode +'</td>'+
                                                '<td>'+
                                                    '<div class="btn-group">'+
                                                    '<button class="btn btn-success" data-toggle="modal" data-target="#editcatModal" data-idcat="'+value.id+'" data-category="'+ value.barang_kategori +'" data-categorycode="'+ value.kategori_kode +'">'+
                                                        '<i class="fa fa-edit"></i>'+
                                                    '</button>'+
                                                    '<button class="btn btn-primary" data-toggle="modal" data-target="#deletecatModal" data-idcat="'+value.id+'" data-category="'+ value.barang_kategori +'" data-categorycode="'+ value.kategori_kode +'">'+
                                                        '<i class="fa fa-trash-o"></i>'+
                                                    '</button>'+
                                                    '</div>'+
                                                '</td>'+
                                            '</tr>';
                            $('#table-category tbody').append(datatablecat);

                        });
                        //$('#table-category tbody tr td.dataTables_empty').hide();
                    } 
                    $('#table-category').DataTable();      
                }
            })
        }
        /*
         * submit category
         */
        function submitCategory(){
            $("#submitcategory").click(function(){
                var output = "";
                var category = $('input[name=input_category]').val();
                var categorycode = $('input[name=input_categorycode]').val();

                var proceed = true;
                if(category == ""){
                    $('input[name=input_category]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(categorycode == ""){
                    $('input[name=input_categorycode]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                $("input.form-error-focus:first").focus().removeClass('form-error-focus');
                $("#message_result").hide().html(output).slideDown();
                if(proceed){
                    $.ajax({
                        type: "POST",
                        url:"categoryaddsubmit",
                        data:{category: category, categorycode: categorycode},
                        dataType: "json",
                        success:function(response){
                            //console.log(response.type);
                            if(response.type =='error'){
                                output = '<div class="alert alert-danger">' + response.text + '</div>';
                            }else{
                                //reset values in all input fields
                                $('input#input_category').val('');
                                $('input#input_categorycode').val('');
                                //console.log(response);
                                output = '<div class="alert alert-success">' + response.text + '</div>';
                                tabledata = '<tr><td>'+ response.datainsert.category +'</td>'+
                                            '<td>'+ response.datainsert.categorycode +'</td>'+
                                            '<td>'+
                                                '<div class="btn-group">'+
                                                '<button class="btn btn-success" data-toggle="modal" data-target="#editcatModal" data-idcat="'+response.datainsert.id+'" data-category="'+response.datainsert.category+'" data-categorycode="'+response.datainsert.categorycode+'"><i class="fa fa-edit"></i></button>'+
                                                '<button class="btn btn-primary" data-toggle="modal" data-target="#deletecatModal" data-idcat="'+response.datainsert.id+'" data-category="'+response.datainsert.category+'" data-categorycode="'+response.datainsert.categorycode+'"><i class="fa fa-trash-o"></i></button></td>'
                                                '</div>'+
                                            '</td></tr>';
                                $('#table-category tbody tr:first').before(tabledata);
                            }
                            $("#message_result").hide().html(output).slideDown();
                            $('#table-category tbody tr td.dataTables_empty').parent().hide();
                        }
                    });
                }
                return false;
            })
            //reset previously set border colors and hide all message on .keyup()
            $("input#input_category, input#input_categorycode").keyup(function(){
                $("input#input_category, input#input_categorycode").css('border-color', '');
                $("#message_result").slideUp();
            });
        }

        /*
         * submit update category
         */
        function submitUpdateCategory(){
            $('#submitupdatecategory').click(function(){
                var idcat = $('input[name=idcat]').val();
                var category = $('input[name=input_category_edit]').val();
                var categorycurrent = $('input[name=hidden_category_edit]').val();
                var categorycode = $('input[name=input_categorycode_edit]').val();
                var categorycodecurrent = $('input[name=hidden_categorycode_edit]').val();

                var proceed = true;
                if(category == ""){
                    $('input[name=input_category_edit]').css('border-color', '#e41919');
                    proceed = false;
                }
                if(categorycode == ""){
                    $('input[name=input_categorycode_edit]').css('border-color', '#e41919');
                    proceed = false;
                }
                if(proceed){
                    $.ajax({
                        type: "POST",
                        url:"categoryupdatesubmit",
                        data:{idcat: idcat,category: category, categorycurrent: categorycurrent, categorycode: categorycode, categorycodecurrent: categorycodecurrent},
                        dataType: "json",
                        success:function(response){
                            console.log(response.type);
                            if(response.type =='error'){
                                output = '<div class="alert alert-danger">' + response.text + '</div>';
                            }else{
                                output = '<div class="alert alert-success">' + response.text + '</div>';
                                $('#hidden_category_edit').val(response.dataupdate.category);
                                $('#hidden_categorycode_edit').val(response.dataupdate.categorycode);
                            }
                            $("#message_result_edit").hide().html(output).slideDown();
                        }
                    });
                }
                return false;
            })
            //reset previously set border colors and hide all message on .keyup()
            $("input#input_category_edit, input#input_categorycode_edit").keyup(function(){
                $("input#input_category_edit, input#input_categorycode_edit").css('border-color', '');
                $("#message_result_edit").slideUp();
            });
        }
        
        /*
         * modals for edit category
         */
        $('#editcatModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var idcat = button.data('idcat')
            var category = button.data('category')

            var categorycode = button.data('categorycode')
            var modal = $(this)
            modal.find('.modal-title').text('Edit ' + categorycode + ' - ' +category)
            modal.find('.modal-body input#idcat').val(idcat)
            modal.find('.modal-body div.form-group div input#input_category_edit').val(category)
            modal.find('.modal-body div.form-group div input#hidden_category_edit').val(category)
            modal.find('.modal-body div.form-group div input#input_categorycode_edit').val(categorycode)
            modal.find('.modal-body div.form-group div input#hidden_categorycode_edit').val(categorycode)
        });
        $('#editcatModal').on('hidden.bs.modal',function(){
            location.reload();
        })
        /*
         * modal for delete category
         */
        $('#deletecatModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var categorycode = button.data('categorycode')
            var category = button.data('category')
            var idcat = button.data('idcat')
            var modal = $(this)
            modal.find('.modal-title').text(categorycode + ' - ' +category)
            modal.find('.modal-body h2#h2alert').text('Hapus ' +category+' ( kode: '+categorycode+' ) ?')
            modal.find('.modal-footer a#deletelink').attr("href", 'categorydelete/'+idcat)
        });
    </script>
<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>