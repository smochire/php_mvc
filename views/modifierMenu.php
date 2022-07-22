<?php
ob_start();
?>
<div class="my-3 py-5 px-5 rounded-3 " style="width: 600px; justify-content: center; align-items: center; text-align: center; margin-left: 30%; background-color: snow;">
    <form action="<?=URL ?>/menus/modifierValid" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$menu->getId() ?>">
        <div class="input-group align-items-center">
            <label for="nom" style="width: 20%;text-align: right;">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control ms-1" value="<?=$menu->getNom() ?>">
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="prix" style="width: 20%;text-align: right;">Prix :</label>
            <input type="text" name="prix" id="prix" class="form-control ms-1" value="<?=$menu->getPrix() ?>">
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="description" style="width: 20%;text-align: right;">Description :</label>
            <input type="text" name="description" id="description" class="form-control ms-1" value="<?=$menu->getDescription() ?>">
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="categorie" style="width: 20%;text-align: right;">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" class="form-control ms-1" value="<?=$menu->getCategorie() ?>">
        </div>
        <h3>Images : </h3>
        <img src="<?=URL ?>/public/images/<?=$menu->getImage();?>" alt="" width="100px;">
        <div class="input-group align-items-center mt-3">
            <label for="image" style="width: 20%; text-align: right;">Image :</label>
            <input type="file" name="image" id="image" class="form-control ms-1" >
        </div>
        <button type="submit" class="btn btn-primary mt-3 " style="width: 80%; margin-left: 20%;">Valider</button>
    </form>
</div>
<?php
$content = ob_get_clean();
$titre = "Accueil";
require "template.php";
?>


