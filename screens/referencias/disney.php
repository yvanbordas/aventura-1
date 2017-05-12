<!DOCTYPE html>
<html>
<head>
    <title>Comdetur Agencia de Viajes | Disney</title>
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
    <section id="disney" class="trigger-nav pd-0">
        <div id="frame">
            <div class="content-frame">
                <div class="article">
                    <div class="header">
                        <div class="categories-overlay"></div>
                        <div class="content-img" style="background-image: url(images/internas/disney.jpg)"></div>
                        <div class="content-header"><h1>Disney</h1></div>
                    </div>
                    <div class="article-section">
                        <div class="article-content">
                            <form generic="true" to="dasrob@gmail.com" action="hrg" subject="Titulo mensaje">
                            <div class="article-title bc-7">
                                <h3>Disney</h3>
                            </div>
                            <div class="article-media">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Nombre y Apellido" class="form-control" name="nombre"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="number" placeholder="Cantidad de personas" class="form-control" name="ciudad"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Teléfono" class="form-control" name="telefono"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Handicap" class="form-control" name="mail"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" id="B_DATE_2" placeholder="Salida" class="form-control" data-pmu-format="d/m/Y" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" id="B_DATE_2" placeholder="Regreso" class="form-control" data-pmu-format="d/m/Y" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bt-style">
                                <a href="#" type="submit"><span data-hover="Solicitar">Solicitar</span></a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once 'screens/sections/footer.php' ?>
</body>
</html>