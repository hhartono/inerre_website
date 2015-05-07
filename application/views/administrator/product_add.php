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
                        <form class="form-horizontal style-form" method="POST" >
                        
                            <div id="message_result"></div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori-formproduct" class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select onChange="generatecode();" data-placeholder="Pilih Kategori..." id="kategori-formproduct" name="kategori" class="form-control">
                                        <option value=""></option>
                                <?php
                                    if(isset($loadCategory)){
                                        foreach ($loadCategory as $lk) {
                                ?>  
                                        <option value="<?php echo $lk->id;?>"><?php echo $lk->barang_kategori;?></option>
                                <?php
                                        }
                                    }else{
                                ?>
                                        <option value="">Tidak ada kategori</option>
                                <?php 
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" id="kode" name="kode" class="form-control" DISABLED>
                                    <!-- <input type="hidden" id="hidden-kode" name="hidden-kode"> -->
                                    <span class="help-block">Kode akan terisi otomatis setelah memilih kategori</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Stock</label>
                                <div class="col-sm-10">
                                    <input type="text" id="stock" name="stock" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga Beli</label>
                                <div class="col-sm-10">
                                    <input type="text" id="hargabeli" name="harga_beli" class="form-control" placeholder="Rp.">
                                    <span class="help-block">Jika barang titip jual, isi harga beli dengan 0</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
                                <div class="col-sm-10">
                                    <input type="text" id="hargajual" name="harga_jual" class="form-control"  placeholder="Rp.">
                                </div>
                            </div>

							<div class="form-group">
								<label for="status" class="col-sm-2 col-sm-2 control-label">Status Barang</label>
								<div class="col-sm-10">
										
									<select id="status" name="id_status" data-placeholder="Pilih Status Barang..." class="form-control">
                                            <option value=""></option>
									<?php if(isset($loadStatusBarang)){
										foreach ($loadStatusBarang as $lsb){
									?>
											<option value="<?php echo $lsb->id;?>"><?php echo ucwords($lsb->barang_status);?></option>
									<?php
										}
									}else{
									?>
									  		<option value="">----------</option>
									<?php
									}
									?>
									</select>
								</div>
							</div>
                          	
                          	<div class="form-group">
                          		<div class="showback">
								<input id="submitproduct" type="submit" value="Add Product" class="btn btn-primary">
								</div>
                          	</div>

                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
            </section><! --/wrapper -->
        </section><!-- /MAIN CONTENT -->

    <script src="/assets_admin/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        // jquery 'chosen' for select option category
        $('#kategori-formproduct').chosen({
            no_results_text: "Kategori yang dicari tidak ada"
        });
        $('#status').chosen({
            disable_search: true
        });
        submitProduct();
        
    });
    function submitProduct(){
        
        $('#submitproduct').click(function(){
            var output = "";
            var nama = $('input[name=nama]').val();
            var kategori = $('select[name=kategori]').val();
            var kode = $('input[name=kode]').val();
            var stock = $('input[name=stock]').val();
            var hargabeli = $('input[name=harga_beli]').val();
            var hargajual = $('input[name=harga_jual]').val();
            var idstatus = $('select[name=id_status]').val();
            var proceed = true;
            if(nama == ""){
                $('input[name=nama]').css('border-color', '#e41919').addClass('form-error-focus');
                proceed = false;
                output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
            }
            if(kategori == ""){
                $('#kategori_formproduct_chosen a.chosen-single').css('border-color', '#e41919').addClass('form-error-focus');
                proceed = false;
                output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
            }
            if(kode == ""){
                $('input[name=kode]').css('border-color', '#e41919').addClass('form-error-focus');
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
                $('#status_chosen a.chosen-single').css('border-color', '#e41919').addClass('form-error-focus');
                proceed = false;
                output = '<div class="alert alert-danger">Form harus diisi, tidak boleh kosong!</div>';
            }
            $("input.form-error-focus:first").focus().removeClass('form-error-focus');
            $("#message_result").hide().html(output).slideDown();

            if(proceed){
                $.ajax({
                    type: "POST",
                    url: "productaddsubmit",
                    data: {nama: nama, kategori: kategori, kode: kode, stock: stock, harga_beli: hargabeli, harga_jual: hargajual, id_status: idstatus},
                    dataType: "json",
                    success: function(response){
                        if(response.type=='error'){
                            //console.log(response.validation_errors);   
                            output = '<div class="alert alert-danger">' + response.validation_errors + '</div>';
                            
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
                            output = '<div class="alert alert-success">'+ response.text +' Lihat pada <a href="product">Table Product</a></div>';
                            $('#nama').val('');
                            $('#kode').val('');
                            $('#stock').val('');
                            $('#hargabeli').val('');
                            $('#hargajual').val('');
                            $('#kategori-formproduct').val('').trigger("chosen:updated");
                            $('#status').val('').trigger("chosen:updated");
                            $('#nama').focus();
                        }
                        $("#message_result").hide().html(output).slideDown();
                    }
                });        
            }
            return false;
        });
        $("input#nama, input#kode, input#stock, input#hargabeli, input#hargajual").keyup(function(){
            $("input#nama, #kategori_formproduct_chosen a.chosen-single, input#kode, input#stock, input#hargabeli, input#hargajual, #status_chosen a.chosen-single").css('border-color', '');
            $("#message_result").slideUp();
        });
        $("select#kategori-formproduct,select#status").change(function(){
            $("input#nama, #kategori_formproduct_chosen a.chosen-single, input#kode, input#stock, input#hargabeli, input#hargajual, #status_chosen a.chosen-single").css('border-color', '');
            $("#message_result").slideUp();
        })
    }

    /*
     * generate 'kode barang'
     */
    function generatecode(){
        var kategori = $('select[name=kategori]').val();
        $.ajax({
            type: "POST",
            url: "generateproductcode",
            data: {kategori: kategori},
            dataType: "JSON",
            success: function(response){
                //console.log(response.kodebarang);
                $('#kode').val(response.kodebarang);
                //$('#hidden-kode').val(response.kodebarang);
            }
        })
    }
    </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>