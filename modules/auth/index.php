<?php
    use net\hdssolutions\php\dbo\DB;

    $pstmt = DB::getConnection()->prepare('SELECT LOWER(HEX(user_pass)) AS password, user_id FROM c2_user WHERE user_id = :user');
    $pstmt->bindValue(':user', $_POST['user']);
    try {
        // verificamos si se ejecuto
        if (!$pstmt->execute())
            throw new Exception('Se produjo un error al intentar autenticar. Por favor, vuelva a intentar');
        // verificamos si existe el usuario
        if (($user = $pstmt->fetch(\PDO::FETCH_OBJ)) === false)
            throw new Exception('Usuario y/o contraseña incorrecta.<br/><br/>En un mundo ideal, te diriamos cual de los 2 esta incorrecto.');
        // verificamos si la contraseña es correcta
        if ($user->password !== $_POST['pass'])
            throw new Exception('Usuario y/o contraseña incorrecta.<br/><br/>En un mundo ideal, te diriamos cual de los 2 esta incorrecto.');
        // seteamos los datos de session
        $_SESSION['uid'] = $user->user_id;
        // retornamos true
        echo json_encode(Array('success' => true));
    } catch (Exception $e) {
        echo json_encode(Array('success' => false, 'message' => $e->getMessage()));
    }