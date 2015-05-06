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
										
									<select id="status" name="id_status" class="form-control">
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
        submitProduct();
    });
    function submitProduct(){
        $('#submitproduct').click(function(){
            var nama = $('input[name=nama]').val();
            var kategori = $('select[name=kategori]').val();
            var kode = $('input[name=kode]').val();
            var stock = $('input[name=stock]').val();
            var hargabeli = $('input[name=harga_beli]').val();
            var hargajual = $('input[name=harga_jual]').val();
            var idstatus = $('select[name=id_status]').val();
            var proceed = true;
            if(nama == ""){
                $('input[name=nama]').css('border-color', '#e41919');
                proceed = false;
            }
            if(kategori == ""){
                $('#kategori_formproduct_chosen .chosen_single').css('border-color', '#e41919 !important');
                proceed = false;
            }
            if(kode == ""){
                $('input[name=kode]').css('border-color', '#e41919');
                proceed = false;
            }
            if(stock == ""){
                $('input[name=stock]').css('border-color', '#e41919');
                proceed = false;
            }
            if(hargabeli == ""){
                $('input[name=harga_beli]').css('border-color', '#e41919');
                proceed = false;
            }
            if(hargajual == ""){
                $('input[name=harga_jual]').css('border-color', '#e41919');
                proceed = false;
            }
            if(idstatus == ""){
                $('select#status').css('border-color', '#e41919 !important');
                proceed = false;
            }
            
            if(proceed){
                $.ajax({
                    type: "POST",
                    url: "productaddsubmit",
                    data: {nama: nama, kategori: kategori, kode: kode, stock: stock, harga_beli: hargabeli, harga_jual: hargajual, id_status: idstatus},
                    dataType: "json",
                    success: function(response){
                        if(response.type=='error'){
                            //console.log(response.content_form);   
                            output = '<div class="alert alert-danger">' + response.content_form + '</div>';
                            // BELUM SELESAI
                            if(response.content_form.setvaluestock != ""){
                                $('input[name=stock]').css('border-color', '#e41919').focus();
                            }
                            if(response.content_form.setvaluehargabeli != ""){
                                $('input[name=harga_beli]').css('border-color', '#e41919').focus();
                            }
                             if(response.content_form.setvaluehargajual != ""){
                                $('input[name=harga_jual]').css('border-color', '#e41919').focus();
                            }

                        }else{
                            //console.log(response.text);
                            output = '<div class="alert alert-success">'+ response.text +' Lihat pada <a href="product">Table Product</a></div>';
                            $('#nama').val('');
                            $('#kode').val('');
                            $('#stock').val('');
                            $('#hargabeli').val('');
                            $('#hargajual').val('');
                            $('#kategori_formproduct_chosen a.chosen-single span').text('Pilih Kategori...');
                            $('.chosen-result li').removeClass('result-selected');
                            $('#idstatus').prop('selected', false);
                            $('#nama').focus();
                        }
                        $("#message_result").hide().html(output).slideDown();
                    }
                });        
            }
            return false;
        });
        $("input#nama, select#kategori-formproduct, input#kode, input#stock, input#hargabeli, input#hargajual, select#status").keyup(function(){
            $("input#nama, select#kategori-formproduct, input#kode, input#stock, input#hargabeli, input#hargajual, select#status").css('border-color', '');
            $("#message_result").slideUp();
        });
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
            }
        })
    }
    </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>