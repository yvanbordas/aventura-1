<!DOCTYPE html>
<html>
<head>
    <title>Comdetur Agencia de viajes | Acceso Administrador</title>
    <?php include_once 'screens/sections/header.php'; ?>
</head>
<body id="half-section">
    <div id="loader">
        <div class="centrize">
            <div class="v-center">
                <div id="mask">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>
    <header id="topnav">
        <div class="logo"><a href="."><img src="images/logo.png" alt="" class="logo-light"><img src="images/logo-1.png" alt="" class="logo-dark"></a></div>
        <nav>
            <div class="button">
                <a class="btn-open" href="#"><span>Menú</span></a>
            </div>
        </nav>
        <?php include_once 'screens/sections/menu.php'; ?>
    </header>
    <section id="login" class="trigger-nav pd-0">
        <div id="frame">
            <div class="content-frame">
                <div class="article">
                    <div class="header">
                        <div class="categories-overlay"></div>
                        <div class="content-img" style="background-image: url(images/internas/administrador.jpg)"></div>
                        <div class="content-header"><h1>Administrador</h1></div>
                    </div>
                    <div class="article-section">
                        <div class="article-content">
                            <div class="article-title bc-2">
                                <h3>Acceso Administrador</h3>
                            </div>
                            <div class="article-media">
                                <div class="form-group">
                                    <input type="text" placeholder="Usuario" class="form-control" name="user"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Contraseña" class="form-control" name="pass"/>
                                </div>
                            </div>
                            <div class="article-text">
                                <div class="bt-style">
                                    <a href="#" id="btn-login"><span data-hover="Acceder">Acceder</span></a>
                                    <a href="#" id="cancel"><span data-hover="Cancelar">Cancelar</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php include_once 'screens/sections/footer.php' ?>
  </body>
</html>