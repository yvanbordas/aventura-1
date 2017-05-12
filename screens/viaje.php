<!DOCTYPE html>
<html>
	<head>
		<title>Comdetur Agencia de Viajes | Tu viaje</title>
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
	        <div class="logo">
	            <a href="."><img src="images/logo.png" alt="" class="logo-light"><img src="images/logo-1.png" alt="" class="logo-dark"></a>
	        </div>
	        <nav>
	            <div class="button">
	                <a class="btn-open" href="#"><span>Menú</span></a>
	            </div>
	        </nav>
	        <?php include_once 'screens/sections/menu.php'; ?>
	    </header>
	    <section id="viaje" class="trigger-nav pd-0">
	        <div id="frame">
	            <div class="content-frame">
	                <div class="article">
	                    <div class="header">
	                        <div class="categories-overlay"></div>
	                        <div class="content-img" style="background-image: url(images/internas/viaje.jpg)"></div>
	                        <div class="content-header">
	                            <h1>Armá tu viaje</h1>
	                        </div>
	                    </div>
	                    <div class="article-section fs-form-wrap" id="fs-form-wrap">
	                        <div class="article-content">
	                            <div class="article-title bc-6">
	                                <h3>Completa los siguientes pasos y armá tu viaje</h3>
	                            </div>
	                            <form id="myform" class="fs-form fs-form-full" autocomplete="off" generic="true" action="viaje" to="dasrob@gmail.com" subject="HOALLLL">
	                                <ol class="fs-fields">
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="fullname">Tu nombre y apellido</label>
                                            <input class="fs-anim-lower" id="fullname" name="fullname" type="text" placeholder="Nombre Apellido" required />
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="email">Tu email</label>
                                            <input class="fs-anim-lower" id="email" name="email" type="email" placeholder="nombre@gmail.com" required />
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="persons">Cantidad de personas</label>
                                            <input class="fs-anim-lower" id="persons" name="persons" type="number" placeholder="Número de personas" required />
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="date_out">Fecha de salida</label>
                                            <input class="fs-anim-lower" id="date_out" name="date_out" type="text" placeholder="Salida" class="form-control" data-pmu-format="d/m/Y" required />
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="date_in">Fecha de retorno</label>
                                            <input class="fs-anim-lower" id="date_in" name="date_in" type="text" placeholder="Retorno" class="form-control" data-pmu-format="d/m/Y" required />
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="budget">Tu presupuesto</label>
                                            <input class="fs-mark fs-anim-lower" id="budget" name="budget" type="number" placeholder="U$D 1000" step="100" min="100" />
                                        </li>
	                                    <li data-input-trigger>
                                            <label class="fs-field-label fs-anim-upper" for="where">¿Dónde queres ir?</label>
	                                        <div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
	                                            <span>
                                                    <input id="q3a" name="where" type="radio" value="playa" />
                                                    <label for="q3a" class="radio-playa"><img src="images/viaje/playa.jpg"/>Playa</label>
	                                            </span>
                                                <span>
                                                    <input id="q3b" name="where" type="radio" value="crucero" />
                                                    <label for="q3b" class="radio-crucero"><img src="images/viaje/crucero.jpg"/>Crucero</label>
	                                            </span>
                                                <span>
                                                    <input id="q3c" name="where" type="radio" value="luna-de-miel" />
                                                    <label for="q3c" class="radio-luna-de-miel"><img src="images/viaje/luna-de-miel.jpg"/>Luna de miel</label>
	                                            </span>
                                                <span>
                                                    <input id="q3d" name="where" type="radio" value="deportes" />
                                                    <label for="q3d" class="radio-deportes"><img src="images/viaje/deportes.jpg"/>Deportes</label>
	                                            </span>
                                                <span>
                                                    <input id="q3e" name="where" type="radio" value="europa" />
                                                    <label for="q3e" class="radio-europa"><img src="images/viaje/europa.jpg"/>Europa</label>
	                                            </span>
                                                <span>
                                                    <input id="q3f" name="where" type="radio" value="parque" />
                                                    <label for="q3f" class="radio-parque"><img src="images/viaje/parque.jpg"/>Parque</label>
	                                            </span>
                                                <span>
                                                    <input id="q3g" name="where" type="radio" value="otros" />
                                                    <label for="q3g" class="radio-otros"><img src="images/viaje/otros.jpg"/>Otros</label>
	                                            </span>
	                                        </div>
                                        </li>
	                                    <li>
                                            <label class="fs-field-label fs-anim-upper" for="message">Escribinos tu comentarios de lo que estás buscando</label>
                                            <textarea class="fs-anim-lower" id="message" name="message" placeholder="Mensaje"></textarea>
                                        </li>
	                                </ol>
	                                <div class="bt-style">
	                                    <a href="#" class="fs-submit" type="submit"><span data-hover="Enviar">Enviar</span></a>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
        <?php include_once 'screens/sections/footer.php'?>
  </body>
</html>