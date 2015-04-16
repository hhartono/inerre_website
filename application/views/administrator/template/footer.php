	        <!-- Footer -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="/assets/images/logo-footer.png" width="50" height="80" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <a href="https://www.facebook.com/inerre.interior" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/inerre_interior" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.behance.net/inerre_interior" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                        <a href="https://www.linkedin.com/company/inerre-interior" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://pinterest.com/inerre_interior" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a href="https://www.instagram.com/inerre_interior" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                    <!-- End Social Links -->
                    <!-- Footer Text -->
                    <div class="footer-text">
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="/home" target="_blank">&copy; INERRE 2014</a>.
                        </div>
                        <!-- End Copyright -->
                    </div>
                    <!-- End Footer Text -->
                 </div>
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
            </footer>
            <!-- End Footer -->
        </div>
        <!-- End Page Wrap -->
        <!-- JS -->
        <script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.magnific-popup.min.js"></script>
        <!--script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script-->
        <!--script type="text/javascript" src="/assets/js/gmap3.min.js"></script-->
        <script type="text/javascript" src="/assets/js/wow.min.js"></script>
        <script type="text/javascript" src="/assets/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="/assets/js/all.js"></script>
        <script type="text/javascript" src="/assets/js/contact-form.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.ajaxchimp.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/assets/js/moment.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.min.js"></script>

        <!--[if lt IE 10]><script type="text/javascript" src="/assets/js/placeholder.js"></script><![endif]-->
        <script>
			$('document').ready(function(){
				loadAll();
			})
			var addFormFilter = '<div class="dataTables_tgl"><label for="">Date <input id="tgl" type="text" /></label></div>'+
									'<div class="dataTables_messagefil">'+
									'<label for="statusmessageoption">Message(s)'+
									'<select name="statusmessageoption" id="statusmessageoption" onchange="loadMessageStatus();">'+
									'<option value="-" >------------------</option>'+
									'<option value="0">All</option>'+
									'<option value="1">Unreplied</option>'+
									'<option value="2">Replied</option>'+
									'</select>'+
									'</label>'+
									'</div>';

			function loadMessageStatus(){
				var messageoption = $("#statusmessageoption").val();
				var tgl = $("input#tgl").val();

				if(messageoption=='1'){
					$.ajax({
						type:"POST",
						url:"loadUnrepliedMessage",
						data: {tgl:tgl},
						success: function(data){
							$('#datamessage').html(data);
							if(tgl==""){
								$('h1#title-page').text("Message: Unreplied ");
							}else{
								$('h1#title-page').text("Message: Unreplied / "+ tgl);	
							}
							$("#tablemessage").dataTable({
								"fnInitComplete": function( oSettings , json) {
									$("#tablemessage_wrapper").prepend(addFormFilter);
									$("#tgl").datetimepicker({
										format:'YYYY-MM-DD'
									});
									$("#tgl").val(tgl);
								}
							});

						}
					});
					e.preventDefault();
				}else if(messageoption==2){
					$.ajax({
						type:"POST",
						url:"loadRepliedMessage",
						data: {tgl:tgl},
						success: function(data){
							$('#datamessage').html(data);
							if(tgl==""){
								$('h1#title-page').text("Message: Replied ");
							}else{
								$('h1#title-page').text("Message: Replied / "+ tgl);	
							}
							$("#tablemessage").dataTable({
								"fnInitComplete": function( oSettings , json) {
									$("#tablemessage_wrapper").prepend(addFormFilter);
									$("#tgl").datetimepicker({
										format:'YYYY-MM-DD'
									});
									$("#tgl").val(tgl);
								}
							});
						}
					});
					e.preventDefault();
				}else{
					loadAll(tgl);
				}
			}
			function loadAll(tgl){
				var tglparams;
				if(tgl==null){
					tglparams="";
				}else{
					tglparams=tgl;
				}
				$.ajax({
					type:"POST",
					url:"loadAllMessage",
					data: {tgl:tgl},
					success: function(data){
						$('#datamessage').html(data);
						if(tglparams==""){
							$('h1#title-page').text("Message: All ");	
						}else{
							$('h1#title-page').text("Message: All / " + tglparams);		
						}
						$("#tablemessage").dataTable({
							"fnInitComplete": function( oSettings , json) {
								$("#tablemessage_wrapper").prepend(addFormFilter);
								$("#tgl").datetimepicker({
									format:'YYYY-MM-DD'
								});
								
							}
						});
						$("#tgl").val(tglparams);
					}
				});
				e.preventDefault();
			}
		</script>
    </body>
</html>