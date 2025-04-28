var $ = jQuery.noConflict();
var RecordId = '';
var BulkAction = '';
var ids = [];

$(function () {
	"use strict";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	resetForm("DataEntry_formId");
	
	$("#submit-form").on("click", function () {
        $("#DataEntry_formId").submit();
    });
	
	$(document).on('click', '.users_pagination nav ul.pagination a', function(event){
		event.preventDefault(); 
		var page = $(this).attr('href').split('page=')[1];
		onPaginationDataLoad(page);
	});
		
	
});

function onCheckAll() {
    $(".checkAll").on("click", function () {
        $("input:checkbox").not(this).prop("checked", this.checked);
    });
}

function onPaginationDataLoad(page) {
	$.ajax({
		url:base_url + "/admin/getClientsTableData?page="+page,
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onRefreshData() {
	$.ajax({
		url:base_url + "/admin/getClientsTableData?search="+$("#search").val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function onSearch() {
	var search = $("#search").val();
	$.ajax({
		url: base_url + "/admin/getClientsTableData?search="+$("#search").val(),
		success:function(data){
			$('#tp_datalist').html(data);
			onCheckAll();
		}
	});
}

function resetForm(id) {
    $('#' + id).each(function () {
        this.reset();
    });
	
}

function onListPanel() {
	$('.parsley-error-list').hide();
    $('#list-panel, .btn-form').show();
    $('#form-panel, .btn-list').hide();
}

function onFormPanel() {
    resetForm("DataEntry_formId");
	RecordId = '';
	
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();
}

function onEditPanel() {
    $('#list-panel, .btn-form').hide();
    $('#form-panel, .btn-list').show();	
}


function showPerslyError() {
    $('.parsley-error-list').show();
}

jQuery('#DataEntry_formId').parsley({
    listeners: {
        onFieldValidate: function (elem) {
            if (!$(elem).is(':visible')) {
                return true;
            }
            else {
                showPerslyError();
                return false;
            }
        },
        onFormSubmit: function (isFormValid, event) {
            if (isFormValid) {
                onConfirmWhenAddEdit();
                return false;
            }
        }
    }
});

$(document).ready(function () {
    // Attach the click handler to the button
    $("#submit-form").on("click", function (e) {
        e.preventDefault(); // Prevent any default behavior
        onConfirmWhenAddEdit();
    });
});

function onConfirmWhenAddEdit() {
    var form = $('#DataEntry_formId')[0];

    var formData = new FormData(form);

    $.ajax({
        type: "POST",
        url: "/admin/saveClientsData",
        data: formData,
        processData: false, // Required for FormData
        contentType: false, // Required for FormData
        beforeSend: function () {
            $("#submit-form").text("Saving...").attr("disabled", true);
        },
        success: function (response) {
            var msgType = response.msgTypes || "error";
            var msg = response.msg || "Unknown error occurred.";

            if (msgType === "success") {
                console.log("✅ Success: " + msg);
                $('#DataEntry_formId')[0].reset();
                onRefreshData?.();  // Optional chaining in case it's undefined
                onSuccessMsg?.(msg);
                onListPanel?.();
                setTimeout(() => location.reload(), 1000);
            } else {
                console.warn("⚠️ Error from server: " + msg);
                onErrorMsg?.(msg); // Optional: define this for user feedback
            }
        },
        complete: function () {
            $("#submit-form").text("Save").attr("disabled", false);
        },
        error: function (xhr, status, error) {
            console.error("❌ AJAX error:", error);
            alert("Something went wrong!\n" + (xhr.responseText || "Unknown server error."));
        }
    });
}

function onEdit(id) {
	RecordId = id;
	var msg = "Do you really want to edit this record?";
	onCustomModal(msg, "onLoadEditData");	
}

function onCustomModal(msg, callbackFunctionName) {
    if (confirm(msg)) {
        window[callbackFunctionName]();  // Call dynamically
    }
}

function onLoadEditData() {

    $.ajax({
        type: 'POST',
        url: base_url + '/admin/getClientsById',
        data: { id: RecordId },
        success: function(response) {
            var data = response;

            // Fill basic fields
            $("#RecordId").val(data.id);
            $("#owner_name").val(data.owner_name);
            $("#owner_email").val(data.owner_email);
            $("#designation").val(data.designation);
            $("#business_cat").val(data.business_cat);
            $("#owner_phone").val(data.owner_phone);
            $("#company_website").val(data.company_website);
            $("#company_name").val(data.company_name);
            $("#company_email").val(data.company_email);
            $("#company_gst").val(data.company_gst);
            $("#company_address").val(data.company_address);
            $("#video").val(data.video);
            $("#easyMdeExample").val(data.description);
            $("#facebook").val(data.facebook);
            $("#youtube").val(data.youtube);
            $("#instagram").val(data.instagram);

            // Set publish status
            $("#is_publish").val(data.status).trigger('change');

            // Set location radio buttons
            $("input[name='location'][value='" + data.location + "']").prop('checked', true);

            // Optionally handle images if you want to preview uploaded images
            // For dropify files, you usually have to manually reinitialize or set preview

            onEditPanel(); // Open edit panel
        },
        error: function(xhr) {
            alert('Error fetching data');
            console.error(xhr.responseText);
        }
    });
}


function onDelete(id) {
	RecordId = id;
	var msg = TEXT["Do you really want to delete this record"];
	onCustomModal(msg, "onConfirmDelete");	
}

function onConfirmDelete() {

    $.ajax({
		type : 'POST',
		url: base_url + '/admin/deleteClients',
		data: 'id='+RecordId,
		success: function (response) {
			var msgType = response.msgType;
			var msg = response.msg;

			if(msgType == "success"){
				onSuccessMsg(msg);
				onRefreshData();
			}else{
				onErrorMsg(msg);
			}
			
			onCheckAll();
		}
    });
}

$(document).ready(function () {
    $("#DataEntry_formId").validate({
        rules: {
            location: {
                required: true
            },
            owner_name: {
                required: true,
                minlength: 3
            },
            owner_email: {
                required: true,
                email: true
            },
            designation: {
                required: true
            },
            business_cat: {
                required: true
            },
            owner_phone: {
                required: true,
                digits: true,
                minlength: 10
            },
            company_website: {
                url: true
            },
            company_name: {
                required: true
            },
            company_gst: {
                gst: true
            },
            company_address: {
                required: true
            },
            video: {
                url: true
            },
            facebook: {
                url: true
            },
            youtube: {
                url: true
            },
            instagram: {
                url: true
            },
            linkedin: {
                url: true
            },
            description: {
                required: true
            }
        },
        messages: {
            owner_name: {
                required: "Please enter the owner's name",
                minlength: "Name must be at least 3 characters"
            },
            owner_email: {
                required: "Please enter owner's email",
                email: "Enter a valid email"
            },
            // Add other custom messages as needed...
        },
        errorElement: "div",
        errorClass: "invalid-feedback",
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
});




