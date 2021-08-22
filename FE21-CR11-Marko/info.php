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

if ($_GET['animal_id']) {
    $animal_id = $_GET['animal_id'];
    $sql = "SELECT * FROM animals WHERE animal_id = {$animal_id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $animal_id = $data['animal_id'];
        $name = $data['name'];
        $picture = $data['picture'];
        $petaddress = $data['petaddress'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $hobbies = $data['hobbies'];
        $breed = $data['breed'];
        $status = $data['status'];
        
    } else {
        header("location: animals/error.php");
    }
    mysqli_close($connect);
} else {
    header("location: animals/error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Adoption Agency</title>
<link rel="stylesheet" href="style/info.css">
<?php require_once 'components/boot.php'?>
</head>
<body>
<?php require_once 'components/navigation1.php'?>
<div class="container d-flex justify-content-center">
           <div class="card w-75 shadow m-4 text-center" >
           <div class="card-body mt-3 ">
           <h5 class="card-title fw-bolder fs-2">Adopt <?php echo $name ?></h5>
           <p class="card-text fs-4"><?php echo $description ?></p>
           </div>
           <img src="products/pictures/<?= $picture;?>" class="card-img-top mt-4" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="card-text">Address: <?php echo $petaddress ?></p></li>
                    <li class="list-group-item"><p class="card-text">Size: <?php echo $size ?></p></li>
                    <li class="list-group-item">
                        <p class="card-text">Age:<?php echo $age ?></p></li>
                    <li class="list-group-item"><p class="card-text">Hobbies: <?= $hobbies?> </p></li>
                    <li class="list-group-item"><p class="card-text">Breed: <?= $breed?> </p></li>
                    <li class="list-group-item"><p class="card-text">Available: <?= $status;?></p></li>
                </ul>
                <div class="card-body d-flex justify-content-evenly">
                    <a href="index.php" ><button class= 'btn btn-primary' type= "button"><i class="fas fa-reply"></i> Choose another Pet</button></a>
                    <a href="adopt.php?animal_id=<?php echo $animal_id ?>"><button class='btn btn-success' type='button' title='Adopt Pet'><i class='fas fa-hand-holding-heart'></i> Adopt me</button><a>
                </div>
       </div>
       </div>
       <footer>
        <?php include_once 'components/footer.php';?>
    </footer> 
</body>
</html>