<?php
    function checkSession($level){
        session_start();
    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: $levelindex.php");
        exit;
    }
    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
        exit;
    }
    }
    session_start();
    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../index.php");
        exit;
    }
    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
        exit;
    }

    require_once "../components/db_connect.php";

    $sql = "SELECT * from animals";
    $result = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $animals = "";
    foreach($rows as $row){
        $animals .= "<option value='".$row["animal_id"]."'>".$row["name"]."</option>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <link rel="stylesheet" href="style/style.css">
        <title>Pet Adoption Agency | Admin</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
    <?php require_once '../components/navigation3.php'?>

        <fieldset class="fieldset">
            <legend class='h2'>Add Animal</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"  placeholder="Animal Picture" ></td>
                    </tr> 
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Animal Name" ></td>
                    </tr>    
                    <tr>
                        <th>Address</th>
                        <td><input class='form-control' type="text" name= "petaddress" placeholder="Address" ></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="description" placeholder="description"></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><select class='form-select' aria-label="Default select example" name="size">
                            <option value="" disabled selected hidden>Choose size of your Pet</option>
                            <option value="small">Small</option>
                            <option value="large">Large</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="text" placeholder="age" name="age" ></td>
                    </tr>
                    <tr>
                        <th>Hobbies</th>
                        <td><input class='form-control' type="text" placeholder="hobbies" name="hobbies" ></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" placeholder="breed" name="breed" ></td>
                    </tr>
                   
                    <tr>
                        <th>Status</th>
                        <td><select class='form-select' aria-label="Default select example" name="status" >
                            <option value="" disabled selected hidden>Choose status:</option>
                            <option value="available">Available</option>
                            <option value="unavaliable">Unavaliable</option>

                        </td>
                    </tr>

                    <tr>
                        <td><button class='btn btn-success' type="submit">Add the Animal</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <footer>
        <?php include_once '../components/footer.php';?>
    </footer> 
    </body>
</html>