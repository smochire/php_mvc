<?php
    ob_start();
?>
    <table class="table text-center mt-1  " style="width: 95%; margin-left: 2.5%; margin-right: 2.5%;">
        <thead class="text-white border-2 " style="background-color: #3dd5f3;">
            <tr>
                <td>Image</td>
                <td>Nom</td>
                <td>Prix</td>
                <td>Description</td>
                <td>Catégorie</td>
                <td colspan="2">Actions</td>
            </tr>
        </thead>
        <tbody class="table bg-light">
           <?php if (!empty($menus)) {
               for($i=0;$i<count($menus);$i++):?>
                   <tr>
                       <td class="align-middle"><img src="public/images/<?=$menus[$i]->getImage(); ?>" alt="" width="100px" height="100px" class="rounded-circle"></td>
                       <td class="align-middle"><?=$menus[$i]->getNom(); ?></td>
                       <td class="align-middle"><?=$menus[$i]->getPrix(); ?> $</td>
                       <td class="align-middle"><?=$menus[$i]->getDescription(); ?></td>
                       <td class="align-middle"><a class="btn btn-info" href="<?=URL?>/menus/update/<?=$menus[$i]->getId() ?>">Modifier</a></td>
                       <td class="align-middle"><a class="btn btn-warning" href="<?=URL?>/menus/delete/<?=$menus[$i]->getId()  ?>">Supprimer</a></td>
                   </tr>
                <?php endfor;
           } ?>
        </tbody>
    </table>
    <a href="<?=URL?>/menus/ajout" class="btn btn-primary" style="width: 95%; margin-left: 2.5%; margin-right: 2.5%;">Ajouter</a>
    <br>
    <br>
<?php
    $content = ob_get_clean();
    $titre = "Liste des menus";
    require "template.php";
?>
