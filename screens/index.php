<!DOCTYPE html>
<html>
	<head>
    	<title>Aventura viajes - Somos una agencia de viajes integral con 15 años en el mercado</title>
        <?php include_once 'screens/sections/header.php'; ?>
    </head>
    <body>
	    <div id="loader">
          <div class="centrize">
              <div class="v-center">
                  <div id="mask">
                      <img src="images/logo.gif">
                  </div>
              </div>
          </div>
      </div>
	    <header id="topnav">
            <div class="menu-item"><a class="navbar-toggle">
                <div class="lines"><span></span><span></span><span></span></div></a>
            </div>
            <?php include_once 'screens/sections/menu.php';?>
	    </header>
	    <section id="home" class="parallax">
            <div class="overlay"></div>
          <div data-parallax="scroll" data-image-src="images/slider/1.jpg" class="parallax-bg"></div>
          <div class="centrize">
            <div class="v-center">
              <div class="container">
                <div class="col-md-8">
                  <div class="title">
                    <h2>Aruba todo incluido</h2>
                    <p>05 noches desde U$D 2.190</p>
                    <p><a href="sc-aruba" class="btn">Ver paquete</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pd-0" style="background-image: url(images/bg/bg.jpg); background-size: contain; background-position: bottom center; background-repeat: no-repeat;">
            <div class="section-padding">
                <div class="container">
                    <div class="title center">
                        <h3>Cotizá tu viaje</h3>
                        <div class="divider"><img src="images/divider.png"></div>
                    </div>
                    <div class="article-section">
                      <div class="article-content">
                          <div class="form-row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="text" placeholder="Nombre y Apellido" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="number" placeholder="Teléfono" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="text" placeholder="Email" class="form-control"/>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="text" placeholder="Destino" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="text" placeholder="Fecha de salida" onfocus="(this.type='date')" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="text" placeholder="Fecha de regreso" onfocus="(this.type='date')" class="form-control"/>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="number" placeholder="Cantidad de adultos" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="number" placeholder="Cantidad de niños" class="form-control"/>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="number" placeholder="Cantidad de infantes" class="form-control"/>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group">
                              <textarea name="message" placeholder="Detalles y especificaciones" data-required="true" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="btn-bottom">
                            <a href="#" class="btn btn-color">Enviar solicitud</a>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pd-0"> 
            <div class="section-padding">
                <div class="main-grid">
                    <div class="main-boxes">
                        <div class="boxes-container">
                            <div class="bg-overlay"></div>
                            <div class="boxes-img" style="background-image: url(images/bg/bodas.jpg);"></div>
                            <div class="boxes-title">
                                <h2>Paquetes de bodas</h2>
                                <div class="boxes-button"><a href="sc-wedding" class="btn">Solicitar presupuesto</a></div>
                            </div>

                        </div>
                    </div>
                    <div class="main-boxes">
                        <div class="boxes-container">
                            <div class="bg-overlay"></div>
                            <div class="boxes-img" style="background-image: url(images/bg/estudiantiles.jpg);"></div>
                            <div class="boxes-title">
                                <h2>Paquetes estudiantiles</h2>
                                <div class="boxes-button"><a href="sc-estudiantiles" class="btn">Solicitar presupuesto</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="main-boxes">
                        <div class="boxes-container">
                            <div class="bg-overlay"></div>
                            <div class="boxes-img" style="background-image: url(images/bg/corporativos.jpg);"></div>
                            <div class="boxes-title">
                                <h2>Paquetes corporativos</h2>
                                <div class="boxes-button"><a href="sc-corporativos" class="btn">Solicitar presupuesto</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pd-0 bg-grey"> 
            <div class="section-padding">
                <div class="title center">
                    <h3>Últimos paquetes</h3>
                </div>
                <div id="cslide-slides" class="cslide-slides-master clearfix">
                    <div class="cslide-slides-container clearfix">
                        <div class="cslide-slide">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/1.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Bariloche Express</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 720</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/2.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Nueva York</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 1.775</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/3.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Cancún</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 1.335</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/4.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Rally Córdoba</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 611</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/5.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Lima & Cusco</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 1.352</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cslide-slide">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/6.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Guaratuba</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde Gs. 1.950.000</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/7.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Florianópolis</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde Gs. 3.095.000</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/8.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Camboriú Semana Santa</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde Gs. 2.460.000</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/9.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Miami</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 775</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/10.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Europa</h3>
                                        <div class="boxes-button"><a href="sc-aruba" class="btn">Desde U$D 1.890</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cslide-prev-next clearfix">
                        <span class="cslide-prev"><i class="fa fa-chevron-left"></i></span>
                        <span class="cslide-next"><i class="fa fa-chevron-right"></i></span>
                    </div>
                </div>
            </div>
        </section>
	    <footer id="footer">
	        <?php include_once 'screens/sections/footer.php';?>
	    </footer>
	    <?php include_once 'screens/sections/scripts.php';?>
        <script>
            $(document).ready(function(){
                $("#cslide-slides").cslide();
            });
        </script>
    </body>
</html>