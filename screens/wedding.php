<!DOCTYPE html>
<html>
    <head>
        <title>Aventura viajes - Wedding planner de tus viajes</title>
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
      <section class="top-section" style="background-image: url(images/cover/wedding.jpg)">
        <div class="parallax-overlay">
          <div class="centrize">
            <div class="v-center">
              <div class="container">
                <div class="main-title">
                  <h1>Wedding Planning</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="relative-content">
        <div class="container">
          <div class="main-description">
            <div class="title">
              <h2>Nuestro servicio</h2>
              <div class="divider"><img src="images/divider.png"></div>
              <p>Somos una empresa en constante crecimiento y nos mantenemos actualizados con las nuevas tendencias en relación a las opciones turísticas,  contamos con este servicio de última moda y nuestros profesionales altamente calificados se encargan de planificar y organizar la boda soñada de los pasajeros en paradisiacas playas del Caribe o en el lugar que los pasajeros lo deseen. Recientemente firmamos contrato de alianza comercial con el Sr. Ignacio Amarilla de Barros Barreto, prestigioso Wedding Planner así como también colaboramos con el blog para novias "Azul y Prestado".</p>
            </div>
          </div>
          <div class="title">
            <h3>Elegí uno de los paquetes o solicita el tuyo</h3>
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
        <div class="article-section">
          <div class="article-content">
            <div class="title">
              <h3>Solicitud</h3>
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
                    <input type="text" placeholder="Destino" class="form-control"/>
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