<?php

$target_dir = isset($file_upload_dir) ? $file_upload_dir : "image/temp/";

$upload_files = [];

# 取得上傳檔案數量
$fileCount = count($_FILES['file_upload']['name']);

for ($i = 0; $i < $fileCount; $i++) {

  $uploadOk = 1;
  $file_name = $_FILES['file_upload']['name'][$i];
  $file_type = $_FILES['file_upload']['type'][$i];
  $file_size = ($_FILES['file_upload']['size'][$i] / 1024);
  $temp_file = $_FILES['file_upload']['tmp_name'][$i];
  $target_file = $target_dir . basename($file_name);
  $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  # 檢查檔案是否上傳成功
  if ($_FILES['file_upload']['error'][$i] === UPLOAD_ERR_OK) {
    echo '檔案名稱: ' . $file_name . '<br/>';
    echo '檔案類型: ' . $file_type . '<br/>';
    echo '檔案大小: ' . $file_size . ' KB<br/>';
    echo '暫存名稱: ' . $temp_file . '<br/>';
    echo 'target_file: ' . $target_file . '<br/>';
    echo 'ext: ' . $ext . '<br/>';

    // Check file size
    if (  $file_size > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if ($ext != "jpg") {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    // if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }

    // rename
    $file_name = isset($file_upload_name) ? $file_upload_name.'.'.$ext : $file_name;
    $target_file = $target_dir . basename($file_name);

    # 檢查檔案是否已經存在
    if (file_exists($target_dir . $file_name)) {
      // 刪掉已存在的
      unlink($target_dir . $file_name);

      // 或是重新取名
      // $rawBaseName = pathinfo($file_name, PATHINFO_FILENAME );
      // $counter = 0;
      // while(file_exists($target_dir . $file_name)) {
      //   $file_name = $rawBaseName . $counter . '.' . $ext;
      //   $counter++;
      // };
      // $target_file = $target_dir . basename($file_name);
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      # 將檔案移至指定位置
      move_uploaded_file($temp_file, $target_file);

      # 記下已上傳的檔案資料與位置
      // $upload_files[$i]['target_dir'] = $target_dir;
      // $upload_files[$i]['target_file'] = $target_file;
      // $upload_files[$i]['file_name'] = $file_name;
    }
    // var_dump($upload_files);
  } else {
    echo '錯誤代碼：' . $_FILES['file_upload']['error'] . '<br/>';
  }
}

?>