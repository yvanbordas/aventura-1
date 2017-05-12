<?php
	use net\hdssolutions\php\dbo\DB;

	try {
		// verificamos si estan todos los datos
		if (!isset($_POST['title']) 		|| strlen($_POST['title']) == 0 ||
			!isset($_POST['continent']) 	|| strlen($_POST['continent']) == 0 ||
			!isset($_POST['country_city']) 	|| strlen($_POST['country_city']) == 0 ||
			!isset($_POST['price']) 		|| strlen($_POST['price']) == 0 ||
			!isset($_POST['international']) || strlen($_POST['international']) == 0 ||
			!isset($_POST['background'])	|| strlen($_POST['background']) == 0 ||
			!isset($_POST['thumbnail'])		|| strlen($_POST['thumbnail']) == 0 ||
			!isset($_POST['details'])		|| strlen($_POST['details']) == 0 ||
			!isset($_POST['important'])		|| strlen($_POST['important']) == 0)
			throw new Exception('Por favor, complete todos los datos');
		// guardamos el paquete
		if (isset($_POST['package']) && $_POST['package'] !== null) {
			$pstmt = DB::getConnection()->prepare('UPDATE c2_package SET package_title = :title, package_continent = :continent, package_country_city = :country_city, package_price = :price, package_international = :international, package_background = :background, package_thumbnail = :thumbnail, package_details = :details, package_important = :important WHERE package_id = :package');
			$pstmt->bindValue(':package', $_POST['package']);
		} else
			$pstmt = DB::getConnection()->prepare('INSERT INTO c2_package VALUES (NULL, :title, :continent, :country_city, :price, :international, :background, :thumbnail, :details, :important, NOW(), NOW(), TRUE)');
		$pstmt->bindValue(':title', $_POST['title']);
		$pstmt->bindValue(':continent', $_POST['continent']);
		$pstmt->bindValue(':country_city', $_POST['country_city']);
		$pstmt->bindValue(':price', $_POST['price']);
		$pstmt->bindValue(':international', $_POST['international']);
		$pstmt->bindValue(':background', $_POST['background']);
		$pstmt->bindValue(':thumbnail', $_POST['thumbnail']);
		$pstmt->bindValue(':details', $_POST['details']);
		$pstmt->bindValue(':important', $_POST['important']);
		$pstmt->execute();

		$package_id = isset($_POST['package']) && $_POST['package'] !== null ? $_POST['package'] : DB::getConnection()->lastInsertId();

		// eliminamos las categorias actuales
		$pstmt = DB::getConnection()->prepare('DELETE FROM c2_package_categories WHERE category_package = :package');
		$pstmt->bindValue(':package', $package_id);
		$pstmt->execute();

		// recorremos las categorias
		foreach ($_POST['categories'] AS $category) {
			// agregamos la categoria
			$pstmt = DB::getConnection()->prepare('INSERT INTO c2_package_categories VALUES (NULL, :package, :name)');
			$pstmt->bindValue(':package', $package_id);
			$pstmt->bindValue(':name', $category);
			$pstmt->execute();
		}

		// eliminamos la tabla actual
		$pstmt = DB::getConnection()->prepare('DELETE FROM c2_package_prices WHERE price_package = :package');
		$pstmt->bindValue(':package', $package_id);
		$pstmt->execute();

		// recorremos las tablas de precios
		foreach ($_POST['prices'] AS $tkey => $table) {
			// guardamos la tabla de precios
			foreach ($table AS $rkey => $row) {
				foreach ($row AS $ckey => $content) {
					// agregamos el valor de la tabla
					$pstmt = DB::getConnection()->prepare('INSERT INTO c2_package_prices VALUES (:table, :row, :col, :package, :content)');
					$pstmt->bindValue(':package', $package_id);
					$pstmt->bindValue(':table', $tkey);
					$pstmt->bindValue(':row', $rkey);
					$pstmt->bindValue(':col', $ckey);
					$pstmt->bindValue(':content', $content);
					$pstmt->execute();
				}
			}
		}

		echo json_encode(Array('success' => true, 'package' => $package_id));
	} catch (Exception $e) {
		echo json_encode(Array('success' => false, 'message' => $e->getMessage()));
	}