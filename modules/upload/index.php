<?php
    include_once 'modules/resizer/index.php';
    // create attached id
    $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $id = strlen($ext) > 0 ? (substr(md5($_FILES['file']['name'] . time()), 0, 32 - strlen($ext) - 1) . '.' . $ext) : md5($_FILES['file']['name'] . time());
    // save attached
    $result = (object)Array(
        'success' => move_uploaded_file($_FILES['file']['tmp_name'], 'modules/upload/cache/' . $id),
        'id'      => $id,
        'name'    => $_FILES['file']['name']
    );
    if ($result->success && in_array($ext, Array('tif', 'tiff'))) {
        try {
        // convert to jpg
        $tiff = new Imagick('modules/upload/cache/' . $id);
        $tiff->setImageFormat('jpg');
        $id = preg_replace('/\.(tiff|tif)/', '.jpg', $id);
        $tiff->writeimage('modules/upload/cache/' . $id);
        // update id
        $result->id = $id;
        } catch (Exception $e) {
            $result->success = false;
            $result->message = $e->getMessage();
        }
    }
    // verificamos si es imagen
    if ($result->success && in_array($ext, Array('gif', 'jpeg', 'jpg', 'png'))) {
        // verificamos si la redimencionamos
        if (isset($_POST['width']) && isset($_POST['height'])) {
            // redimencionamos la imagen
            resize_image('modules/upload/cache/' . $id, 'modules/upload/cache/' . $id, $_POST['width'], $_POST['height']);
            // generamos la miniatura
            resize_image('modules/upload/cache/' . $id, 'modules/upload/cache/thumb_' . $id, 640, ceil(640 / ($_POST['width'] / $_POST['height'])));
            // agregamos el nuevo tamaño
            list($width, $height) = getimagesize('modules/upload/cache/' . $id);
            $result->width = $width;
            $result->height = $height;
        }
    }
    // return result
    header('Content-Type: application/json');
    echo json_encode($result);