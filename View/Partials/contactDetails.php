<!-- Auteur : Roupsard David (c'est de ma faute)-->
<section class="panel-contact">
  <div class="container">
    <form action="User/contactInsert" method="post">
      <div class="form-row">
        <!-- ID hidden -->
        <input type="hidden" name="ctc-id-hidden">
        <!-- Organisme -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-organisme">Organisme<b>*</b></label>
          <input id="ctc-organisme" name="ctc-organisme" type="text" class="form-control" placeholder="Organisme du contact" required>
        </div>
        <!-- Nom -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-nom">Nom<b>*</b></label>
          <input id="ctc-nom" name="ctc-nom" type="text" class="form-control" placeholder="Nom du contact" required>
        </div>
        <!-- Prénom -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-prenom">Prénom<b>*</b></label>
          <input id="ctc-prenom" name="ctc-prenom" type="text" class="form-control" placeholder="Prénom du contact" required>
        </div>
        <!-- Numéro de voie -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-num">Numéro</label>
          <input id="ctc-adr-num" name="ctc-adr-num" type="number" min="0" max="9999" class="form-control" placeholder="Numéro de rue" required>
        </div>
        <!-- Multiplicatifs de voie -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-bis">Bister</label>
          <select id="ctc-adr-bis" name="ctc-adr-bis" class="form-control">
            <option value="0" disabled selected>Veuillez remplir si nécéssaire</option>
            <option value=""></option>
            <option value="bis">bis</option>
            <option value="ter">ter</option>
            <option value="quater">quater</option>
            <option value="quinquies">quinquies</option>
            <option value="sexies">sexies</option>
            <option value="septies">septies</option>
            <option value="octies">octies</option>
            <option value="novies">novies</option>
            <option value="decies">decies</option>
          </select>
        </div>
        <!-- Types de voie -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-type">Types</label>
          <select id="ctc-adr-type" name="ctc-adr-type" class="form-control" placeholder="Type de voie" required>
            <option value="0" disabled selected>Veuillez choisir un type de voie</option>
            <?php foreach($typesVoies as $typesVoie) { ?>
              <option value="<?= $typesVoie["id"] ?>"><?= $typesVoie["libelle"] ?></option>
            <?php } ?>
          </select>
        </div>
        <!-- Voie -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-voie">Voie</label>
          <input id="ctc-adr-voie" name="ctc-adr-voie" type="text" class="form-control" placeholder="Nom de la voie" required>
        </div>
        <!-- Localité -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-loc">Localité</label>
          <select id="ctc-adr-loc" name="ctc-adr-loc" class="form-control" placeholder="Nom de la ville" required>
            <option value="0" disabled selected>Veuillez choisir une ville</option>
            <?php foreach($localites as $localite) { ?>
              <option value="<?= $localite["id"] ?>"><?= $localite["libelle"] ?></option>
            <?php } ?>
          </select>
        </div>
        <!-- Complément -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-adr-compl">Complément</label>
          <input id="ctc-adr-compl" name="ctc-adr-compl" type="text" class="form-control" placeholder="Complément d'adresse">
        </div>
        <!-- Mail -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-email">Mail</label>
          <input id="ctc-email" name="ctc-email" type="email" class="form-control" placeholder="Adresse mail du contact">
        </div>
        <!-- Téléphone -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-tel">Téléphone</label>
          <input id="ctc-tel" name="ctc-tel" type="tel" class="form-control" placeholder="ex : 06 12 34 57 89" required pattern="(0|\+33|0033)[1-9]((\.| |/)?[0-9]{2}){4}" maxlength="14">
        </div>
        <!-- Site -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-site">Site</label>
          <input id="ctc-site" name="ctc-site" type="url" class="form-control" placeholder="ex : https://www.monsite.com" onblur="checkURL(this)">
        </div>
        <!-- Note -->
        <div class="col-md-4 col-sm-12">
          <label for="ctc-note">Note</label>
          <input id="ctc-note" name="ctc-note" type="text" class="form-control" placeholder="Note">
        </div>
      </div>
      <span class="require-msg">* champs obligatoires</span>
      <div class="form-group text-center mb-0 mt-3">
        <button type="button" class="btn btn-danger contact-delete-btn d-none"><i class="fas fa-trash text-white"></i></button>
        <button type="submit" class="btn btn-success">Ajouter</button>
      </div>
    </form>
  </div>
</section>