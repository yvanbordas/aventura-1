<!DOCTYPE html>
<html>
    <head>
        <title>Aventura viajes - 15 años en el mercado</title>
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
      <section class="top-section" style="background-image: url(images/cover/nosotros.jpg)">
        <div class="parallax-overlay">
          <div class="centrize">
            <div class="v-center">
              <div class="container">
                <div class="main-title">
                  <h1>Aventura viajes</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-container">
        <div class="container small-section">
          <div class="title">
            <h3>Nuestro equipo</h3>
          </div>
          <div class="main-text">
            <p>Somos una agencia local con más de 15 años en el mercado, cuyos Socios propietarios son el Ing. Ramón María Sánchez Vega y la Sra. Carolina Soto de Sanchez.</p>
            <p>Nuestro equipo multilingüe se especializa en organizar viajes corporativos, personales y grupales a cualquiera sea el destino elegido por el cliente, tenemos amplia experiencia y una cadena de contactos que nos permiten planear el viaje perfecto a cualquier parte del mundo. Ofrecemos un servicio personalizado y la experiencia obtenida con años en la industria del turismo de acuerdo a los estándares de excelencia.</p>
          </div>
          <div class="image-section">
            <img src="images/bg/nosotros.png">
          </div>
        </div>
      </section>
      <footer id="footer">
          <?php include_once 'screens/sections/footer.php' ?>
      </footer>
      <?php include_once 'screens/sections/scripts.php' ?>
    </body>
</html>