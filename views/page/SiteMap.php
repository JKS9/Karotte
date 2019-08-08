<?php
if(isset($_SESSION['user'])){
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-md">
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>Cart">Cart</a></li>
                </ul>
            </div>
            <div class="col-md">
                <p>Profile</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Account">My account</a></li>
                    <li><a href="<?= routeUrl() ?>OrderHistory">order history</a></li>
                    <li><a href="<?= routeUrl() ?>controller/logout.php">disconnect</a></li>
                </ul>
            </div>
            <div class="col-md">
                <ul>
                    <li>
                        <a href="<?= routeUrl() ?>Home">
                            <img src="<?= routeUrl() ?>src/images/logo/png/KAROTTE120px.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}else if (isset($_SESSION['farmer'])){
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-md">
                <p>Navigation</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>AddAnAd">Add an ad</a></li>
                    <li><a href="<?= routeUrl() ?>Cart">Cart</a></li>
                </ul>
            </div>
            <div class="col-md">
                <p>Profile</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Account">My account</a></li>
                    <li><a href="<?= routeUrl() ?>OrderHistory">order history</a></li>
                    <li><a href="<?= routeUrl() ?>AdHistory">ad history</a></li>
                    <li><a href="<?= routeUrl() ?>controller/logout.php">disconnect</a></li>
                </ul>
            </div>
            <div class="col-md">
                <ul>
                    <li>
                        <a href="<?= routeUrl() ?>Home">
                            <img src="<?= routeUrl() ?>src/images/logo/png/KAROTTE120px.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-md">

            </div>
            <div class="col-md">
                <p>Navigation</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>SignUp">Sign Up</a></li>
                    <li><a href="<?= routeUrl() ?>Login">Login</a></li>
                    <li><a href="<?= routeUrl() ?>SiteMap">SiteMap</a></li>
                </ul>
            </div>
            <div class="col-md">
                <ul>
                    <li>
                        <a href="<?= routeUrl() ?>Home">
                            <img src="<?= routeUrl() ?>src/images/logo/png/KAROTTE120px.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
?>