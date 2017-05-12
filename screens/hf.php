<!DOCTYPE html>
<html>
<head>
    <title>Comdetur Agencia de Viajes | HF Invitational</title>
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
      <?php include_once 'screens/sections/menu.php' ?>
    </header>
    <section id="empresas" class="trigger-nav pd-0">
        <div id="frame">
            <div class="content-frame">
                <div class="article">
                    <div class="header">
                        <div class="categories-overlay"></div>
                        <div class="content-img" style="background-image: url(images/internas/hf.jpg)"></div>
                        <div class="content-header"><h1>HF Invitational</h1></div>
                    </div>
                    <div class="article-section">
                        <div class="article-content">                            
                            <div class="article-title bc-3">
                                <h3>HF Invitational inscripciones</h3>
                            </div>
                            <form generic="true" to="dasrob@gmail.com" action="hrg" subject="Titulo mensaje">
                                <div class="article-media">
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Nombre y Apellido" class="form-control" name="nombre"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Ciudad/País" class="form-control" name="ciudad"/>
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
                                                <input type="text" placeholder="Handicap" class="form-control" name="handicap"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-filter">
                                                <ul role="tablist" class="nav nav-tabs left">
                                                    <li><h5>Hospedaje:</h5></li>
                                                    <li role="presentation" class="active">
                                                        <a href="#form-hf-1" role="tab" data-toggle="tab">
                                                            <input type="radio" id="hf-1" name="hf" value="0">
                                                            <label for="hf-1">No</label>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#form-hf-2" role="tab" data-toggle="tab">
                                                            <input type="radio" id="hf-2" name="hf" value="1">
                                                            <label for="hf-2">Sí</label>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="tab-content">
                                                <div id="form-hf-1" role="tabpanel" class="tab-pane active"></div>
                                                <div id="form-hf-2" role="tabpanel" class="tab-pane">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nombre del hospedaje" class="form-control" name="hospedaje"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-filter">
                                                <ul role="tablist" class="nav nav-tabs left">
                                                    <li><h5>Foursome:</h5></li>
                                                    <li role="presentation" class="active">
                                                        <a href="#form-hf-3" role="tab" data-toggle="tab">
                                                            <input type="radio" id="hf-3" name="hf2" value="0">
                                                            <label for="hf-3">No</label>
                                                        </a>
                                                    </li>
                                                    <li role="presentation">
                                                        <a href="#form-hf-4" role="tab" data-toggle="tab">
                                                            <input type="radio" id="hf-4" name="hf2" value="1">
                                                            <label for="hf-4">Sí</label>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="tab-content">
                                                <div id="form-hf-3" role="tabpanel" class="tab-pane active"></div>
                                                <div id="form-hf-4" role="tabpanel" class="tab-pane">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nombre del foursome" class="form-control" name="foursome"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="bt-style">
                                        <a href="#" type="submit"><span data-hover="Inscribirse">Inscribirse</span></a>
                                    </div>
                                </div>
                            </form>
                            <div class="article-media">
                                <img src="images/internas/hf-invitational.jpg">
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