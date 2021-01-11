<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    Chọn file<input type="file" name="file" value="">
    <input type="submit" name="up" value= "Upload" />
</form>

<?php

if (isset($_POST["up"]) && isset($_FILES['file'])) {
    if($_FILES["file"]["name"]!=NULL)
    {



        if($_FILES["file"]["type"]=="image/jpeg"
            ||$_FILES["file"]["type"]=="image/png"
            ||$_FILES["file"]["type"]=="image/gif"
            ||$_FILES["file"]["type"]=="image/jpg"
        )
        {
            if($_FILES["file"]["size"]>1048576)
            {
                echo "file quá nặng";
            }


// kiem tra su ton tai cua file
            elseif (file_exists("upload/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"]." file đã tồn tại . ";

            }

            else{
                $path = "upload/";
                $name = $path . basename($_FILES["file"]["name"]);
                $tmp_name = $_FILES['file']['tmp_name'];
                $type = $_FILES['file']['type'];
                $size = $_FILES['file']['size'];


// Upload file
                move_uploaded_file($tmp_name, $name);

                echo "File uploaded! <br />";
                echo "Tên file : ".$name."<br />";
                echo "Kiểu file : ".$type."<br />";
                echo "File size : ".$size;
            }
        }
        else {
            echo "File được chọn không hợp lệ";
        }
    }
    else
    {
        echo "vui lòng chọn file";
    }
}

?>
</body>
</html>


