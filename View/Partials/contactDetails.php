<form action="User/***" method="post">
  <div class="form-row">
    <!-- Organisme -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-organisme">Organisme<b>*</b></label>
      <input id="ctc-organisme" name="ctc-organisme" type="text" class="form-control"
        placeholder="Organisme du contact">
    </div>
    <!-- Nom -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-nom">Nom<b>*</b></label>
      <input id="ctc-nom" name="ctc-nom" type="text" class="form-control" placeholder="Nom du contact">
    </div>
    <!-- Prénom -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-prenom">Prénom<b>*</b></label>
      <input id="ctc-prenom" name="ctc-prenom" type="text" class="form-control" placeholder="Prénom du contact">
    </div>
    <!-- Numéro de voie -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-adr-num">Numéro</label>
      <input id="ctc-adr-num" name="ctc-adr-num" type="number" class="form-control" placeholder="Prénom du contact">
    </div>
    <!-- Multiplicatifs de voie -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-adr-bis">Multiplicatif</label>
      <select id="ctc-adr-bis" name="ctc-adr-bis" class="form-control" placeholder="Multiplicatif">
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
      <select id="ctc-adr-type" name="ctc-adr-type" class="form-control" placeholder="Type">
        <option value=""></option>
        <option value="Allée">Allée</option>
        <option value="Avenue">Avenue</option>
        <option value="Boulevard">Boulevard</option>
        <option value="Carrefour">Carrefour</option>
        <option value="Chemin">Chemin</option>
        <option value="Chaussée">Chaussée</option>
        <option value="Cité">Cité</option>
        <option value="Corniche">Corniche</option>
        <option value="Cours">Cours</option>
        <option value="Domaine">Domaine</option>
        <option value="Descente">Descente</option>
        <option value="Ecart">Ecart</option>
        <option value="Esplanade">Esplanade</option>
        <option value="Faubourg">Faubourg</option>
        <option value="GrandeRue">Grande Rue</option>
        <option value="Hameau">Hameau</option>
        <option value="Halle">Halle</option>
        <option value="Impasse">Impasse</option>
        <option value="Lieudit">Lieu-dit</option>
        <option value="Lotissement">Lotissement</option>
        <option value="Marché">Marché</option>
        <option value="Montée">Montée</option>
        <option value="Passage">Passage</option>
        <option value="Place">Place</option>
        <option value="Plaine">Plaine</option>
        <option value="Plateau">Plateau</option>
        <option value="Promenade">Promenade</option>
        <option value="Parvis">Parvis</option>
        <option value="Quartier">Quartier</option>
        <option value="Quai">Quai</option>
        <option value="Résidence">Résidence</option>
        <option value="Ruelle">Ruelle</option>
        <option value="Rocade">Rocade</option>
        <option value="Rondpoint">Rondpoint</option>
        <option value="Route">Route</option>
        <option value="Rue">Rue</option>
        <option value="Sentier">Sentier</option>
        <option value="Square">Square</option>
        <option value="Terreplein">Terreplein</option>
        <option value="Traverse">Traverse</option>
        <option value="Villa">Villa</option>
        <option value="Village">Village</option>
      </select>
    </div>
    <!-- Voie -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-adr-voie">Voie</label>
      <input id="ctc-adr-voie" name="ctc-adr-voie" type="text" class="form-control" placeholder="Type de voie">
    </div>
    <!-- Localité -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-adr-loc">Localité</label>
      <input id="ctc-adr-loc" name="ctc-adr-loc" type="text" class="form-control" placeholder="Ville du contact">
    </div>
    <!-- Complément -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-adr-compl">Complément</label>
      <input id="ctc-adr-compl" name="ctc-adr-compl" type="text" class="form-control"
        placeholder="Complément de l'adresse">
    </div>
    <!-- Mail -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-mail">Mail</label>
      <input id="ctc-mail" name="ctc-mail" type="email" class="form-control" placeholder="Adresse mail du contact">
    </div>
    <!-- Téléphone -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-tel">Téléphone</label>
      <input id="ctc-tel" name="ctc-tel" type="tel" class="form-control" placeholder="Téléphone du contact">
    </div>
    <!-- Site -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-site">Site</label>
      <input id="ctc-site" name="ctc-site" type="url" class="form-control" placeholder="Site internet">
    </div>
    <!-- Note -->
    <div class="col-md-4 col-sm-12">
      <label for="ctc-note">Note</label>
      <input id="ctc-note" name="ctc-note" type="text" class="form-control" placeholder="Note">
    </div>
  </div>
  <span class="require-msg">* champs obligatoires</span>
  <div class="form-group text-right mb-0 mt-3">
    <button type="submit" class="btn btn-success submit">Ajouter</button>
  </div>
</form>