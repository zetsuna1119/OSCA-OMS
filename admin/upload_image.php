<?php
if ($_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
  $new_image = $_FILES['new_image']['name'];
  $extension = substr($new_image, strlen($new_image)-4, strlen($new_image));
  $allowed_extensions = array(".jpg","jpeg",".png",".gif");
  if (!in_array($extension, $allowed_extensions)) {
    $response = array('success' => false, 'message' => 'Invalid file format. Only jpg / jpeg / png / gif format allowed');
  } else {
    $new_image = md5($new_image) . time() . $extension;
    move_uploaded_file($_FILES['new_image']['tmp_name'], "images/" . $new_image);
    $update_sql = "UPDATE tblsenior SET Image=:new_image WHERE Image=:image";
    $update_query = $dbh->prepare($update_sql);
    $update_query->bindParam(':new_image', $new_image, PDO::PARAM_STR);
    $update_query->bindParam(':image', $image, PDO::PARAM_STR);
    $update_query->execute();
    $response = array('success' => true, 'new_image' => $new_image);
  }
} else {
  $response = array('success' => false, 'message' => 'Error uploading file');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
