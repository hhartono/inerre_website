<?php 
	$this->load->view('administrator/template/header');
?>
	<!-- Section -->
        <section class="small-section bg-dark-lighter pt-30 pb-30">
            <div class="relative container align-left">      
                <div class="row">        
                    <div class="col-md-12">
                        <h1 id="title-page" class="hs-line-11 font-alt mb-0"></h1>
                    </div>
                </div>    
            </div>
        </section>
    <!-- End Section -->
	<div class="container" style="padding-top:20px;">
		<div class="row">
			<div class="col-md-12">
				<div id="datamessage">
					<!-- load data here -->
				</div>
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
<?php 
	$this->load->view('administrator/template/footer');
?>