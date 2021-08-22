<?php
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location: ../home.php");
    exit;
}
require_once '../components/db_connect.php';

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
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Adoption Agency | Admin</title>
        <link rel="stylesheet" href="../style/style.css">

        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
    <?php require_once '../components/navigation3.php'?>

    <fieldset>
             <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"  placeholder="Animal Picture" ></td>
                    </tr> 
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Animal Name" value="<?php echo $name ?>" ></td>
                    </tr>    
                    <tr>
                        <th>Address</th>
                        <td><input class='form-control' type="text" name= "petaddress" placeholder="Address" value ="<?php echo $petaddress ?>" ></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="description" placeholder="description" value ="<?php echo $description ?>"></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td>
                            <select class='form-select' aria-label="Default select example" name="size" >
                            <option selected><?php echo $size ?></option>
                            <option value="small">Small</option>
                            <option value="large">Large</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="text" name="age" value ="<?php echo $age ?>" ></td>
                    </tr>
                    <tr>
                        <th>Hobbies</th>
                        <td><input class='form-control' type="text" name="hobbies" value ="<?php echo $hobbies ?>" ></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name="breed" value ="<?php echo $breed ?>" ></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select class='form-select' aria-label="Default select example" name="status" > 
                            <option selected><?php echo $status ?></option> 
                            <option value="available">Available</option>
                            <option value="unavaliable">Unavaliable</option>
                        </td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "animal_id" value= "<?php echo $data['animal_id'] ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>