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




// select logged-in user details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE user_id=" . $_SESSION['user']);
$row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);

if(isset($_GET['Senior'])){
    $sql = "SELECT * FROM animals where age >= 8 ";
}else{
    $sql = "SELECT * FROM animals";
}


$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
        $tbody .= "<tr>
            <td><img src='products/pictures/".$row['picture']."' class='card-img-top' alt='...'></td> 
              <td>" .$row['name']."</td>
              <td>" .$row['petaddress']."</td>
              <td>" .$row['description']."</td>            
              <td>" .$row['age']."</td>         
              <td>" .$row['breed']."</td>             
              <td>" .$row['status']."</td>
              <td> 
                <a href='info.php?animal_id=" .$row['animal_id']."'><button class='btn btn-success' type='button' title='Adopt Pet'><i class='fas fa-hand-holding-heart'></i> Adopt <br> me</button></a>
              </td>           
        </tr>   
      ";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}



mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome - <?php echo $row1['first_name']; ?></title>
<link rel="stylesheet" href="style/style.css">
<?php require_once 'components/boot.php'?>
</head>
<body>
<?php require_once 'components/navigation1.php'?>

    <div class="container text-center ">
    <h4 class="title mb-3" > Please take a look at our lovley Animals waiting the for kind person to give them home</h4>
    <div class="d-flex justify-content-start mt-4 mb-3">
     <a href="home.php"  class="btn btn-outline-secondary btn-sm ">Show all pets </a>
     <a href="home.php?Senior='Senior'" class="btn btn-outline-secondary btn-sm"  role="button">Show only senior pets </a>
     </div>
     <div class="container">
            <table class='table table-striped'>
                <thead class='table-style table-primary'>
                    <tr>
                        <th>Picture</th>     
                        <th>Name</th>                                    
                        <th>Address</th>
                        <th>Description</th>
                        <th>Age</th>
                        <th>Breed</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?>
                </tbody>
            </table>
            </div>
         </div>
         <footer>
        <?php include_once 'components/footer.php';?>
    </footer> 
</body>
</html>