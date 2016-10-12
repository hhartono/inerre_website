     
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
    <script type="text/javascript" src="/assets_admin/js/dropzone.js"></script>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var portfolioDropzone = new Dropzone('#portfolioDropzone', {
        url:"/administrator/portfolioaddsubmit",
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
        formData.append('location', $('#location').val());
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
    </script>

    <script type="text/javascript">
    $('button#buttonportfolio').on('click', function (e) {
        console.log("button click!");
        var proceed = true;
        var title = $('input[name=title]').val();
        var location = $('input[name=location]').val();
        var description = $('input[name=description]').val();
        if(title == ''){
            $('input[name=title]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        if(location == ''){
            $('input[name=location]').css('border-color', '#FF0000').addClass('form-error-focus');
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
    </script>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var portfolioDropzone2 = new Dropzone('#portfolioDropzone2', {
        url:"/administrator/portfolioprojectphoto1submit",
        previewsContainer:".dropzone2-previews",
        uploadMultiple:false,
        parallelUploads:1,
        maxFiles:1,
        autoProcessQueue:false,
        addRemoveLinks: true
    });

    // When a file is added to the list 
    portfolioDropzone2.on("addedfile", function(){
        console.log("file added");
    });

    // Called just before each file is sent
    portfolioDropzone2.on('sending', function(data, xhr, formData){
        formData.append('highlights1', $('#highlights1').val());
        formData.append('highlights2', $('#highlights2').val());
        formData.append('description_left', $('#description_left').val());
        formData.append('description_right', $('#description_right').val());
    });

    // portfolioDropzone.on("sendingmultiple", function() {
    //     // Gets triggered when the form is actually being sent.
    //     // Hide the success button or the complete form.
    // });

    // The file has been uploaded successfully. 
    // Gets the server response as second argument. (called finished previously)
    portfolioDropzone2.on('success', function(data, xhr, formData){
        console.log(data.name);
        // window.location.href = "/administrator/portfolio";
         $("#uploadSuccessModal").modal('show', function(){
            setTimeout(function() {
                window.location.href = "thankyou.php";
            }, 2000)
         });
    });

    // Called when the upload was either successful or erroneous. 
    portfolioDropzone2.on('complete', function(data, xhr, formData){

        console.log(data.xhr.response);
        if(data.xhr.response.type == 'error'){

        }else{
             $('input#title, input#description').css('border-color', '');
        }
    });
    </script>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var portfolioDropzone3 = new Dropzone('#portfolioDropzone3', {
        url:"/administrator/portfolioprojectphoto2submit",
        //previewsContainer:".dropzone3-previews",
        uploadMultiple:true,
        parallelUploads:1,
        maxFiles:1,
        autoProcessQueue:false,
        addRemoveLinks: true
    });

    // When a file is added to the list 
    portfolioDropzone3.on("addedfile", function(){
        console.log("file added");
    });

    // Called just before each file is sent
    portfolioDropzone3.on('sending', function(data, xhr, formData){
        formData.append('highlights1', $('#highlights1').val());
        formData.append('highlights2', $('#highlights2').val());
        formData.append('description_left', $('#description_left').val());
        formData.append('description_right', $('#description_right').val());
    });

    // portfolioDropzone.on("sendingmultiple", function() {
    //     // Gets triggered when the form is actually being sent.
    //     // Hide the success button or the complete form.
    // });

    // The file has been uploaded successfully. 
    // Gets the server response as second argument. (called finished previously)
    portfolioDropzone3.on('success', function(data, xhr, formData){
        console.log(data.name);
        // window.location.href = "/administrator/portfolio";
         $("#uploadSuccessModal").modal('show', function(){
            setTimeout(function() {
                window.location.href = "thankyou.php";
            }, 2000)
         });
    });

    // Called when the upload was either successful or erroneous. 
    portfolioDropzone3.on('complete', function(data, xhr, formData){

        console.log(data.xhr.response);
        if(data.xhr.response.type == 'error'){

        }else{
             $('input#title, input#description').css('border-color', '');
        }
    });
    </script>

    <script type="text/javascript">
    Dropzone.autoDiscover = false;
    var portfolioDropzone4 = new Dropzone('#portfolioDropzone4', {
        url:"/administrator/portfolioprojectaddsubmit",
        previewsContainer:".dropzone4-previews",
        uploadMultiple:true,
        parallelUploads:100,
        maxFiles:100,
        autoProcessQueue:false,
        addRemoveLinks: true
    });

    // When a file is added to the list 
    portfolioDropzone4.on("addedfile", function(){
        console.log("file added");
    });

    // Called just before each file is sent
    portfolioDropzone4.on('sending', function(data, xhr, formData){
        formData.append('highlights1', $('#highlights1').val());
        formData.append('highlights2', $('#highlights2').val());
        formData.append('description_left', $('#description_left').val());
        formData.append('description_right', $('#description_right').val());
        formData.append('idportfolio', $('#idportfolio').val());
    });

    // portfolioDropzone.on("sendingmultiple", function() {
    //     // Gets triggered when the form is actually being sent.
    //     // Hide the success button or the complete form.
    // });

    // The file has been uploaded successfully. 
    // Gets the server response as second argument. (called finished previously)
    portfolioDropzone4.on('success', function(data, xhr, formData){
        console.log(data.name);
        // window.location.href = "/administrator/portfolio";
         $("#uploadSuccessModal").modal('show', function(){
            setTimeout(function() {
                window.location.href = "thankyou.php";
            }, 2000)
         });
    });

    // Called when the upload was either successful or erroneous. 
    portfolioDropzone4.on('complete', function(data, xhr, formData){

        console.log(data.xhr.response);
        if(data.xhr.response.type == 'error'){

        }else{
             $('input#highlights1, input#highlights2, input#description_left input#description_right').css('border-color', '');
        }
    });
    
    $('button#buttonportfolioproject').on('click', function (e) {
        console.log("button click!");
        var proceed = true;
        var highlights1 = $('input[name=highlights1]').val();
        var highlights2 = $('input[name=highlights2]').val();
        var description_left = $('input[name=description_left]').val();
        var description_right = $('input[name=description_right]').val();
        var idportfolio = $('input[name=idportfolio]').val();
        
        if(highlights1 == ''){
            $('input[name=highlights1]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        if(highlights2 == ''){
            $('input[name=highlights2]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        if(description_left == ""){
            $('input[name=description_left]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        if(description_right == ""){
            $('input[name=description_right]').css('border-color', '#FF0000').addClass('form-error-focus');
            proceed = false;
        }
        $("input.form-error-focus:first").focus();
        $("input.form-error-focus").removeClass('form-error-focus');

        if(proceed){
            portfolioDropzone4.processQueue(); 
            console.log(portfolioDropzone4.getQueuedFiles().length);
            console.log(portfolioDropzone4.getQueuedFiles()); 
        }
        e.preventDefault();
        e.stopPropagation();
    });
    </script>
    
    <?php
    }
    ?>    


    
  </body>
</html>