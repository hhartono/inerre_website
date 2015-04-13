	
	<script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	<script>
	$('document').ready(function(){
		loadAll();
	})
	function loadMessageStatus(){
		var messageoption = $("#statusmessageoption").val();
		if(messageoption=='1'){
			$.ajax({
				type:"POST",
				url:"loadUnrepliedMessage",
				success: function(data){
					$('#datamessage').html(data);
				}
			});
		}else if(messageoption==2){
			$.ajax({
				type:"POST",
				url:"loadRepliedMessage",
				success: function(data){
					$('#datamessage').html(data);
				}
			});
		}else{
			loadAll();
		}
	}
	function loadAll(){
		$.ajax({
			type:"POST",
			url:"loadAllMessage",
			success: function(data){
				$('#datamessage').html(data);
			}
		});
	}
	</script>
</body>
</html>