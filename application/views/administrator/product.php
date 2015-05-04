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
          	<h3><i class="fa fa-angle-right"></i> All Products</h3>
		  		
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
                            if(isset($loadAllBarang)){
                          ?>
                              <table id="tableproduct" class="table table-striped cf display">
                                  <thead>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th class="numeric">Stock</th>
                                    <th class="numeric">Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody>
                          <?php
                              foreach ($loadAllBarang as $lab) {
                          ?>
                                  <tr>
                                    <td data-title="Kode"><?php echo $lab->kode_barang;?></td>
                                    <td data-title="Barang"><?php echo $lab->nama_barang;?></td>
                                    <td data-title="Kategori"><?php echo $lab->barang_kategori;?></td>
                                    <td class="numeric" data-title="Stock"><?php echo $lab->stock_barang;?></td>
                                    <td class="numeric" data-title="Harga">Rp. <?php echo number_format($lab->harga_jual);?></td>
                                    <td data-title="Status">
                                      <label for="" class="label label-<?php echo ($lab->id_status==1)? 'primary' : 'warning';?>">
                                        <?php echo $lab->barang_status;?>
                                      </label>
                                    </td>
                                    <td data-title="Action">
                                      <div class="btn-group">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal" data-kode="<?php echo $lab->kode_barang;?>" data-barang="<?php echo $lab->nama_barang;?>" data-kategori="<?php echo $lab->barang_kategori;?>" data-stock="<?php echo $lab->stock_barang;?>" data-hargabeli="<?php echo $lab->harga_beli;?>" data-hargajual="<?php echo $lab->harga_jual;?>" data-status="<?php echo $lab->barang_status;?>">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button class="btn btn-success" data-toggle="modal" data-target="#editModal"  data-kode="<?php echo $lab->kode_barang;?>" data-barang="<?php echo $lab->nama_barang;?>" data-kategori="<?php echo $lab->barang_kategori;?>" data-stock="<?php echo $lab->stock_barang;?>" data-hargabeli="<?php echo $lab->harga_beli;?>" data-hargajual="<?php echo $lab->harga_jual;?>" data-status="<?php echo $lab->barang_status;?>" data-loadstatus='<?php echo $loadStatusBarang;?>' data-idbarang="<?php echo $lab->idbarang;?>" data-loadkategori='<?php echo $loadKategori;?>'>
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#deleteModal" data-kode="<?php echo $lab->kode_barang;?>" data-barang="<?php echo $lab->nama_barang;?>" data-idbarang="<?php echo $lab->idbarang;?>">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                      </div>
                                      <button class="btn btn-danger" data-toggle="modal" data-target="#updateStockBarang"><i class="fa fa-edit"></i> Update Stock</button>
                                    </td>
                                  </tr>
                          <?php
                              }
                          ?>
                                  </tbody>
                              </table>
                          <?php
                            }else{
                          ?>
                              <table id="tableproduct" class="table table-striped cf display">
                                  <thead>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th class="numeric">Stock</th>
                                    <th class="numeric">Harga</th>
                                    <th>Status</th>
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
                                                        <td class="bolder">Kategori</td>
                                                        <td id="kategori-table"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bolder">Status Barang</td>
                                                        <td id="status-table"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bolder">Stock</td>
                                                        <td id="stock-table"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bolder">Harga Beli</td>
                                                        <td id="beli-table"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bolder">Harga Jual</td>
                                                        <td id="jual-table"></td>
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
                                        <form action="/administrator/productupdatesubmit" method="POST" class="form-horizontal style-form">
                                            <div class="modal-body">
                                            <div id="message_result_edit"></div>
                                                <input type="hidden" name="idbarang" id="idbarang" value="">
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Barang</label>
                                                      <div class="col-sm-10">
                                                         <input type="text" name="nama" id="nama" class="form-control">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori-edit" class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                                    <div class="col-sm-10">
                                                        <select onChange="generatecode();" name="kategori-edit" id="kategori-edit" class="form-control" data-placeholder="Pilih Kategori..." >
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="kode" id="kode" class="form-control" DISABLED>
                                                        <input type="hidden" name="kode-hidden" id="kode-hidden" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Stock</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="stock" id="stock" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Harga Beli</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="harga_beli" id="hargabeli" class="form-control" placeholder="Rp.">
                                                        <span class="help-block">Jika barang titip jual, isi harga beli dengan 0</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="harga_jual" id="hargajual" class="form-control"  placeholder="Rp.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="statusbarang-edit" class="col-sm-2 col-sm-2 control-label">Status Barang</label>
                                                    <div class="col-sm-10">
                                                        <select name="status" id="statusbarang-edit" class="form-control"></select>
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
        })

        function submitUpdateProduct(){
            $('#submitupdateproduct').click(function(){
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
                    $('select#statusbarang-edit').css('border-color', '#e41919 !important');
                    proceed = false;
                }
                if(proceed){
                    $.ajax({
                        type: "POST",
                        url: "productupdatesubmit",
                        data: {idbarang:idbarang, nama: nama, kategori: kategori, kode: kode, stock: stock, harga_beli: hargabeli, harga_jual: hargajual, status: idstatus},
                        dataType: "json",
                        success: function(response){
                            if(response.type=='error'){
                                //console.log(response.content_form);   
                                output = '<div class="alert alert-danger">' + response.content_form + '</div>';
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

        function generatecode(){
            var kategori = $('select[name=kategori-edit]').val();
            $.ajax({
                type: "POST",
                url: "generateproductcode",
                data: {kategori: kategori},
                dataType: "JSON",
                success: function(response){
                    //console.log(response.kodebarang);
                    $('#kode').val(response.kodebarang);
                    $('#kode-hidden').val(response.kodebarang);
                }
            })
        }

        /*
         * modal for view product
         */
        $('#viewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var kode = button.data('kode')
            var barang = button.data('barang')
            var kategori = button.data('kategori');
            var stock = button.data('stock')
            var hargabeli = button.data('hargabeli')
            var hargajual = button.data('hargajual')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-title').text(kode + ' - ' +barang)
            modal.find('.modal-body table tr td#stock-table').text(stock)
            modal.find('.modal-body table tr td#kategori-table').text(kategori)
            modal.find('.modal-body table tr td#status-table').text(status)
            modal.find('.modal-body table tr td#beli-table').text('Rp. ' +hargabeli)
            modal.find('.modal-body table tr td#jual-table').text('Rp. ' +hargajual)
        });

        /*
         * modals for edit product
         */
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var idbarang = button.data('idbarang')
            var kode = button.data('kode')
            var barang = button.data('barang')
            var kategori = button.data('kategori');
            var stock = button.data('stock')
            var hargabeli = button.data('hargabeli')
            var hargajual = button.data('hargajual')
            var status = button.data('status')
            var statusjson = button.data('loadstatus')
            var selectstatus = $('#statusbarang-edit')
            var kategorijson = button.data('loadkategori')
            var selectkategori = $('#kategori-edit')
            var modal = $(this)
            modal.find('.modal-title').text('Edit ' + kode + ' - ' +barang)
            modal.find('.modal-body input#idbarang').val(idbarang)
            modal.find('.modal-body div.form-group div input#nama').val(barang)
            modal.find('.modal-body div.form-group div input#kode').val(kode)
            modal.find('.modal-body div.form-group div input#kode-hidden').val(kode)
            modal.find('.modal-body div.form-group div input#stock').val(stock)
            modal.find('.modal-body div.form-group div input#hargabeli').attr('placeholder', 'Rp. ').val(hargabeli)
            modal.find('.modal-body div.form-group div input#hargajual').attr('placeholder', 'Rp. ').val(hargajual)
            selectkategori.html('')
            $.each(kategorijson, function(i, obj){
                if(obj.barang_kategori==kategori){
                    selectkategori.prepend('<option value="'+obj.id+'" SELECTED>'+obj.barang_kategori+'</option>');
                }else{
                    selectkategori.prepend('<option value="'+obj.id+'">'+obj.barang_kategori+'</option>');
                }
            })
            selectstatus.html('')
            $.each(statusjson, function(i, obj){
                if(obj.barang_status==status){
                    selectstatus.prepend('<option value="'+obj.id+'" SELECTED>'+obj.barang_status+'</option>')
                }else{
                    selectstatus.prepend('<option value="'+obj.id+'">'+obj.barang_status+'</option>')    
                }
                
            })
            $('#kategori-edit').chosen({
                no_results_text: "Kategori yang dicari tidak ada",
                width:"100%"
            });
            submitUpdateProduct();
        });
        
        $('#editModal').on('hidden.bs.modal',function(){
            location.reload();
        })
      
        /*
         * modal for delete product
         */
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var kode = button.data('kode')
            var barang = button.data('barang')
            var idbarang = button.data('idbarang')
            var modal = $(this)
            modal.find('.modal-title').text(kode + ' - ' +barang)
            modal.find('.modal-body h2#h2alert').text('Hapus  ' +barang+' ( kode: '+kode+' ) ?')
            modal.find('.modal-footer a#deletelink').attr("href", 'productdelete/'+idbarang)
        });

        </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>