<!DOCTYPE html>
<html>
	<head>
    	<title>Aventura viajes - Paquetes</title>
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
        <section class="page-title parallax">
          <div data-parallax="scroll" data-image-src="images/cover/paquetes.jpg" class="parallax-bg"></div>
          <div class="parallax-overlay">
            <div class="centrize">
              <div class="v-center">
                <div class="container">
                  <div class="title center">
                    <h1>Todos nuestros paquetes</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pd-0">
            <div class="section-padding">
                <div class="content grid-container">
                    <div class="filters-container">
                        <input type="text" id="search" class="media-boxes-search" placeholder="Buscar destino">
                        <div class="media-boxes-drop-down">
                            <div class="media-boxes-drop-down-header">
                            </div>
                            <ul class="media-boxes-drop-down-menu filters" data-id="third-filter">
                              <li><a class="selected" href="#" data-filter="*">Destino</a></li>
                              <li><a href="#" data-filter=".destino-1">America</a></li>
                              <li><a href="#" data-filter=".destino-2">Europa</a></li>
                            </ul>
                        </div>
                        <div class="media-boxes-drop-down">
                            <div class="media-boxes-drop-down-header">
                            </div>
                            <ul class="media-boxes-drop-down-menu filters" data-id="second-filter">
                              <li><a class="selected" href="#" data-filter="*">País</a></li>
                              <li><a href="#" data-filter=".pais-1">Argentina</a></li>
                              <li><a href="#" data-filter=".pais-2">USA</a></li>
                              <li><a href="#" data-filter=".pais-3">Brasil</a></li>
                            </ul>
                        </div>
                        <div class="media-boxes-drop-down">
                            <div class="media-boxes-drop-down-header">
                            </div>
                            <ul class="media-boxes-drop-down-menu filters" data-id="first-filter">
                              <li><a class="selected" href="#" data-filter="*">Tipo</a></li>
                              <li><a href="#" data-filter=".tipo-1">Playa</a></li>
                              <li><a href="#" data-filter=".tipo-2">Aventura</a></li>
                              <li><a href="#" data-filter=".tipo-4">Tour</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="grid">  
                        <div class="media-box pais-1 tipo-2 destino-1">
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
                        </div>
                        <div class="media-box pais-2 tipo-4 destino-1">
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
                        </div>  
                        <div class="media-box tipo-1 destino-1">
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
                        <div class="media-box pais-1 tipo-2 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/4.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Rally Córdoba</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde U$D 611</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-box tipo-2 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/5.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Lima & Cusco</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde U$D 1.352</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="media-box tipo-1 pais-3 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/6.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Guaratuba</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde Gs. 1.950.000</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="media-box tipo-1 pais-3 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/7.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Florianópolis</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde Gs. 3.095.000</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-box tipo-1 pais-3 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/8.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Camboriú Semana Santa</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde Gs. 2.460.000</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="media-box tipo-4 pais-2 destino-1">
                            <div class="pack-boxes">
                                <div class="pack-container">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/9.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Miami</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde U$D 775</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="media-box destino-2 tipo-4">
                            <div class="pack-boxes">
                                <div class="pack-container destino-2">
                                    <div class="bg-overlay"></div>
                                    <div class="pack-img" style="background-image: url(images/destinos/destacados/10.jpg);"></div>
                                    <div class="pack-title">
                                        <h3>Europa</h3>
                                        <div class="boxes-button"><a href="#" class="btn">Desde U$D 1.890</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	    <footer id="footer">
	        <?php include_once 'screens/sections/footer.php';?>
	    </footer>
        
	    <?php include_once 'screens/sections/scripts.php';?>

        <script src="js/filter/jquery.isotope.min.js"></script>
        <script src="js/filter/jquery.imagesLoaded.min.js"></script>
        <script src="js/filter/waypoints.min.js"></script>
        <script src="js/filter/modernizr.custom.min.js"></script>
        <script src="js/filter/jquery.mediaBoxes.dropdown.js"></script>
        <script src="js/filter/jquery.mediaBoxes.js"></script>
        <script>

            $('#grid').mediaBoxes({
                filterContainer: '.filters',
                search: '#search',
                boxesToLoadStart: 20,
                columns: 5,
                searchTarget: '.thumbnail-overlay',
            }); 

        </script>

    </body>
</html>