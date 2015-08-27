     
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
    <script type="text/javascript" src="/assets_admin/js/moment.js"></script>
    <script type="text/javascript" src="/assets_admin/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/assets_admin/js/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="/assets_admin/dropzone/dropzone.js"></script>
    <script>
    $(document).ready(function(){})
    Dropzone.options.mydz = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        url:"/administrator/testupload",
        previewsContainer: "#dropzonepreviews",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        addRemoveLinks:true,
        forceFallback:true,
        /*clickable: true,*/

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;
            console.log(init);
            // First change the button to actually tell Dropzone to process the queue.
            // this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
            this.element.querySelector("input#submitportfolio").addEventListener("click", function(e){
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
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
    }
    </script>
  </body>
</html>