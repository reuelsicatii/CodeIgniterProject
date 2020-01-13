



$(document).on("click", "#updatetask", function () {
 console.log("jQuery Trigger");
 var ids = $(this).attr('data-id');
 $("#idtask").val(ids);
});
