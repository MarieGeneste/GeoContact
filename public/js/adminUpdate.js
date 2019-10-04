
// Fonction supprimant les la classe mettant en avant la ligne en cours d'édition
function removeEditSelection(self) {

	if ($(self).hasClass("bg-blue-light-geocontact")) {
		$(self).removeClass("bg-blue-light-geocontact")
	}
}

// Lors de l'annulation et de la fermeture d'un formulaire lance la fonction removeEditSelection()
$(".add-listing").click(function(){
	$("tr").each(function(){
		removeEditSelection($(this))
	})
})

// FORMULAIRES DEPARTEMENTS

	// Lors de l'édition d'un département
	$(".dep-edition").click(function(){

		var self = $(this)
		// Distingue la ligne du tableau des départements en cours d'édition
		
		$("tr").each(function(){
			removeEditSelection($(this))
		}).promise().done(function(){
			$(self).closest("tr").addClass("bg-blue-light-geocontact")
		})

		// Récupère toutes les données du département à éditer
		var department = $(this).closest(".department-info")
		var departmentId = $(department).data("departementId")
		var departmentCode = $(department).find(".dep-info-code").html()
		var departmentLibelle = $(department).find(".dep-info-libelle").html()
		
		// Insert les données du dep à éditer dans le formulaire d'édition
		// Insert l'action dans le formulaire
		$("#edit-dep").find("form").attr("action", "Admin/departmentUpdate")
		$("#edit-dep").find("#dep-edit-id").val(departmentId)
		$("#edit-dep").find("#dep-edit-code").val(departmentCode)
		$("#edit-dep").find("#dep-edit-libelle").val(departmentLibelle)

		// Fait apparaitre le formulaire d'édition
		$("#edit-dep").slideDown();
	})


// FORMULAIRES LOCALITES

	// Variable définissant le formulaire de la localité ouvert = "edit" || "new"
	var modalOrigin = null

	// Lorsque le formulaire d'édition d'une localité est actif
	$("#editLocDep").click(function(){
		modalOrigin = "edit"
	})

	// Lorsque le formulaire de création d'une localité est actif
	$("#newLocDep").click(function(){
		modalOrigin = "new"
	})

	// Lors de l'édition d'une localité
	$(".loc-edition").click(function(){

		var self = $(this)
		// Distingue la ligne du tableau des localités en cours d'édition
		
		$("tr").each(function(){
			removeEditSelection($(this))
		}).promise().done(function(){
			$(self).closest("tr").addClass("bg-blue-light-geocontact")
		})

		// Récupère toutes les données de la localité à éditer
		var localite = $(this).closest(".localite-info")
		var localiteId = $(localite).data("localiteId")
		var localiteCodePostal = $(localite).find(".loc-info-codePostal").html()
		var localiteCodeInsee = $(localite).find(".loc-info-codeInsee").html()
		var localiteLibelle = $(localite).find(".loc-info-libelle").html()

		// Récupère l'id du département rattaché à la localité
		var localitedep = $(localite).find(".loc-info-depId")
		var localiteDepId = $(localitedep).data("depId")
		
		// Insert les données de la localité à éditer dans le formulaire d'édition
		// Insert l'action dans le formulaire
		$("#edit-loc").find("form").attr("action", "Admin/localiteUpdate")
		$("#edit-loc").find("#loc-edit-id").val(localiteId)
		$("#edit-loc").find("#loc-edit-codePostal").val(localiteCodePostal)
		$("#edit-loc").find("#loc-edit-codeInsee").val(localiteCodeInsee)
		$("#edit-loc").find("#loc-edit-libelle").val(localiteLibelle)

		// Définit et cible le formulaire dans lequel devra être inséré le département
		modalOrigin = "edit"

		// Sélectionne le département de la localité à éditer dans la modal pour l'insérer dans le formulaire
		var previoudDepPreselector = "#" + localiteDepId
		$(previoudDepPreselector).closest('.loc-DepId').click()
		$("#dep-modal-validation").click()

		// Fait apparaitre le formulaire d'édition
		$("#edit-loc").slideDown();
	})

	// Fonction de présélectction du département en fonction du code postal
	// Lors de la sortie de l'input du code postal
	$("#loc-new-codePostal").blur(function(){
		
		// Récupère le CP entré
		// Lui retire les 3 derniers chiffres
		// ex : 19100 -> 19, 1400 -> 1
		var depByPostalCode = $(this).val().slice(0,-3)

		var depCode = depByPostalCode

		// Si le résultat comporte moins de 2 chiffre, rajoute un "0" devant pour trouver le département correspondant
		// ex : 1 -> 01
		if (depByPostalCode.length < 2) {
			depCode = "0" + depByPostalCode
		}

		// Définit et cible le formulaire dans lequel devra être inséré le département
		modalOrigin = "new"

		// Sélectionne le département de la nouvelle localité avec le code du département déduit du code postal
		var depSelectorByPostalCode = "#locDepCode-" + depCode
		$(depSelectorByPostalCode).closest('.loc-DepId').click()
		$("#dep-modal-validation").click()

	})

	// Fonction permettant la récupération des données liées au département sélectionné dans la modal
	// Pour les insérer dans le formulaire da la localité 
	$(".loc-DepId").click(function(){

		var self = $(this)

		// ** tentative de focus du département présélectionné
		// * var depSelectedId = null

		// Supprime la class "custom-shadow" du département précédamment sélectionné
		// et l'ajoute au nouveau département sélectionné
		$(".custom-shadow").removeClass("custom-shadow").promise().done(function(){
			$(self).addClass("custom-shadow")
			// * depSelectedId = "#" + $(self).attr("id")
		})

		// * if (depSelectedId != null) {
		// * 	var webroot = $("#adminDashboard").data("webroot")
		// * 	$("#depSelectorFocus").attr("href", webroot + depSelectedId)
		// * 	$("#depSelectorFocus").click()
		// * }

		// Sélectionne les informations du département nécessaires pour compléter le formulaire ouvert de la localité
		var selectedDepLib = $(this).find(".loc-dep-lib").html()
		var selectedDepCode = $(this).find(".loc-dep-code").html()
		var selectedDepId = $(this).find(".loc-dep-lib").attr("id")

		// Affiche le code et le libellé du département sélectionné dans le formulaire ouvert de la localité
		$("#loc-" + modalOrigin + "-department").attr("placeholder", selectedDepCode + " - " + selectedDepLib)
		// Insert l'id du département sélectionné, nécessaire à l'enregistrement du dep de la localité en base de donnée
		//  dans l'input type="hidden" du formulaire ouvert de la localité
		$("#loc-" + modalOrigin + "-dep-id").val(selectedDepId)
	})

	// Sélectionne le département, valide la sélection et ferme la modal au double click sur un département rattaché à une localité
	$(".loc-DepId").dblclick(function(){
		$(this).click()
		$("#dep-modal-validation").click()
	})

	// Ferme la modal des departements rattachés à un localité et réi
	$("#dep-modal-validation").click(function(){
		$("#modalDepartements").fadeOut()
	})