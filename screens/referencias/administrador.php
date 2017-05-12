<?php
	use net\hdssolutions\php\dbo\DB;

	if (!isset($_SESSION['uid'])) exit(header('location:.'));

	if (isset($_GET['pid'])) {
		$pstmt = DB::getConnection()->prepare('SELECT * FROM c2_package WHERE package_id = :package');
		$pstmt->bindValue(':package', $_GET['pid']);
		$pstmt->execute();

		$package = $pstmt->fetch(PDO::FETCH_OBJ);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Comdetur Agencia de Viajes | Administrador</title>
	    <?php include_once 'screens/sections/header.php'; ?>
    </head>
    <body>
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
	    <section id="empresas" class="trigger-nav pd-0">
	        <div id="frame">
	            <div class="content-frame">
	                <div class="article">
	                    <div class="header">
	                        <div class="categories-overlay"></div>
	                        <div class="content-img" id="background-img"<?php echo isset($package) ? ' background="' . $package->package_background . '"' : ''; ?>></div>
	                        <div class="content-header">
                                <input type="file" accept="image/*" class="hidden" id="upload-img"/>
                                <div class="more-link">
                                    <div class="bt-style">
                                        <a href="#" id="background-upload"><span data-hover="Imagen">Imagen</span></a>
                                    </div>
                                </div>
	                            <h1>Empresas</h1>
	                        </div>
	                    </div>
	                    <div class="article-section">
	                        <div class="article-content">
	                            <div class="article-title bc-2">
	                                <h3>Crear / Modificar paquete</h3>
	                            </div>
	                            <div class="article-text">
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <input type="text" placeholder="Titulo del paquete" class="form-control" id="title"<?php echo isset($package) ? ' value="'.$package->package_title.'"' : ''; ?>/>
	                                    </div>
	                                    <div class="form-group">
	                                        <input type="text" placeholder="Ciudad, Pais" class="form-control" id="country-city"<?php echo isset($package) ? ' value="'.$package->package_country_city.'"' : ''; ?>/>
	                                    </div>
	                                    <div class="form-group">
                                            <input type="checkbox" id="international" placeholder="Internacional o Nacional" class="form-control hidden"<?php echo isset($package) && $package->package_international ? ' checked="checked"' : ''; ?>/>
                                            <label for="international" class="form-control"><span class="nac">Nacional</span><span class="int">Internacional</span></label>
	                                    </div>
                                        <div class="categories-wrapper">
                                            <?php
                                            	// obtenemos las categorias
                                            	$pstmt = DB::getConnection()->prepare('SELECT * FROM c2_package_categories WHERE category_package = :package');
                                            	$pstmt->bindValue(':package', $_GET['pid']);
                                            	$pstmt->execute();

                                            	while (($category = $pstmt->fetch(PDO::FETCH_OBJ)) !== false)
                                            		echo '<div class="form-group"><input type="text" placeholder="Categoria" class="form-control" value="'.$category->category_name.'"/></div>';
                                            ?>
                                            <div class="form-group">
                                                <input type="text" placeholder="Categoria" class="form-control"/>
                                            </div>
                                        </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <input type="text" placeholder="América, Europa, África, Asia u Oceanía" class="form-control" id="continent"<?php echo isset($package) ? 'value="'.$package->package_continent.'"' : ''; ?>/>
	                                    </div>
	                                    <div class="form-group">
	                                        <input type="text" placeholder="Precio desde" class="form-control" id="price"<?php echo isset($package) ? 'value="'.$package->package_price.'"' : ''; ?>/>
	                                    </div>
	                                    <div class="form-group">
	                                        <input type="checkbox" id="important" placeholder="Destacado" class="form-control hidden"<?php echo isset($package) && $package->package_important ? ' checked="checked"' : ''; ?>/>
                                            <label for="important" class="form-control">Destacado</label>
	                                    </div>
	                                </div>
	                            </div>
                                <div class="article-text">
                                    <div class="thumbnail-img" id="thumbnail-img"<?php echo isset($package) ? ' thumbnail="' . $package->package_thumbnail . '"' : ''; ?>></div>
                                </div>
                                <div class="article-text">
                                    <div class="redactor-editor" id="details"><?php echo isset($package) ? $package->package_details : ''; ?></div>
                                </div>
                                <div class="article-text">
	                                <div class="prices-table-wrapper">
                                        <div class="form-group">
                                            <div class="bt-style">
                                                <?php
                                                	// obtenemos las tablas de precios
                                                	$pstmt = DB::getConnection()->prepare('SELECT * FROM c2_package_prices WHERE price_package = :package ORDER BY price_table, price_row, price_col');
                                                	$pstmt->bindValue(':package', $_GET['pid']);
                                            		$pstmt->execute();

                                            		$table = Array();
                                            		$lastTable = null;
                                            		$row = Array();
                                            		$lastRow = null;
                                            		while (($data = $pstmt->fetch(PDO::FETCH_OBJ)) !== false) {
                                            			// verificamos si cambiamos de tabla
                                            			if ($lastTable != $data->price_table) {
                                            				// verificamos si no es la primera
                                            				if ($lastTable !== null)
                                            					// mostramos los datos de la tabla
                                            					echo '<div class="form-group"><textarea class="form-control hidden prices-table">' . json_encode($table) . '</textarea><div class="bt-style"><a href="#" id="delete" table="' . $lastTable . '"><span data-hover="Eliminar">Eliminar</span></a></div></div>';
                                            				// almacenamos el ID de la nueva tabla y reiniciamos la fila
                                            				$lastTable = $data->price_table;
                                            				$lastRow = $data->price_row;
                                            				// vaciamos los arrays
                                            				$table = Array();
                                            				$row = Array();
                                            			}
                                            			// verificamos si cambiamos de fila
                                            			if ($lastRow != $data->price_row) {
                                            				// verificamos si no es la primera
                                            				if ($lastRow !== null)
                                            					// agregamos la fila a la tabla
                                            					$table[] = $row;
                                            				// almacenamos el ID de la nueva fila
                                            				$lastRow = $data->price_row;
                                            				// vaciamos el array
                                            				$row = Array();
                                            			}
                                            			// agregamos la columna en la fila
                                            			$row[] = $data->price_content;
                                            		}
                                                ?>
                                                <a href="#" id="add-table"><span data-hover="Agregar Tabla de Precios">Agregar Tabla de Precios</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	                            <div class="article-text">
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <div class="bt-style">
	                                            <a href="#" id="save"><span data-hover="Guardar">Guardar</span></a>
                                                <a href="#" id="delete"><span data-hover="Eliminar">Eliminar</span></a>
                                            </div>
                                        </div>
	                                </div>
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