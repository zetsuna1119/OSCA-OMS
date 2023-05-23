<?php
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
  $allowed = array('jpg', 'jpeg', 'png', 'gif');
  $filename = $_FILES['image']['name'];
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

  // Check if file type is valid
  if (in_array($file_ext, $allowed)) {
      // Create new unique file name
      $new_filename = md5(uniqid()) . '.' . $file_ext;

      // Set file directory path
      $target_dir = 'images/';

      // Create directory if it does not exist
      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      // Move uploaded file to target directory
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $new_filename)) {
          // File upload successful
          echo '<script>alert("File uploaded successfully.")</script>';
      } else {
          // File upload failed
          echo '<script>alert("Invalid image format it should be .jpg, .jpeg, .png, .gif")</script>';
      }
  }
}
