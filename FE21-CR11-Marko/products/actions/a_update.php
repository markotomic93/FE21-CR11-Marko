<?php
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location: ../../home.php");
    exit;
}
require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

if ($_POST) { 
        $animal_id = $_POST['animal_id'];
        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $petaddress = $_POST['petaddress'];
        $description = $_POST['description'];
        $size = $_POST['size'];
        $age = $_POST['age'];
        $hobbies = $_POST['hobbies'];
        $breed = $_POST['breed'];
        $status = $_POST['status'];


    //variable for upload pictures errors is initialized
    $uploadError = '';

    $picture = file_upload($_FILES['picture'], 'products');//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="product.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE animals SET name = '$name', picture = '$picture->fileName', petaddress = '$petaddress', description = '$description', size = '$size', age = '$age', hobbies = '$hobbies', breed = '$breed', status = '$status' WHERE animal_id = {$animal_id}";
    }else{
        $sql = "UPDATE animals SET name = '$name', petaddress = '$petaddress', description = '$description', size = '$size', age = '$age', hobbies = '$hobbies', breed = '$breed', status = '$status' WHERE animal_id = {$animal_id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);    
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?animal_id=<?= $animal_id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>