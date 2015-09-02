     
      <!--footer start-->
      <!-- <footer class="site-footer" style="bottom:0px;">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <!--script src="/assets_admin/js/jquery.js"></script-->
    <script src="/assets_admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/assets_admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/assets_admin/js/jquery.scrollTo.min.js"></script>
    <script src="/assets_admin/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="/assets_admin/js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="/assets_admin/js/jquery-ui-1.9.2.custom.min.js"></script>
	  <!--custom switch-->
  	<script src="/assets_admin/js/bootstrap-switch.js"></script>
  	<!--custom tagsinput-->
  	<script src="/assets_admin/js/jquery.tagsinput.js"></script>
  	<!--custom checkbox & radio-->
  	<!--script type="text/javascript" src="/assets_admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  	<script type="text/javascript" src="/assets_admin/js/bootstrap-daterangepicker/date.js"></script>
  	<script type="text/javascript" src="/assets_admin/js/bootstrap-daterangepicker/daterangepicker.js"></script-->
  	<script type="text/javascript" src="/assets_admin/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  	<script type="text/javascript" src="/assets_admin/js/jquery.dataTables.min.js"></script>
  	<script type="text/javascript" src="/assets_admin/js/form-component.js"></script>
    <?php
    if(isset($messageactive)){

    ?>
    <script type="text/javascript" src="/assets_admin/js/moment.js"></script>
    <script type="text/javascript" src="/assets_admin/js/bootstrap-datetimepicker.min.js"></script>
    <?php 
     }
    ?>
    <script type="text/javascript" src="/assets_admin/js/chosen.jquery.min.js"></script>
    
    <?php 
    if(isset($portfolioactive)){
    ?>
    <!--script type="text/javascript" src="/assets_admin/dropzone/dropzone.js"></script-->
    <script type="text/javascript" src="/assets_admin/js/dropzone.js"></script>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var portfolioDropzone = new Dropzone('#portfolioDropzone', {
        url:"/administrator/testupload",
        previewsContainer:".dropzone-previews",
        uploadMultiple:true,
        parallelUploads:100,
        maxFiles:100,
        autoProcessQueue:false,
        addRemoveLinks: true
    });

    // When a file is added to the list 
    portfolioDropzone.on("addedfile", function(){
        console.log("file added");
    });

    // Called just before each file is sent
    portfolioDropzone.on('sending', function(data, xhr, formData){
        formData.append('title', $('#title').val());
        formData.append('description', $('#description').val());
    });

    // portfolioDropzone.on("sendingmultiple", function() {
    //     // Gets triggered when the form is actually being sent.
    //     // Hide the success button or the complete form.
    // });

    // The file has been uploaded successfully. 
    // Gets the server response as second argument. (called finished previously)
    portfolioDropzone.on('success', function(data, xhr, formData){
        console.log(data.name);
        // window.location.href = "/administrator/portfolio";
         $("#uploadSuccessModal").modal('show', function(){
            setTimeout(function() {
                window.location.href = "thankyou.php";
            }, 2000)
         });
    });

    // Called when the upload was either successful or erroneous. 
    portfolioDropzone.on('complete', function(data, xhr, formData){

        console.log(data.xhr.response);
        if(data.xhr.response.type == 'error'){

        }else{
             $('input#title, input#description').css('border-color', '');
        }
    });
    
    $('button#buttonportfolio').on('click', function (e) {
        console.log("button click!");
        var proceed = true;
        var title = $('input[name=title]').val();
        var description = $('input[name=description]').val();
        if(title == ''){
            $('input[name=title]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        if(description == ""){
            $('input[name=description]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        $("input.form-error-focus:first").focus();
        $("input.form-error-focus").removeClass('form-error-focus');

        if(proceed){
            portfolioDropzone.processQueue(); 
            console.log(portfolioDropzone.getQueuedFiles().length);
            console.log(portfolioDropzone.getQueuedFiles()); 
        }
        
        

        e.preventDefault();
        e.stopPropagation();
    });

    /*Dropzone.options.portfolioDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        url:"/administrator/testupload",
        previewsContainer: "#dropzonepreviews",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        addRemoveLinks:true,
        clickable: true,

        // The setting up of the dropzone
        init: function() {
            var dz = this;
            console.log(init);
            // First change the button to actually tell Dropzone to process the queue.
            // this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
            //this.element.querySelector("input#submitportfolio").addEventListener("click", function(e){
            document.querySelector("button#buttonportfolio").addEventListener("click", function(e){
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dz.processQueue();
            });

            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function(response) {
                // Show submit button here and/or inform user to click it.
                console.log("file added");
                console.log(response);
            });
            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                console.log(response);
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }
    }*/
    </script>
    <?php
    }
    ?>    
    

    
  </body>
</html>