<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$titre ?></title>
    <link rel="stylesheet" type="text/css" href="<?=URL ?>/views/bootstrap/bootstrap.css">


</head>
<body style="background-color: #e7f1ff;">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div  class="collapse navbar-collapse " id="navbarColor01">
        <div class="navbar mr-auto mx-5">
            <div class="nav-item mx-5">
                <img src="<?=URL ?>/public/images/petitmarcel.jpg" width="100px" height="50px" class="rounded-circle " alt="">
            </div>
            <div class="nav-item ">
                <a href="<?=URL?>/accueil" class="text-white nav-link">Accueil</a>
            </div>
            <div class="nav-item ">
                <a href="<?=URL?>/menus" class="text-white nav-link">Gèrer</a>
            </div>
        </div>

    </div>
</nav>
<?= $content ?>
<script src="<?=URL ?>/views/bootstrap/bootstrap.js"  ></script>
</body>
</html>
