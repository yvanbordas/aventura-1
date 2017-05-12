<!DOCTYPE html>
<html>
    <head>
        <title>Comdetur Agencia de Viajes | HRG</title>
        <?php include_once 'screens/sections/header.php'; ?>
    </head>
    <body id="half-section">
    <div id="loader"><div class="centrize"><div class="v-center"><div id="mask"><span></span><span></span><span></span><span></span><span></span></div></div></div></div>
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
        <div class="article-form">
          <div class="more-link trigger-close">
            <div class="bt-style">
              <a href="#"><span data-hover="Cerrar">Cerrar</span></a>
            </div>
          </div>
          <div class="article-title bc-2">
            <h3>Solicitud de presupuesto</h3>
          </div>
          <div class="article-text">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" placeholder="Nombre y Apellido" class="form-control" id="title"/>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Email" class="form-control" id="country-city"/>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Teléfono" class="form-control" id="continent"/>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-select">
                  <select name="month" class="form-control">
                    <option selected="selected" value="01">01 Adultos</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-select">
                  <select name="month" class="form-control">
                    <option selected="selected" value="01">01 Niños (2-11)</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-select">
                  <select name="month" class="form-control">
                    <option selected="selected" value="01">01 Bebés (-2)</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="more-link trigger">
            <div class="bt-style">
              <a href="#"><span data-hover="Solicitar">Solicitar</span></a>
            </div>
          </div>
        </div>
        <div class="article">
          <div class="header">
            <div class="categories-overlay"></div>
            <div class="content-img" style="background-image: url(images/internas/empresas.jpg)"></div>
            <div class="content-header">
              <div class="more-link trigger">
                <div class="bt-style">
                  <a href="#"><span data-hover="Reservar">Reservar</span></a>
                </div>
              </div>
              <h1><img src="images/logos/hrg.jpg"></h1>
            </div>
          </div>
          <div class="article-section">
            <div class="article-content">
              <div class="article-title bc-2">
                <h3>COMDETUR HRG Paraguay, Partners Meeting y servicios corporativos</h3>
              </div>
              <div class="article-media">
                <div class="js-media-player">
                  <video poster="images/internas/main-bg.jpg" controls crossorigin>
                      <source src="video/video-2.mp4" type="video/mp4">
                      <source src="video/video-2.webm" type="video/webm">
                  </video>
                </div>
              </div>
              <div class="article-text">
                <h4 class="cl-2">Nuestros servicios</h4>
                <p>Brindamos una respuesta y solución rápida y completa. Ofrecemos servicios de:</p>
                <ul>
                  <li>Reserva de tickets aéreos y bus.</li>
                  <li>Reserva de traslados.</li>
                  <li>Reserva de alojamientos.</li>
                  <li>Reserva de vehículos.</li>
                  <li>Asistencia.</li>
                  <li>Servicios de visado y pasaportes.</li>
                  <li>Entrega de documentación a domicilio.</li>
                  <li>Atención al cliente.</li>
                  <li>Consultoría, Business Managment.</li>
                                    </ul>
              </div>
              <div class="article-text">
                <h4 class="cl-2">Administración de cuentas corporativas</h4>
                <p>Contamos con un excelente equipo de Agentes corporativos destacados por su experiencia, capacidad y profesionalismo en el rubro del mercado turístico.</p>
                <ul>
                  <li>Asistir a las empresas en solicitudes de viajes.</li>
                  <li>Analizar las mejores opciones aprovechando las oportunidades de ahorros de costo.</li>
                  <li>Analizar cumplimiento de la política de viaje.</li>
                  <li>Controlar el cumplimiento de los servicios contratados y requeridos por la empresa.</li>
                  <li>Implementar encuestas de satisfacción para evaluar la relación entre la agencia y la empresa.</li>
                </ul>
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