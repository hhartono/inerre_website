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
                            <a href="/home" target="_blank">&copy; INERRE 2015</a>.
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
        	$('#replyModal').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget); // Button that triggered the modal
				  var id = button.data('id');
				  var recipient = button.data('name') ;
				  var email = button.data('email');
				  // Extract info from data-* attributes
				  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				  var modal = $(this);
				  modal.find('.modal-title').text('New message to ' + recipient);
				  modal.find('.modal-body input#idmessage').val(id);
				  modal.find('.modal-body input#recipient-name').val(recipient);
				  modal.find('.modal-body input#recipient-name-hidden').val(recipient);
				  modal.find('.modal-body input#recipient-email').val(email);
				  modal.find('.modal-body input#recipient-email-hidden').val(email);
				})

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

			function tableMessage(status, tgl, data){
				$('#datamessage').html(data);
				if(tgl==""){
					$('h1#title-page').text("Message: "+status);	
				}else{
					$('h1#title-page').text("Message: "+status+ " / " + tgl);		
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
						tableMessage('All', tglparams, data);
					}
				});
				e.preventDefault();
			}
			
			function loadMessageStatus(){
				var messageoption = $("#statusmessageoption").val();
				var tgl = $("input#tgl").val();

				if(messageoption=='1'){
					$.ajax({
						type:"POST",
						url:"loadUnrepliedMessage",
						data: {tgl:tgl},
						success: function(data){
							tableMessage('Unreplied', tgl, data);
							
						}
					});
					e.preventDefault();
				}else if(messageoption==2){
					$.ajax({
						type:"POST",
						url:"loadRepliedMessage",
						data: {tgl:tgl},
						success: function(data){
							tableMessage('Replied', tgl, data);
						}
					});
					e.preventDefault();
				}else{
					loadAll(tgl);
				}
			}


		</script>
    </body>
</html>