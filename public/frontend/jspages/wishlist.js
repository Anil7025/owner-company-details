var $ = jQuery.noConflict();

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
});

function onRemoveToWishlist(id) {
	var rowid = $("#removetowishlist_"+id).data('id');

	$.ajax({
		type : 'GET',
		url: base_url + '/frontend/remove_to_wishlist/'+rowid,
		dataType:"json",
		success: function (response) {
			
			var msgType = response.msgType;
			var msg = response.msg;

			if (msgType == "success") {
				onSuccessMsg(msg);
				$('#row_delete_'+id).remove();
			} else {
				onErrorMsg(msg);
			}
			onWishlist();
		}
	});
}
$(document).ready(function() {
	$('#selectAllWishlist').on('change', function() {
		$('input[name="wishlist_select[]"]').prop('checked', $(this).is(':checked'));
	});
});

$(document).on("click", ".valueAddtocart", function(event) {
	event.preventDefault();

	var id = $(this).data('id');
	var qty = 1; // Default quantity

	// Disable button to prevent multiple clicks
	var button = $(this);
	button.prop('disabled', true);

	$.ajax({
		type: 'GET',
		url: base_url + '/frontend/add_to_cart/' + id + '/' + qty,
		dataType: "json",
		success: function(response) {
			if (response.msgType === "success") {
				onSuccessMsg(response.msg);
			} else {
				onErrorMsg(response.msg);
			}
			onViewCart(); // Refresh cart UI
		},
		error: function() {
			alert("Error adding item to cart. Please try again.");
		},
		complete: function() {
			button.prop('disabled', false); // Re-enable button after request
		}
	});
});

function onViewCart() {

    $.ajax({
		type : 'GET',
		url: base_url + '/frontend/view_cart',
		dataType:"json",
		success: function (data) {
			if(data.items == ''){
				$(".has_item_empty").show();
				$(".has_cart_item").hide();
				$(".total_qty").text(0);
			}else{
				$(".has_item_empty").hide();
				$(".has_cart_item").show();
				
				$('#tp_cart_data').html(data.items);
				$('#tp_cart_data_for_mobile').html(data.items);
				
				$(".total_qty").text(data.total_qty);
				$(".sub_total").text(data.sub_total);
				$(".tax").text(data.tax);
				$(".tp_total").text(data.total);
			}
		}
	});
}

