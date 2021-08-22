<?php
session_start();
require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM user WHERE status != '$status'";
$result = mysqli_query($connect, $sql);

//this variable will hold the body for the table
$tbody = ''; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['useraddress'] . "</td>
            <td>" . $row['email'] . "</td>
            <td><a href='update.php?id=" . $row['user_id'] . "'><button class='btn btn-primary btn-sm' title='Edit User' type='button'><i class='fas fa-user-edit'></i></button></a>
            <a href='delete.php?id=" . $row['user_id'] . "'><button class='btn btn-danger btn-sm' title='Delete User' type='button'><i class='fas fa-user-minus'></i></button></a></td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - DashBoard</title>
    <link rel="stylesheet" href="style/style.css">
    <?php require_once 'components/boot.php'?>
    <style type="text/css">           
        .userImage{
          width: 100px;
        height: auto;
            }
    </style>
</head>
<body>
<?php require_once 'components/navigation2.php'?>

<div class="container d-flex justify-content-center">
    <div class="row">
        <img class="userImage" src="pictures/admavatar.png" alt="Adm avatar">
        <p class="">Administrator</p> 
        <div class="mt-5">
        <p class='h3'>All our Users:</p>
        <table class='table table-striped'>
            <thead class='table-primary'>
                <tr>
                    <th>Picture</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?=$tbody?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<footer>
        <?php include_once 'components/footer.php';?>
    </footer> 
</body>
</html>