<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value= "Upload" />
</form>

<?php
if (isset($_POST["up"]) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "upload lỗi rồi";

    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/ ' . $_FILES['fileUpload']['name']);
        echo "upload thành công <br/> ";
        echo "đường dẫn:  upload/ " . $_FILES['fileUpload']['name'];
        echo "loại file: " . $_FILES['fileUpload']['type'];
        echo "dung lượng: " . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';

    }
}
?>
</body>
</html>


