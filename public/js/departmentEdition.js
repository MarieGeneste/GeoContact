
$(".dep-edition").click(function(){
	var department = $(this).closest(".department-info")
	var departmentId = $(department).attr("id")
	var departmentCode = $(department).find(".dep-info-code").html()
	var departmentLibelle = $(department).find(".dep-info-libelle").html()
	console.log(department);
	console.log(departmentId);
	console.log(departmentCode);
	console.log(departmentLibelle);
	

	$("#edit-dep").find("form").attr("action", "Admin/departmentUpdate")
	$("#edit-dep").find("#dep-edit-id").val(departmentId)
	$("#edit-dep").find("#dep-edit-code").val(departmentCode)
	$("#edit-dep").find("#dep-edit-libelle").val(departmentLibelle)
	$("#edit-dep").slideDown();
})