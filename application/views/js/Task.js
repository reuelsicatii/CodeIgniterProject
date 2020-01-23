
$(document).on("click", "#updatetask", function() {
	
	var id = $(this).attr('data-id');
	$("#idtask").val(id);
	
	dataarray = [];
	$("#taskprofile_"+id).find('td').each(function(key, el) {
	
		value = $(el).text();
		console.log(key, value);		
		dataarray.push(value);
		
	});
	
	//console.log(dataarray);
	//console.log(dataarray[0]);
	
	$("div#updatemodalformrow1 > select#updatemodalformselecttype").val(dataarray[1]);
	$("div#updatemodalformrow1 > select#updatemodalformselectdepartment").val(dataarray[2]);
	$("div#updatemodalformrow1 > input#updatemodalforminputstatus").val(dataarray[6]);
	$("div#updatemodalformrow2 > input#updatemodalforminputstart").val(dataarray[3]);
	$("div#updatemodalformrow2 > input#updatemodalforminputend").val(dataarray[4]);
	$("div#updatemodalformrow2 > input#updatemodalforminputelapsed").val(dataarray[5]);
	$("div#updatemodalformrow2 > textarea#updatemodalformtextareacomment").val(dataarray[7]);

});

$("#transactionnotif").show().delay(5000).queue(function(n) {
	  $(this).hide(); n();
	});

