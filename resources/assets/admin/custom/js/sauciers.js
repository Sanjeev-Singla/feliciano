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

	$('a#admin_edit_saucier').click(function(){
		var edit_url = $(this).attr('item-url');
		$.ajax({
			url:edit_url,
			datatype: "application/json",
			success:function(data){
				let saucier = JSON.parse(data);
				$('#menu_item_form_submit').attr('action',edit_url);
				$("input[name='name']").val(saucier.name);
				$("input[name='position']").val(saucier.position);
				$("input[name='twitter_link']").val(saucier.twitter_link);
				$("input[name='facebook_link']").val(saucier.facebook_link);
				$("input[name='google_plus_link']").val(saucier.google_plus_link);
				$("input[name='instagram_link']").val(saucier.instagram_link);
				$("#saucier_image").removeAttr('hidden',false);
				$("#saucier_image").attr('src',saucier.image);
			},
			error:function(data){
				alert('Unable to get data');
			}
		});
	});
	$('#add_saucier_button').click(function(){
		$('#menu_item_form_submit').attr('action','');
		$("input[name='name']").val('');
		$("input[name='position']").val('');
		$("input[name='twitter_link']").val('');
		$("input[name='facebook_link']").val('');
		$("input[name='google_plus_link']").val('');
		$("input[name='instagram_link']").val('');
		$("#saucier_image").attr('hidden',true);
		$("#saucier_image").attr('src','');
	});
});