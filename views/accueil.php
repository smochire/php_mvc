<?php
    ob_start();
?>
    <div class="card-group my-5 ms-3 ">
        <?php if (!empty($menus)) {
            for ($i=0;$i<count($menus);$i++): ?>
            <div class="page-item d-flex me-4 my-2 pe-1  border border-2  " style="background-color: #fdfef9; border-radius: 10px 30px 30px 10px; width: 400px" >
                <div class="img-fluid">
                    <img src="../public/images/<?=$menus[$i]->getImage() ?>" alt="" width="190px" height="253px" class="rounded-3">
                </div>
                <div class="pt-2 px-1 ms-1">
                    <div ><?=$menus[$i]->getNom() ?></div>
                    <div class="my-5 " ><?=$menus[$i]->getPrix() ?> $</div>

                    <div class="mt-xl-5"><?=$menus[$i]->getCategorie() ?></div>
                </div>

            </div>
           <?php endfor;
        } ?>

    </div>

<?php
    $content = ob_get_clean();
    $titre = "Accueil";
    require "template.php";
?>


