<?php require_once("views/partials/_menu.html.php") ?>

<section class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb bg-dark p-2">
                    <li class="breadcrumb-item"><a href="index.php?controller=stock">Home</a></li>
                    <li class="breadcrumb-item active">Livraison Marchandises</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="justify-content-between">
                    <a class="btn btn-dark text-white ml-1" data-toggle="modal" data-target="#modal-magasin">
                        <i class="fa fa-plus"></i> Livraison Magasin
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="card shadow">

        <?php require_once("views/partials/messageErrors.html.php") ?>

        <div class="card-body pb-1">
            <table id="DataTable" class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Libelle</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    <th>Prix Total</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach ($machandiseApprovissionner as $key => $value) { ?>
                        <tr>
                            <td><?= $value->codeMarchandise ?></td>
                            <td><?= $value->designation ?></td>
                            <td><?= $value->qte ?></td>
                            <td><?= $value->prixUnitaire ?></td>
                            <td><?= $value->prixTo ?></td>
                            <td>
                                <div class="dropdown dropleft pl-1">
                                    <div id="dropdownMenuButton2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <button class="btn btn-outline-dark btn-sm" style="cursor: pointer;"><i class="fa fa-ellipsis-v"></i> Actions</button>
                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item btn-edit" href="index.php?controller=stock&task=edit&code=<?= $value->codeMarchandise ?>">
                                            <i class="fa fa-edit"> Modifier</i>
                                        </a>
                                        <a class="dropdown-item" href="index.php?controller=stock&task=delete&code=<?= $value->codeMarchandise ?>">
                                            <i class="fa fa-trash"> Supprimer</i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- ========MODAL LIVRAISON========= -->
<div class="modal fade" id="modal-magasin">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <div>
                    <span class="h5 text-uppercase">Livraison Magasin</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?controller=livraison&task=create" method="post">
                    <div class="form-group">
                        <label for="fournisseur" class="form-label">Magasin</label>
                        <input list="magasins" name="magasin" id="magasin" class="form-control" placeholder="-- SELECTIONNER UN MAGASIN --">
                        <datalist id="magasins">
                            <?php foreach ($magasins as $key => $value) { ?>
                                <option value="<?= $value->codeMage ?>"><?= $value->designationMag ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="marchandise" class="form-label">Marchandises</label>
                        <input type="text" list="marchandApp" name="marchand" id="marchand" class="form-control" placeholder="-- SELECTIONNER UNE MARCHANDISE --">
                        <datalist id="marchandApp">
                            <?php foreach ($machandiseAppr as $key => $value) { ?>
                                <option value="<?= $value->codeMarchandise ?>"><?= $value->designation ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Quantite</label>
                        <input type="number" name="quantite" id="quantite" class="form-control" placeholder="Ex : ">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Prix unitaire</label>
                                <input type="number" name="prixUnitaire" id="prixUnitaire" class="form-control" placeholder="Ex : ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Devise</label>
                                <select name="devise" id="devise" class="form-control">
                                    <option selected>Choisir la devise</option>
                                    <option value="FC">Devise FC</option>
                                    <option value="USD">Devise USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-dark shadow">
                    <i class="fa fa-clean"></i> Effacer</button>
                <button type="submit" class="btn btn-primary shadow">
                    <i class="fa fa-save"></i> Enregistrer livraison</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php require_once("views/partials/_footer.html.php") ?>