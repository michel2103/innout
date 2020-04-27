<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewrport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/comum.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icofont.min.css">
        <link rel="stylesheet" href="assets/css/template.css">
        <title> In N' Out </title>
    </head>
    <body class="hide-sidebar1">
        <header class="header">
            <div class="menu-toggle">
                <i class="icofont-navigation-menu"></i>
            </div>
            <div class="logo"> 
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-ligh"> In </span>
                <span class="font-wight-bold mx-2"> N' </span>
                <span class="font-wight-light"> Out </span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div>

            <div class="spacer"></div>
            <div class="dropdown">
                <div class="dropdown-button">
                    <img class="avatar"
                        src="<?= "http://www.gravatar.com/avatar.php?gravatar_id="
                        . md5(strtolower(trim($SESSION['user']->email))) ?>"></img>
                    <span class="ml-3">
                        <?= $_SESSION['user']->name ?>
                    </span>
                    <i class="icofont-simple-down mx-2"></i>
                </div>
                <div class="dropdown-content">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="logout.php">
                                <i class="icofont-logout mr-2"></i>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>