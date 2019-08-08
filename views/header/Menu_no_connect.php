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
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= routeUrl() ?>SignUp"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="<?= routeUrl() ?>Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="<?= routeUrl() ?>Home">Home</a></li>
                            <li><a href="<?= routeUrl() ?>Farmers/1">Farmers</a></li>
                            <li><a href="<?= routeUrl() ?>Products/1">Products</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>