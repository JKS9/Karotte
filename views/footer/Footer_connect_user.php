<footer>
    <div class="container footerStart">
        <div class="bar"></div>
        <p>follow <strong>Karrote</strong> on :</p>
        <div class="network">
            <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook"></a>
            <a href="https://twitter.com/" target="_blank" class="fa fa-twitter"></a>
            <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin"></a>
            <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>
            <a href="https://www.pinterest.fr/" target="_blank" class="fa fa-pinterest"></a>
        </div>
    </div>
    <div class="container-fluid footerMiddle">
        <div class="marginFooter">
            <div class="footerUl col col-sm-3">
                <p>Navigation</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                    <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                    <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                    <li><a href="<?= routeUrl() ?>Cart">Cart</a></li>
                    <li><a href="<?= routeUrl() ?>SiteMap">SiteMap</a></li>
                </ul>
            </div>
            <div class="footerUl col col-sm-3">
                <p>Profile</p>
                <ul>
                    <li><a href="<?= routeUrl() ?>Account">My account</a></li>
                    <li><a href="<?= routeUrl() ?>OrderHistory">order history</a></li>
                    <li><a href="<?= routeUrl() ?>controller/logout.php">disconnect</a></li>
                </ul>
            </div>
            <div class="footerUl col col-sm-3">
                <p>Means of payment</p>
                <ul class="payment">
                    <li><i class="fa fa-cc-amex" style="font-size:36px;color:white"></i></li>
                    <li><i class="fa fa-cc-mastercard" style="font-size:36px;color:white"></i></li>
                    <li><i class="fa fa-cc-paypal" style="font-size:36px;color:white"></i></li>
                    <li><i class="fa fa-cc-visa" style="font-size:36px;color:white"></i></li>
                </ul>
            </div>
            <div class="footerUl col col-sm-3">
                <p>Contact</p>
                <ul>
                    <li>28 rue Ernest Renan</li>
                    <li>France, Eaubonne 95600</li>
                    <li>karotteContact@gmail.com</li>
                    <li>01 01 01 01 01</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid footerEnd">
        <span>Copyright © 2019 <a href="<?= routeUrl() ?>Home">Karotte</a></span>
    </div>
</footer>
