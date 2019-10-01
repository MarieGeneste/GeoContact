<?php $this->title = "Dashboard admin"; ?>
<div class="container dashboard">
    <header class="head-list">
        <h2>Département</h2>
        <span class="add-listing"><button class="add-listing-btn">
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
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div id="add-dep">
        <header class="head-list">
            <h2>Ajouter un département</h2>
            <div class="add-listing"><button class="add-listing-btn">
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
        <div id="edit-dep" class="add-listing"><button class="add-listing-btn">
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
        <span class="add-listing"><button class="add-listing-btn">
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
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="edit-loc">
        <header class="head-list">
            <h2>Editer une localité</h2>
            <div class="add-listing"><button class="add-listing-btn">
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
            <div class="add-listing"><button class="add-listing-btn">
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