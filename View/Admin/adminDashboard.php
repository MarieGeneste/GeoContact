<?php $this->title = "Dashboard admin"; ?>
<nav class="admin-navigation">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <ul class="tab">
                    <li class="item"><a href="<?= Configuration::get('webroot') ?>Admin/adminDashboard#section-dep" class="fw-bold text-white">Départements</a></li>
                    <li class="item"><a href="<?= Configuration::get('webroot') ?>Admin/adminDashboard#section-loc" class="fw-bold text-white">Localités</a></li>
                </ul>
            </div>
            <div class="col-4">
                <a href="<?= Configuration::get('webroot') ?>Admin/adminDisconnect" class="btn btn-danger">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>
<div class="container dashboard" id="section-dep">
    <header class="head-list">
        <div class="col-12 p-0 d-flex flex-wrap align-items-center">
            <h2 class="col-9 m-0">Département</h2>
            <div class="add-listing p-0 col-3">
                <button class="add-dep-btn">
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
                    <th scope="col">Code</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($departments)) {
                    foreach ($departments as $department) { ?>
                <tr id="<?= $department["id"] ?>" class="department-info">
                    <th scope="row" class="dep-info-code"><?= $department["code"] ?></th>
                    <td class="dep-info-libelle"><?= $department["libelle"] ?></td>
                    <td class="text-center"><i class="fa fa-edit dep-edition" style="font-size:26px"></i></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>
    <div id="add-dep">
        <header class="head-list">
            <div class="col-12 p-0 d-flex flex-wrap align-items-center">
                <h2 class="col-9 m-0">Ajouter un département</h2>
                <div class="add-listing p-0 col-3"><button class="add-dep-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg> RETOUR</button>
                </div>

            </div>
        </header>
        <div class="panel">
            <div class="container">
                <form action="Admin/departmentInsert" method="post">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input name="dep-new-code" type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input name="dep-new-libelle" type="text" class="form-control" placeholder="Libellé">
                        </div>
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right mb-0 mt-3">
                        <button type="submit" class="btn btn-success submit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-dep">
        <header class="head-list">
            <div class="col-12 p-0 d-flex flex-wrap align-items-center">
                <h2 class="col-9 m-0">Modifier un département</h2>
                <div id="edit-dep" class="add-listing col-3 p-0">
                    <button class="edit-dep-btn">
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
        <div class="panel">
            <div class="container">
                <form method="post">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="code">Code <b>*</b></label>
                            <input id="dep-edit-code" name="dep-edit-code" type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="col-md-8">
                            <label for="libelle">Libellé <b>*</b></label>
                            <input id="dep-edit-libelle" name="dep-edit-libelle" type="text" class="form-control" placeholder="Libellé">
                        </div>
                        <input id="dep-edit-id" name="dep-edit-id" type="hidden">
                    </div>
                    <span class="require-msg">* champs obligatoires</span>
                    <div class="form-group text-right">
                        <button type="submit" formaction="Admin/departmentDelete" class="btn btn-danger trash">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                            </svg>
                        </button>
                        <button id="department-edit-validation" type="submit" class="btn btn-success submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <header class="head-list" id="section-loc">
        <div class="col-12 p-0 d-flex flex-wrap align-items-center">
            <h2 class="col-9 m-0">Localités</h2>
            <div class="add-listing p-0 col-3">
                <button class="add-loc-btn">
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
                    <td class="text-center"><i class="fa fa-edit" style="font-size:26px"></i></td>
                </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <div id="edit-loc">
        <header class="head-list">
            <div class="col-12 p-0 d-flex flex-wrap align-items-center">
                <h2 class="col-9 m-0">Editer une localité</h2>
                <div class="add-listing p-0 col-3">
                    <button class="edit-loc-btn">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                            </svg>
                        </button>
                        <button type="submit" class="btn btn-success submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="add-loc">
        <header class="head-list">
            <div class="col-12 p-0 d-flex flex-wrap align-items-center">
                <h2 class="col-9 m-0">Ajouter une localité</h2>
                <div class="add-listing p-0 col-3">
                    <button class="add-loc-btn">
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
                    <div class="form-group text-right mb-0 mt-3">
                        <button type="submit" class="btn btn-success submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>


</style>