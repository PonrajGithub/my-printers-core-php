$(document).ready(function() {
	$("#country").change(function() {
		var parent_id = $(this).val();
		if(parent_id != "") {
			$.ajax({
				url:"option.php",
				data:{c_id:parent_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#state").html(resp);
				}
			});
		} else {
			$("#state").html("<option value=''>------- Select --------</option>");
		}
	});
});
