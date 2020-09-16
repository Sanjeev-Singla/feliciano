$(document).ready(function(){
	$('a#admin_delete_saucier').click(function(){
		var delete_url = $(this).attr('item-url');
		var $tr = $(this).closest('tr');
		$.ajax({
			url: delete_url,
			datatype : "application/json",
			success:function(data){
				$tr.find('td').remove();
				let values = JSON.parse(data);
				toastr.success(values.message);
			},
			error:function(data){
				toastr.error('Unable to Delete');
			}
		});
	});
});