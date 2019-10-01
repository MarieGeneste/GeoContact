<?php $this->title = "Dashboard admin"; ?>
<div class="container dashboard">
    <header class="head-list">
        <h2>Département</h2>
        <span class="add-listing"><button class="add-dep-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg></button></span>
    </header>
    <div class="table-wrapper-scroll-y scrollbar">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($departments)) {
                    foreach ($departments as $department) { ?>
                        <tr>
                            <th scope="row"><?= $department["code"] ?></th>
                            <td><?= $department["libelle"] ?></td>
                            <td class="text-center"><i class="fa fa-edit" style="font-size:36px"></i></td>
                        </tr>
                    <?php }
                } ?>
            </tbody>
        </table>

    </div>
    <div id="add-dep">
        <header class="head-list">
            <h2>Ajouter un département</h2>
            <div class="add-listing"><button class="add-dep-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg> RETOUR</button></div>
        </header>
        <div class="panel">
            <div class="container">
                <form>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Libellé">
                        </div>
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary submit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-dep">
    <header class="head-list">
        <h2>Modifier un département</h2>
        <div id="edit-dep" class="add-listing"><button class="edit-dep-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg> RETOUR</button></div>
    </header>
    <div class="panel">
            <div class="container">
                <form>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Libellé">
                        </div>
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger trash">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                        <button type="submit" class="btn btn-primary submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <header class="head-list">
        <h2>Localités</h2>
        <span class="add-listing"><button class="add-loc-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg></button></span>
    </header>
    <div class="table-wrapper-scroll-y scrollbar">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Code Postal</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Code Insee</th>
                    <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($localites)) {
                    foreach ($localites as $localite) { ?>
                        <tr>
                            <th scope="row"><?= $localite["codePostal"] ?></th>
                            <td><?= $localite["libelle"] ?></td>
                            <th scope="col">01</th>
                            <th scope="col"></th>
                            <td class="text-center"><i class="fa fa-edit" style="font-size:36px"></i></td>
                        </tr>
                    <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <div id="edit-loc">
        <header class="head-list">
            <h2>Editer une localité</h2>
            <div class="add-listing"><button class="edit-loc-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg> RETOUR</button></div>
        </header>
        <div class="panel">
            <div class="container">
                <form>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Libellé">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label for="code">Code INSEE<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Département <b>*</b></label>
                            <input type="search" class="form-control" placeholder="Département">
                        </div>
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-danger trash">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                        <button type="submit" class="btn btn-primary submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="add-loc">
        <header class="head-list">
            <h2>Ajouter une localité</h2>
            <div class="add-listing"><button class="add-loc-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg> RETOUR</button></div>
        </header>
        <div class="panel">
            <div class="container">
                <form>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input type="text" class="form-control" placeholder="Libellé">
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-4">
                            <label for="code">Code INSEE<b>*</b></label>
                            <input type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Département <b>*</b></label>
                            <input type="search" class="form-control" placeholder="Département">
                        </div>
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right">
                        
                        <button type="submit" class="btn btn-primary submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>


</style>