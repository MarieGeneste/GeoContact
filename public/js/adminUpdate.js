
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

	$("#edit-loc").slideDown();
})

$("#loc-new-codePostal").blur(function(){
	
	var depByPostalCode = $(this).val().slice(0,-3)

	var depCode = depByPostalCode
	if (depByPostalCode.length < 2) {
		depCode = "0" + depByPostalCode
	} 
	var depCode = depByPostalCode

	modalOrigin = "new"

	var depSelectorByPostalCode = "#locDepCode-" + depCode
	$(depSelectorByPostalCode).closest('.loc-DepId').click()
	$("#dep-modal-validation").click()

})


var modalOrigin = null

$("#editLocDep").click(function(){
	modalOrigin = "edit"
})

$("#newLocDep").click(function(){
	modalOrigin = "new"
})

$(".loc-DepId").click(function(){
	var self = $(this)
	var depSelectedId = null
	$(".custom-shadow").removeClass("custom-shadow").promise().done(function(){
		$(self).addClass("custom-shadow")
		depSelectedId = "#" + $(self).attr("id")
	})

	// tentative de focus du département présélectionné
	// if (depSelectedId != null) {
	// 	var webroot = $("#adminDashboard").data("webroot")
	// 	$("#depSelectorFocus").attr("href", webroot + depSelectedId)
	// 	$("#depSelectorFocus").click()
	// }

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