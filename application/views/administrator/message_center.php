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
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Message Center</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          			<h3 id="title-page"></h1><hr>
          		</div>
          		<div class="col-lg-12">
          			<div id="datamessage">
					<!-- load data here -->
					</div>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      	</section><!-- /MAIN CONTENT -->
		
	<div class="container" style="padding-top:20px;">
		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
	</div>
	
	<!-- modal -->
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
				</div>
			<form action="sendingmail" method="POST">
			<div class="modal-body">
		       		<input type="hidden" name="id" id="idmessage">
					<div class="form-group">
					    <label for="recipient-name" class="control-label">Recipient:</label>
					    <input type="text" class="form-control" id="recipient-name" disabled>
					    <input type="hidden" id="recipient-name-hidden" name="recipient-name">
					</div>
					<div class="form-group">
					    <label for="recipient-email" class="control-label">Email:</label>
					    <input type="text" class="form-control" id="recipient-email" disabled>
					    <input type="hidden" id="recipient-email-hidden"  name="recipient-email">
					</div>
					<div class="form-group">
						<label for="subject" class="control-label">Subject: </label>
						<input type="text" class="form-control" id="subject" name="subject">
					</div>
					<div class="form-group">
					    <label for="message-text" class="control-label">Message:</label>
					    <textarea class="form-control" id="message-text" name="message"></textarea>
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Send message</button> -->
				<input type="submit" value="Send Message" class="btn btn-primary">
			</div>
			</div>
			</form>
		</div>
	</div>
	<!-- modal -->

		<script src="/assets_admin/js/jquery.js"></script>
	    <script type="text/javascript">
	    $(document).ready(function(){
	        // call loadAll for load all messages
            loadAll();

	    })

        /*
         * modal for reply message (message center)
         */
        $('#replyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var recipient = button.data('name') ;
            var email = button.data('email');
            var modal = $(this);
            modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body input#idmessage').val(id);
            modal.find('.modal-body input#recipient-name').val(recipient);
            modal.find('.modal-body input#recipient-name-hidden').val(recipient);
            modal.find('.modal-body input#recipient-email').val(email);
            modal.find('.modal-body input#recipient-email-hidden').val(email);
        })

        var addFormFilter = '<div class="dataTables_tgl"><label for="" style="color:#333;">Date <input id="tgl" type="text" /></label></div>'+
                                    '&nbsp;&nbsp;<div class="dataTables_messagefil">'+
                                    '<label for="statusmessageoption" style="color:#333;">Message(s)'+
                                    '<select name="statusmessageoption" id="statusmessageoption" onchange="loadMessageStatus();">'+
                                    '<option value="-" >------------------</option>'+
                                    '<option value="0">All</option>'+
                                    '<option value="1">Unreplied</option>'+
                                    '<option value="2">Replied</option>'+
                                    '</select>'+
                                    '</label>'+
                                    '</div>&nbsp;&nbsp;';

        function tableMessage(status, tgl, data){
            $('#datamessage').html(data);
            if(tgl==""){
                $('h3#title-page').text("Message: "+status);    
            }else{
                $('h3#title-page').text("Message: "+status+ " / " + tgl);       
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

        /*
         * load all messages (message center)
         */
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
            //e.preventDefault();
        }
        
        /*
         * load message with status (unreplied, replied)
         */
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

<?php
	// load footer
	$this->load->view('administrator/template/footer_new');
?>