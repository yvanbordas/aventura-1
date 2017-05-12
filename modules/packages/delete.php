<?php
	use net\hdssolutions\php\dbo\DB;

	try {
		// eliminamos las categorias
		$pstmt = DB::getConnection()->prepare('DELETE FROM c2_package_categories WHERE category_package = :package');
		$pstmt->bindValue(':package', $package_id);
		$pstmt->execute();

		// eliminamos los precios
		$pstmt = DB::getConnection()->prepare('DELETE FROM c2_package_prices WHERE price_package = :package');
		$pstmt->bindValue(':package', $package_id);
		$pstmt->execute();

		// eliminamos el paquete
		$pstmt = DB::getConnection()->prepare('DELETE FROM c2_package WHERE package_id = :package');
		$pstmt->bindValue(':package', $package_id);
		$pstmt->execute();

		echo json_encode(Array('success' => true));
	} catch (Exception $e) {
		echo json_encode(Array('success' => false, 'message' => $e->getMessage()));
	}