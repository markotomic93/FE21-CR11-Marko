<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user'];
$animal_id = $_GET['animal_id'];

$sql = "INSERT INTO adoption (user_id, animal_id) VALUES   ('$user_id', '$animal_id')";
$sql2 = "UPDATE animals SET status = 'unavailable' WHERE animal_id = {$animal_id}";

if (mysqli_query($connect, $sql) === true) {     
    $class = "alert alert-success";
    $message = "The record was successfully updated";
    // header("refresh:1;url=update.php?id={$id}");

    if (mysqli_query($connect, $sql2) === true) {     
        $class = "alert alert-success";
        $message = "Congrtatulations your new pet will make you happy";
        header("refresh:3;url=info.php?animal_id={$animal_id}");
    } else {
        $class = "alert alert-danger";
        $message = "Error while adopting the pet : <br>" . $connect->error;
        // header("refresh:1;url=update.php?id={$id}");
    }

} else {
    $class = "alert alert-danger";
    $message = "Error while updating record : <br>" . $connect->error;
    // header("refresh:1;url=update.php?id={$id}");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adoption</title>
        <?php require_once 'components/boot.php'?>    

    </head>
    <body>
    <?php require_once 'components/navigation.php'?>

        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Successfully adopted</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>
