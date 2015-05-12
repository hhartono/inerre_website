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
          	<h3><i class="fa fa-angle-right"></i> Cart</h3>
		  		
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
                            if(isset($loadCartbyUser)){

                            $totalprice = '';
                          ?>
                              <table id="tablecart" class="table table-striped cf display">
                                  <thead>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th class="numeric">Jumlah</th>
                                    <th class="numeric">Harga Satuan</th>
                                    <th class="numeric">Subtotal</th>
                                  </thead>
                                  <tbody>
                          <?php
                                // $no=1;
                                foreach ($loadCartbyUser as $lcu) {

                          ?>
                                    <tr>
                                        <td data-title="Kode Barang">
                                        <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#deleteFromCartModal">
                                            <i class="fa fa-minus"></i>
                                        </button>&nbsp;
                                        <?php echo $lcu->kode_barang;?></td>
                                        <td data-title="Barang"><?php echo $lcu->nama_barang;?></td>
                                        <td class="numeric" data-title="Jumlah"><?php echo $lcu->amount;?>
                                        </td>
                                        <td class="numeric" data-title="Harga Satuan">Rp. <?php echo number_format($lcu->harga_jual);?></td>
                                        <td data-title="Harga Subtotal">Rp. <?php echo number_format($lcu->amount*$lcu->harga_jual);?></td>
                                    </tr>
                                    
                          <?php
                                    $totalprice = $totalprice + ($lcu->amount*$lcu->harga_jual);
                                }
                          ?>
                                  </tbody>
                              </table>
                                <div class="">
                                    <h3 style="float:right;">Total: Rp. <?php echo number_format($totalprice);?></h3>    
                                </div>
                              
                          <?php
                            }else{
                          ?>
                              <table id="tablecart" class="table table-striped cf display">
                                    <thead>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th class="numeric">Jumlah</th>
                                        <th class="numeric">Harga Satuan</th>
                                        <th class="numeric">Subtotal</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                              </table>
                          <?php
                            }
                          ?>
                          </section>
                    

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
            $('#tablecart').DataTable({
                paging:false,
                searching:false,
                ordering:false,
                "language":{
                    "emptyTable": "Cart Empty"
                }
            });
        })

        function submitUpdateProduct(){
            $('#submitupdateproduct').click(function(){
                var output = "";
                var idbarang = $('input[name=idbarang]').val();
                var nama = $('input[name=nama]').val();
                var kategori = $('select[name=kategori-edit]').val();
                var kode = $('input[name=kode-hidden]').val();
                var stock = $('input[name=stock]').val();
                var hargabeli = $('input[name=harga_beli]').val();
                var hargajual = $('input[name=harga_jual]').val();
                var idstatus = $('select[name=status]').val();
                var proceed = true;
                if(nama == ""){
                    $('input[name=nama]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(kategori == ""){
                    $('#kategori_edit_chosen a.chosen-single').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(kode == ""){
                    $('input[name=kode]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(stock == ""){
                    $('input[name=stock]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(hargabeli == ""){
                    $('input[name=harga_beli]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(hargajual == ""){
                    $('input[name=harga_jual]').css('border-color', '#e41919').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                if(idstatus == ""){
                    $('select#statusbarang-edit').css('border-color', '#e41919 !important').addClass('form-error-focus');
                    proceed = false;
                    output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
                }
                $("input.form-error-focus:first").focus().removeClass('form-error-focus');
                $("#message_result_edit").hide().html(output).slideDown();
                if(proceed){
                    $.ajax({
                        type: "POST",
                        url: "productupdatesubmit",
                        data: {idbarang:idbarang, nama: nama, kategori: kategori, kode: kode, stock: stock, harga_beli: hargabeli, harga_jual: hargajual, status: idstatus},
                        dataType: "json",
                        success: function(response){
                            if(response.type=='error'){
                                //console.log(response.content_form); 
                                output = '<div class="alert alert-danger">' + response.validation_errors  + '</div>';  
                                if(response.formerror.stock != ""){
                                    $('input[name=stock]').css('border-color', '#e41919').addClass('form-error-focus');
                                }
                                if(response.formerror.hargabeli != ""){
                                    $('input[name=harga_beli]').css('border-color', '#e41919').addClass('form-error-focus');
                                }
                                if(response.formerror.hargajual != ""){
                                    $('input[name=harga_jual]').css('border-color', '#e41919').addClass('form-error-focus');
                                }
                                $("input.form-error-focus:first").focus();
                                $("input.form-error-focus").removeClass('form-error-focus');
                                
                            }else{
                                //console.log(response.text);
                                output = '<div class="alert alert-success">'+ response.text +'</div>';
                            }
                            $("#message_result_edit").hide().html(output).slideDown();
                        }
                    });        
                }
                return false;
            })
            $("input#nama, select#kategori-edit, input#kode, input#stock, input#hargabeli, input#hargajual, select#statusbarang-edit").keyup(function(){
                $("input#nama, select#kategori-edit, input#kode, input#stock, input#hargabeli, input#hargajual, select#statusbarang-edit").css('border-color', '');
                $("#message_result_edit").slideUp();
            });
        }

        </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>