<?php


if(isset($_POST['submit'])){
    exec('deletefile.php');
    $file = $_FILES['file'];
    $counter =2;
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed =array('jpg', 'jpeg', 'png', 'pdf', 'txt');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ".$fileDestination);
                    echo "Your link isÉ $fileDestination \n";
                }else{
                    echo "Your file is too big";

                }
        }else{
            echo "There was en error during the upload";


        }
    }else{
        echo "you cannot upload the file";

    }

}
