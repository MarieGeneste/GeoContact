<!-- Menu d'action rapide utilisateur -->
<?php include("View/Partials/menuUser.php") ?>

<div class="container dashboard" id="section-ctc">
  <header class="head-list">
    <div class="col-12 p-0 d-flex flex-wrap align-items-center">
      <h2 class="col-9 m-0">Contacts</h2>
      <div class="add-listing p-0 col-3">
        <button class="add-contact-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-plus-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
          </svg>
        </button>
      </div>
    </div>
  </header>
  <div class="table-wrapper-scroll-y scrollbar">
    <table class="table table-bordered table-striped mb-0">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th class="w-100px" scope="col">Editer</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contacts as $contact) { ?>
        <tr data-contact-id="<?= $contact["id"] ?>" class="contact-info">
          <td><?= $contact["contactNom"] ?></td>
          <td><?= $contact["contactPrenom"] ?></td>
          <td>
            <i class="fa fa-edit edit-contact-btn" style="font-size:26px">
              <input type="hidden" id="contact-id" value="<?= $contact["id"] ?>">
              <input type="hidden" id="contact-organisme" value="<?= $contact["organismeNom"] ?>">
              <input type="hidden" id="contact-nom" value="<?= $contact["contactNom"] ?>">
              <input type="hidden" id="contact-prenom" value="<?= $contact["contactPrenom"] ?>">
              <input type="hidden" id="contact-adr-num" value="<?= $contact["adrNum"] ?>">
              <input type="hidden" id="contact-adr-bis" value="<?= $contact["adrBis"] ?>">
              <input type="hidden" id="contact-adr-types" value="<?= $contact["adrIdTypesVoie"] ?>">
              <input type="hidden" id="contact-adr-voie" value="<?= $contact["adrVoie"] ?>">
              <input type="hidden" id="contact-adr-loc" value="<?= $contact["adrIdLocalites"] ?>">
              <input type="hidden" id="contact-adr-compl" value="<?= $contact["adrComplement"] ?>">
              <input type="hidden" id="contact-email" value="<?= $contact["email"] ?>">
              <input type="hidden" id="contact-tel" value="<?= $contact["telephone"] ?>">
              <input type="hidden" id="contact-site" value="<?= $contact["siteWeb"] ?>">
              <input type="hidden" id="contact-note" value="<?= $contact["note"] ?>">
            </i>
          </td>
        </tr>
        <?php }
        // Ajout de tableau vide pour ne pas laisser un gros blanc en cas d'absence de contacts
          $i = 7;
          while(count($contacts) < $i) { 
            echo"<tr><td></td><td></td><td></td></tr>";
            $i--;
          }    
        ?>
      </tbody>
    </table>
  </div>
  <!-- Ajout de contact -->
  <div id="add-contact">
    <header class="head-list">
      <div class="col-12 p-0 d-flex flex-wrap align-items-center">
        <h2 class="col-9 m-0">Ajouter un contact</h2>
        <div class="add-listing p-0 col-3"><button class="close-panel">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-plus-circle">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg> RETOUR</button>
        </div>

      </div>
    </header>
    <!-- Formulaire d'ajout ou d'édition d'un contact -->
    <?php include("View/Partials/contactDetails.php") ?>
  </div>
  <!-- Edition de contact -->
  <div id="edit-contact">
    <header class="head-list">
      <div class="col-12 p-0 d-flex flex-wrap align-items-center">
        <h2 class="col-9 m-0">Modifier un contact</h2>
        <div class="add-listing col-3 p-0">
          <button class="close-panel">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-plus-circle">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg> RETOUR
          </button>
        </div>
      </div>
    </header>
    <!-- Formulaire d'ajout ou d'édition d'un contact -->
    <?php include("View/Partials/contactDetails.php") ?>
  </div>
</div>