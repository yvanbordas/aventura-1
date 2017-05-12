<?php
	use net\hdssolutions\php\dbo\DB;

	try {
		$pstmt = DB::getConnection()->prepare('SELECT * FROM c2_continent WHERE continent LIKE :filter');
		$pstmt->bindValue(':filter', '%' . $_REQUEST['term'] . '%');
		$pstmt->execute();

		$options = Array();
		while (($option = $pstmt->fetch(PDO::FETCH_OBJ)) !== false)
			$options[] = $option->continent;

		echo json_encode($options);
	} catch (Exception $e) {
		echo json_encode(Array('success' => false, 'message' => $e->getMessage()));
	}