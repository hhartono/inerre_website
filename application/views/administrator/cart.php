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
          	<h3><i class="fa fa-angle-right"></i> Cart <?php echo $loadInvoice;?></h3>
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
                        <section id="no-more-tables" style="padding-bottom:30px;">
                          <?php
                            if(isset($loadCartbyUser)){
                                $totalprice = '';
                          ?>
                                <form method="POST" action="" >
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
                                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#deleteFromCartModal" data-idcart="<?php echo $lcu->idcart;?>" data-invoice="<?php echo $lcu->no_invoice;?>" data-amount="<?php echo $lcu->amount;?>" data-idproduct="<?php echo $lcu->idproduct;?>" data-product="<?php echo $lcu->nama_barang;?>" data-laststock="<?php echo $lcu->stock_barang;?>">
                                                    <i class="fa fa-minus"></i>
                                                </button>&nbsp;
                                                <?php echo $lcu->kode_barang;?></td>
                                                <td data-title="Barang"><?php echo $lcu->nama_barang;?></td>
                                                <td class="numeric" data-title="Jumlah">
                                                    <?php echo $lcu->amount;?>
                                                    <input type="hidden" name="hidden-cart-amount" id="hidden-cart-amount" value="<?php echo $lcu->amount;?>">
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
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div id="footer-table-cart" class="col-md-6">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelCartModal" data-invoice="<?php echo $loadInvoice;?>">Batal</button>
                                        <input type="submit" id="updatecart" value="Update Cart" class="btn btn-primary">
                                        <p>Total: Rp. <?php echo number_format($totalprice);?></p>        
                                    </div>
                                </div>

                                </form>
                                <!-- END FORM -->


                                <!-- MODAL FOR DELETE -->
                                <div class="modal fade" id="deleteFromCartModal" tabindex="-1" role="dialog" aria-labelledby="deleteFromCartModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="cartproductdelete" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="deleteFromCartModalLabel">Delete...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 id="h3alert"></h2>
                                                    <input type="hidden" name="hidden-idcart" id="hidden-idcart">
                                                    <input type="hidden" name="hidden-idproduct" id="hidden-idproduct">
                                                    <input type="hidden" name="hidden-amount" id="hidden-amount">
                                                    <input type="hidden" name="hidden-laststock" id="hidden-laststock">
                                                    <input type="hidden" name="hidden-product" id="hidden-product">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <input type="submit" id="submit-delete" class="btn btn-danger" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                                <!-- END MODAL FOR DELETE -->

                                <!-- MODAL FOR CANCEL -->
                                <div class="modal fade" id="cancelCartModal" tabindex="-1" role="dialog" aria-labelledby="cancelCartModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="cartempty" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="cancelCartModalLabel">Cancel...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 id="h3alert"></h2>
                                                    <input type="hidden" name="hidden-invoice" id="hidden-invoice">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <input type="submit" id="submit-cancel" class="btn btn-danger" value="Empty Cart">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                                <!-- END MODAL FOR CANCEL -->
                          <?php
                            }else{
                          ?>
                            <table id="tablecart" class="table table-striped cf display" >
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
            }/*,
            bInfo:false*/
        });
    })

    /*
     * modal for delete product
     */
    $('#deleteFromCartModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)// Button that triggered the modal
        var idcart = button.data('idcart')
        var product = button.data('product')
        var idproduct = button.data('idproduct')
        var invoice = button.data('invoice')
        var amount = button.data('amount')
        var laststock = button.data('laststock')
        var modal = $(this)
        modal.find('.modal-title').text(product)
        modal.find('.modal-body h3#h3alert').text('Hapus  ' +product+' dari cart?')
        modal.find('.modal-body input#hidden-idcart').val(idcart)
        modal.find('.modal-body input#hidden-idproduct').val(idproduct)
        modal.find('.modal-body input#hidden-amount').val(amount)
        modal.find('.modal-body input#hidden-laststock').val(laststock)
        modal.find('.modal-body input#hidden-product').val(product)
    });

    $('#deleteFromCartModal').on('hidden.bs.modal', function(){
        location.reload();
    });

    $('#cancelCartModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)// Button that triggered the modal
        var invoice = button.data('invoice')
        var modal = $(this)
        modal.find('.modal-title').text(invoice)
        modal.find('.modal-body h3#h3alert').text('Batalkan semua transaksi dengan No ' +invoice+' ?')
        modal.find('.modal-body input#hidden-invoice').val(invoice)
    });

    $('#cancelCartModal').on('hidden.bs.modal', function(){
        location.reload();
    });
    </script>

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>