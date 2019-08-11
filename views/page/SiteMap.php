<?php
if(isset($_SESSION['user'])){
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-sm-6">
                <p>Navigation</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>Cart">Cart</a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <p>Profile</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Account">My account</a></li>
                    <li><a href="<?= routeUrl() ?>OrderHistory">order history</a></li>
                    <li><a href="<?= routeUrl() ?>controller/logout.php">disconnect</a></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <div style="width: 300px; margin:0 auto" class="SiteMap_block_img">
                    <img style="width: 100%" src="<?= routeUrl() ?>src/images/photoSite/undraw_mind_map_cwng.svg">
                </div>
            </div>
        </div>
    </div>
    <?php
}else if (isset($_SESSION['farmer'])){
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-sm-6">
                <p>Navigation</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>AddAnAd">Add an ad</a></li>
                    <li><a href="<?= routeUrl() ?>Cart">Cart</a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <p>Profile</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Account">My account</a></li>
                    <li><a href="<?= routeUrl() ?>OrderHistory">order history</a></li>
                    <li><a href="<?= routeUrl() ?>AdHistory">ad history</a></li>
                    <li><a href="<?= routeUrl() ?>controller/logout.php">disconnect</a></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <div style="width: 300px; margin:0 auto" class="SiteMap_block_img">
                    <img style="width: 100%" src="<?= routeUrl() ?>src/images/photoSite/undraw_mind_map_cwng.svg">
                </div>
            </div>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="container SiteMap_block">
        <div class="row SiteMap_block_1">
            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <div style="width: 300px; margin:0 auto" class="SiteMap_block_img">
                    <img style="width: 100%" src="<?= routeUrl() ?>src/images/photoSite/undraw_mind_map_cwng.svg">
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>