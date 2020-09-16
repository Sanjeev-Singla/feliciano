
$(document).ready(function(){
	$('#menu_item_form_button').click(function(){
		$('#menu_item_form_submit').validate();
	});

	$('a#admin_delete_menu_item').click(function(){
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
				toastr.error('Unable to Delete Item');
			}
		});
	});

	$('a#admin_delete_ingredient').click(function(){
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
				toastr.error('Unable to Delete Item');
			}
		});
	});

	$('a#admin_delete_category').click(function(){
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
				toastr.error('Unable to Delete Category');
			}
		});
	});


	$('a#admin_edit_menu_item').click(function(){
		var edit_url = $(this).attr('item-url');
		$('#menu_item_form_submit').attr('action',edit_url);
	});

	$('button.add-item-modal-button').click(function(){
		$('#menu_item_form_submit').attr('action',"");
	});

});
