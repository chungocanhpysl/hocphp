<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    Chọn file<input type="file" name="file[]" multiple>
    <input type="submit" name="up" value= "Upload" />
</form>
<?php
if (isset($_POST['up'])) {
    $j = 0;

    $target_path = "upload/";
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

        $validextensions = array("jpeg", "jpg", "png", "gif");
        $ext = explode('.', basename($_FILES['file']['name'][$i]));
        $file_extension = end($ext);

        $target_path = $target_path . md5(uniqid()) .
            "." . $ext[count($ext) - 1];
        $j = $j + 1;

        if (($_FILES["file"]["size"][$i] < 100000)
            && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                echo $j .
                    ').<span id="noerror">Upload ảnh thành công</span><br/><br/>';
            } else {
                echo $j .
                    ').<span id="error">Vui lòng thử lại</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j .
                ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
    ?>

</body>
</html>