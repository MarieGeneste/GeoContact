
$(".dep-edition").click(function(){
	var department = $(this).closest(".department-info")
	var departmentId = $(department).data("departementId")
	var departmentCode = $(department).find(".dep-info-code").html()
	var departmentLibelle = $(department).find(".dep-info-libelle").html()
	

	$("#edit-dep").find("form").attr("action", "Admin/departmentUpdate")
	$("#edit-dep").find("#dep-edit-id").val(departmentId)
	$("#edit-dep").find("#dep-edit-code").val(departmentCode)
	$("#edit-dep").find("#dep-edit-libelle").val(departmentLibelle)
	$("#edit-dep").slideDown();
})


$(".loc-edition").click(function(){
	var localite = $(this).closest(".localite-info")
	var localiteId = $(localite).data("localiteId")
	var localiteCodePostal = $(localite).find(".loc-info-codePostal").html()
	var localiteCodeInsee = $(localite).find(".loc-info-codeInsee").html()
	var localiteLibelle = $(localite).find(".loc-info-libelle").html()

	// localiteDepId attribute = data-dep-id="<?php $localite["idDepartements"] ?>"
	var localitedep = $(localite).find(".loc-info-depId")
	
	var localiteDepId = $(localitedep).data("depId")
	

	$("#edit-loc").find("form").attr("action", "Admin/localiteUpdate")
	$("#edit-loc").find("#loc-edit-id").val(localiteId)
	$("#edit-loc").find("#loc-edit-codePostal").val(localiteCodePostal)
	$("#edit-loc").find("#loc-edit-codeInsee").val(localiteCodeInsee)
	$("#edit-loc").find("#loc-edit-libelle").val(localiteLibelle)

	modalOrigin = "edit"

	var previoudDepPreselector = "#" + localiteDepId
	$(previoudDepPreselector).closest('.loc-DepId').click()
	$("#dep-modal-validation").click()


	// $("#modalDepartements").find(".loc-DepId").each(function(){

	// 	// modal dep id="modal-loc-dep-<?php $department["id"] ?>"
	// 	if ($(this).attr("id") == "modal-loc-dep-" + localiteDepId) {
	// 		$(this).dblclick()
	// 	}
	// })
	$("#edit-loc").slideDown();
})


var modalOrigin = null

$("#editLocDep").click(function(){
	modalOrigin = "edit"
})

$("#newLocDep").click(function(){
	modalOrigin = "new"
})

$(".loc-DepId").click(function(){
	var selectedDepLib = $(this).find(".loc-dep-lib").html()
	var selectedDepCode = $(this).find(".loc-dep-code").html()
	var selectedDepId = $(this).find(".loc-dep-lib").attr("id")


	// modal dep id="modal-loc-dep-<?php localite["idDepartements"] ?>"
		$("#loc-" + modalOrigin + "-department").attr("placeholder", selectedDepCode + " - " + selectedDepLib)
		$("#loc-" + modalOrigin + "-dep-id").val(selectedDepId)
})

$(".loc-DepId").dblclick(function(){
	$(this).click()
	$("#dep-modal-validation").click()
})

$("#dep-modal-validation").click(function(){
	$("#modalDepartements").fadeOut()
	modalOrigin = null;
})