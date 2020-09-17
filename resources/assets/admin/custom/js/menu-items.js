
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

		$.ajax({
			url: edit_url,
			success:function(data){
				$('#menu_item_form_submit').attr('action',edit_url);
				let item_data = JSON.parse(data);
				console.log(item_data);
				$("input[name='title']").val(item_data.title);
				$.each(item_data.categories,function(index,value){
					let category_text = $("#menu_category"+value).text();
					$("#item_category .select2-search.select2-search--inline").hide();
					$("#menu_category"+value).attr("selected","");
					$("#item_category .select2-selection__rendered").append('<li class="select2-selection__choice" title="'+category_text+'" data-select2-id="21"><span class="select2-selection__choice__remove" role="presentation">×</span>'+category_text+'</li>')
				});
				$.each(item_data.ingrediants,function(index,value){
					let ingrediant_text = $("#menu_ingrediant"+value).text();
					$("#item_ingredient .select2-search.select2-search--inline").hide();
					$("#menu_ingrediant"+value).attr("selected","");
					$("#item_ingredient .select2-selection__rendered").append('<li class="select2-selection__choice" title="'+ingrediant_text+'" data-select2-id="21"><span class="select2-selection__choice__remove" role="presentation">×</span>'+ingrediant_text+'</li>')
				});
				$("input[name='price']").val(item_data.price);
				$("img#item_image").attr('src',item_data.image).removeAttr("hidden");

			},
			error:function(){
				alert('Unable to edit data');
				return false;
			}
		});

	});

	$("span.select2-selection__choice__remove").click(function(){
		$(this).parent().remove();
	});

	$('button.add-item-modal-button').click(function(){
		$('#menu_item_form_submit').attr('action',"");
	});

});
