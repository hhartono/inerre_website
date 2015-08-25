<?php
	// load header
	$this->load->view('administrator/template/header_new');
	// load menu / sidebar
	$this->load->view('administrator/template/menu_new');
?>
	<?php echo $sha1;?>
<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>