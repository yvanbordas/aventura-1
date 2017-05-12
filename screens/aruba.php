<!DOCTYPE html>
<html>
    <head>
        <title>Aventura viajes - Paquete</title>
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
      <section class="top-section" style="background-image: url(images/destinos/cover/aruba.jpg)">
        <div class="parallax-overlay">
          <div class="centrize">
            <div class="v-center">
              <div class="container">
                <div class="main-title">
                  <h1>Aruba</h1>
                  <span>Todo incluido</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <section class="relative-content">
          <div class="container">
            <div class="main-description">
              <div class="title center">
                <div class="mt-50"><img src="images/detail.png"></div>
              </div>
            </div>
            <div class="title center">
              <h3>Incluye</h3>
              <div class="divider"><img src="images/divider.png"></div>
            </div>
            <div class="information-container">
              <ul>
                <li>Pasaje aéreo de Copa Airlines</li>
                <li>Todos los traslados en regular</li>
                <li>05 noches de alojamiento en hotel seleccionado, con régimen todo incluido</li>
                <li>Tarjeta de asistencia al viajero</li>
                <li>Tasas de embarque, impuestos e IVA</li>
              </ul>
            </div>
            <div class="price-container">
              <div class="col-sm-6">
                <div class="price-box">
                    <h3>Tamarjin Aruba</h3>
                    <p>Desde U$D 2.190</p>
                    <span>Para viajes entre 17 de abril y 30 de junio</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="price-box">
                  <h3>Divi Aruba</h3>
                  <p>Desde U$D 2.253</p>
                  <span>Para viajes entre 17 de abril y 30 de junio</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="price-box">
                  <h3>Riu Palace Antillas</h3>
                  <p>Desde U$D 2.324</p>
                  <span>Para viajes entre 17 de abril y 30 de abril</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="price-box">
                  <h3>Riu Palace Aruba</h3>
                  <p>Desde U$D 2.330</p>
                  <span>Para viajes entre 17 de abril y 30 de abril</span>
                </div>
              </div>
            </div>
            <div class="article-section">
              <div class="article-content">
                <div class="title">
                  <h3>Reserva</h3>
                </div>
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Nombre y Apellido" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Teléfono" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Fecha" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Cantidad de adultos" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text" placeholder="Cantidad de niños" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group">
                      <textarea name="message" placeholder="Detalles y especificaciones" data-required="true" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="btn-bottom">
                    <a href="#" class="btn btn-color">Enviar reserva</a>
                  </div>
              </div>
            </div>
        </div>
      </section>
      <section class="bg-grey">
          <div class="container">
            <div class="title">
              <h3>Paquetes similares</h3>
            </div>
            <div id="cslide-slides" class="cslide-slides-master full-slide clearfix">
              <div class="cslide-slides-container clearfix">
                  <div class="cslide-slide">
                      <div class="pack-boxes">
                          <div class="pack-container">
                              <div class="bg-overlay"></div>
                              <div class="pack-img" style="background-image: url(images/destinos/destacados/1.jpg);"></div>
                              <div class="pack-title">
                                  <h3>Bariloche Express</h3>
                                  <div class="boxes-button"><a href="#" class="btn">Desde U$D 720</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="pack-boxes">
                          <div class="pack-container">
                              <div class="bg-overlay"></div>
                              <div class="pack-img" style="background-image: url(images/destinos/destacados/2.jpg);"></div>
                              <div class="pack-title">
                                  <h3>Nueva York</h3>
                                  <div class="boxes-button"><a href="#" class="btn">Desde U$D 1.775</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="pack-boxes">
                          <div class="pack-container">
                              <div class="bg-overlay"></div>
                              <div class="pack-img" style="background-image: url(images/destinos/destacados/3.jpg);"></div>
                              <div class="pack-title">
                                  <h3>Cancún</h3>
                                  <div class="boxes-button"><a href="#" class="btn">Desde U$D 1.335</a></div>
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