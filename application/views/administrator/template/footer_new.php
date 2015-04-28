      <!--main content end-->
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
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/assets_admin/js/jquery.js"></script>
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
  <script>
        /*//custom select box
        $(function(){
        $('select.styled').customSelect();
        });
        */
        $('document').ready(function(){
            $('#tableproduct').DataTable();
            loadAll();
        });
        /*
         *
         */
        $('#viewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var kode = button.data('kode')
            var barang = button.data('barang')
            var stock = button.data('stock')
            var hargabeli = button.data('hargabeli')
            var hargajual = button.data('hargajual')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-title').text(kode + ' - ' +barang)
            modal.find('.modal-body table tr td#stock-table').text(stock)
            modal.find('.modal-body table tr td#status-table').text(status)
            modal.find('.modal-body table tr td#beli-table').text('Rp. ' +hargabeli)
            modal.find('.modal-body table tr td#jual-table').text('Rp. ' +hargajual)
        });

        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var idbarang = button.data('idbarang')
            var kode = button.data('kode')
            var barang = button.data('barang')
            var stock = button.data('stock')
            var hargabeli = button.data('hargabeli')
            var hargajual = button.data('hargajual')
            var status = button.data('status')
            var statusjson = button.data('loadstatus')
            var selectstatus = $('#statusbarang-edit')
            var modal = $(this)
            modal.find('.modal-title').text('Edit ' + kode + ' - ' +barang)
            modal.find('.modal-body input#idbarang').val(idbarang)
            modal.find('.modal-body div.form-group div input#nama').val(barang)
            modal.find('.modal-body div.form-group div input#kode').val(kode)
            modal.find('.modal-body div.form-group div input#stock').val(stock)
            modal.find('.modal-body div.form-group div input#hargabeli').attr('placeholder', 'Rp. ').val(hargabeli)
            modal.find('.modal-body div.form-group div input#hargajual').attr('placeholder', 'Rp. ').val(hargajual)
            selectstatus.html('')
            $.each(statusjson, function(i, obj){
                if(obj.barang_status==status){
                    selectstatus.prepend('<option value="'+obj.id+'" SELECTED>'+obj.barang_status+'</option>')
                }else{
                    selectstatus.prepend('<option value="'+obj.id+'">'+obj.barang_status+'</option>')    
                }
                
            })
        });
      
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)// Button that triggered the modal
            var kode = button.data('kode')
            var barang = button.data('barang')
            var idbarang = button.data('idbarang')
            var modal = $(this)
            modal.find('.modal-title').text(kode + ' - ' +barang)
            modal.find('.modal-body h2#h2alert').text('Hapus  ' +barang+' ( kode: '+kode+' ) ?')
            modal.find('.modal-footer a#deletelink').attr("href", 'productdelete/'+idbarang)
        });

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
        <!-- BACKSTRETCH -->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="/assets_admin/js/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("assets/img/login-bg.jpg", {speed: 500});
        </script>

  </body>
</html>