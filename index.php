<?php
    require_once "controllers/MenuController.php";
    $menuController = new MenuController();

    $test = "$_SERVER[PHP_SELF]";
    define("URL", str_replace("/index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
    "://$_SERVER[HTTP_HOST]"));
    $url = explode("/", filter_var($test),FILTER_SANITIZE_URL);
    if((empty($url[2]) && $url[1]==="index.php" && $url[0]==="") || ($url[2]==="accueil" && $url[1]==="index.php" && $url[0]===""))
    {
        $menus = $menuController->getMenus();
        require "views/accueil.php";
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]===""&& empty($url[3]))
    {
        $menus = $menuController->getMenus();
        require "views/menus.php";
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]==="" && $url[3]==="ajout" && empty($url[4]))
    {
        $menus = $menuController->getMenus();
        require "views/ajoutMenu.php";
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]==="" && $url[3]==="ajoutValid" && empty($url[4]))
    {
        $menuController->ajoutMenuValidation();
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]==="" && $url[3]==="update" && !empty($url[4]) )
    {
        $menuController->updateMenu($url[4]);
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]==="" && $url[3]==="modifierValid" && empty($url[4]) )
    {
        $menuController->modifierMenuValidation();
    }elseif($url[2]==="menus" && $url[1]==="index.php" && $url[0]==="" && $url[3]==="delete" && !empty($url[4]) )
    {
        $menuController->suppressionMenu($url[4]);
    }else{
        require "views/error.php";
    }



