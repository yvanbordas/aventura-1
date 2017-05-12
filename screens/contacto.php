<!DOCTYPE html>
<html>
    <head>
        <title>Aventura viajes - Grupos estudiantiles</title>
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
      <section class="top-section" style="background-image: url(images/cover/contacto.jpg)">
        <div class="parallax-overlay">
          <div class="centrize">
            <div class="v-center">
              <div class="container">
                <div class="main-title">
                  <h1>Informaciones</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="relative-content">
        <div class="container">
          <div class="title">
            <h3>Contacto</h3>
          </div>
          <div class="main-description">
            <div class="col-sm-4">
              <div class="contact-box"><i class="fa fa-map-marker"></i>
                <hr>
                <h4>Dirección</h4>
                <p><span>Pacheco 4245 c/Chóferes del Chaco</span><span>Asunción, Paraguay</span></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="contact-box"><i class="fa fa-phone"></i>
                <hr>
                <h4>Teléfonos</h4>
                <p><span>+595 21 664-720/1</span><span>+595 21 607-750/1</span></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="contact-box"><i class="fa fa-envelope"></i>
                <hr>
                <h4>Email</h4>
                <p><span>reservas@aventuraviajes.com.py</span><span>grupos@aventuraviajes.com.py</span></p>
              </div>
            </div>
          </div>
          <div class="article-section">
            <div class="article-content">
              <div class="title">
                <h3>Mensaje o consulta</h3>
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
                      <input type="text" placeholder="Asunto" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <textarea name="message" placeholder="Mensaje" data-required="true" class="form-control"></textarea>
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
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlEXP3c-q8EROGxfMG7lM8iQxAWQLOWws&callback="></script>
    </body>
</html>