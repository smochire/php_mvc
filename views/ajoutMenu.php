<?php
    ob_start();
?>
    <div class="my-3 py-5 pe-5 rounded-3" style="width: 500px; justify-content: center; align-items: center; text-align: center; margin-left: 30%; background-color: snow;">
    <form action="<?=URL ?>/menus/ajoutValid" method="post" enctype="multipart/form-data">
        <div class="input-group align-items-center">
            <label for="nom" style="width: 20%;text-align: right;">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control ms-1" >
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="prix" style="width: 20%;text-align: right;">Prix :</label>
            <input type="text" name="prix" id="prix" class="form-control ms-1" >
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="description" style="width: 20%;text-align: right;">Description :</label>
            <input type="text" name="description" id="description" class="form-control ms-1" >
        </div>
        <div class="input-group align-items-center mt-3">
            <label for="categorie" style="width: 20%;text-align: right;">Catégorie :</label>
            <input type="text" name="categorie" id="categorie" class="form-control ms-1" >
        </div>
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


