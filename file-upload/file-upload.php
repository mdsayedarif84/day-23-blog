<?php
$link       =   mysqli_connect('localhost','root','','image_upload');


if (isset($_POST['btn'])){
    $fileName   =   $_FILES['img_file']['name'];
    $directory  =   "images/";
    $imageUrl   =   $directory.$fileName;
    $filetype   =   pathinfo($fileName,PATHINFO_EXTENSION);
    $check      =   getimagesize($_FILES['img_file']['tmp_name']);
    if ($check){
        if (file_exists($imageUrl)){
            die('This image already exist.Please select another image');
        }else{
            if ($_FILES['img_file']['size']>500000){
                die('Your image file is too large.Please select the 10kb image');
            }else{
                if ($filetype != 'jpg' && $filetype != 'JPG' && $filetype != 'png'){
                    die('Image type is not supported.please insert jpg or png');
                }else{
                    move_uploaded_file($_FILES['img_file']['tmp_name'],$imageUrl);
                    $sql        =   "INSERT INTO images(img_file) VALUES ('$imageUrl')";
                    mysqli_query($link,$sql);
                    echo 'image Upload & Save Successfully';
                }
            }
        }
    }else{
        die('Please choose a image file');
    }
}



?>

<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Select File</th>
            <td>
                <input type="file" name="img_file">
            </td>
        </tr>
        <tr>
            <th> </th>
            <td>
                <input type="submit" name="btn" value="Submit">
            </td>
        </tr>
    </table>
</form>
<hr>
<?php

    $sql        =   "SELECT *FROM  images ";
    $queryResult=   mysqli_query($link,$sql);
?>
<table>
    <?php while ($image=mysqli_fetch_assoc($queryResult)) {?>
    <tr>
        <img src=" <?php echo $image['img_file'] ?>" alt="fs" height="250" width="300"
    </tr>
    <?php } ?>
</table>