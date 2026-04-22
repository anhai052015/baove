<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Có lỗi xảy ra khi tải file lên server!');
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new Exception('Chỉ cho phép tải lên định dạng ảnh (jpg, png, webp...)!');
        }

        $cleanName = str_replace(' ', '-', basename($file["name"]));

        $targetFile = $folder . '/' . time() . '-' . $cleanName;

        if (move_uploaded_file($file["tmp_name"], PATH_ASSETS_UPLOADS . $targetFile)) {
            return $targetFile;
        }

        throw new Exception('Upload file không thành công, vui lòng kiểm tra lại quyền thư mục!');
    }
}
?>