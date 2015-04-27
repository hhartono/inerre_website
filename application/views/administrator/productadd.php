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
                      <form class="form-horizontal style-form" method="POST" action="/administrator/productaddsubmit">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Barang</label>
                              <div class="col-sm-10">
                                  <input type="text" name="nama" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                              <div class="col-sm-10">
                                  <input type="text" name="kode" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Stock</label>
                              <div class="col-sm-10">
                                  <input type="text" name="stock" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga Beli</label>
                              <div class="col-sm-10">
                                  <input type="text" name="harga_beli" class="form-control" placeholder="Rp.">
                                  <span class="help-block">Jika barang titip jual, isi harga beli dengan 0</span>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga Jual</label>
                              <div class="col-sm-10">
                                  <input type="text" name="harga_jual" class="form-control"  placeholder="Rp.">
                              </div>
                          </div>

							<div class="form-group">
								<label for="status" class="col-sm-2 col-sm-2 control-label">Status Barang</label>
								<div class="col-sm-10">
										
									<select name="id_status" class="form-control">
									<?php if(isset($loadStatusBarang)){
										foreach ($loadStatusBarang as $lsb){
									?>
											<option value="<?php echo $lsb->id;?>"><?php echo $lsb->barang_status;?></option>
									<?php
										}
									}else{
									?>
									  		<option value="-">----------</option>
									<?php
									}
									?>
									</select>
								</div>
							</div>
                          	
                          	<div class="form-group">
                          		<div class="showback">
								<input type="submit" value="Add Product" class="btn btn-primary">
								</div>
                          	</div>

                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>