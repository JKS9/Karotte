<?php
include "controller/all.php";
?>
<header>
    <div class="container-fluid Menu">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= routeUrl() ?>Home">
                            <img src="<?= routeUrl() ?>src/images/logo/png/KAROTTE120px.png">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                            <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                            <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                            <li><a href="<?= routeUrl() ?>Cart" id="reloadCart"></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile<span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= routeUrl() ?>Account"><span class="glyphicon glyphicon-cog"
                                                                                 style="margin-right: 5px"></span>My account</a></li>
                                    <li><a href="<?= routeUrl() ?>OrderHistory"><span class="glyphicon glyphicon-list"
                                                                                      style="margin-right: 5px"></span>order history</a>
                                    </li>
                                    <li><a href="<?= routeUrl() ?>controller/logout.php"><span class="glyphicon glyphicon-off"
                                                                                               style="margin-right: 5px"></span>disconnect</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>