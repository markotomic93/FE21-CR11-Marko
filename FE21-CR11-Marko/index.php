<?php
session_start();
require_once 'components/db_connect.php';

// it will never let you open index(login) page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
    exit;
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard.php"); // redirects to home.php
}

$error = false;
$email = $password = $emailError = $passError = '';

if (isset($_POST['btn-login'])) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

         $password = hash('sha256', $pass);  //password hashing

        $sql = "SELECT user_id, first_name, password, status FROM user WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $row = $result->fetch_assoc();
        $count = mysqli_num_rows($result);
      
      if ($count == 1 && $row['password'] == $password) {
            if($row['status'] == 'adm'){
            $_SESSION['adm'] = $row['user_id'];           
            header( "Location: dashboard.php");}
            else{
                $_SESSION['user'] = $row['user_id']; 
               header( "Location: home.php");
            }          
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Adoption Agency</title>
<link rel="stylesheet" href="style/style.css">
<?php require_once 'components/boot.php'?>
</head>
<body>
<?php require_once 'components/navigation.php'?>

    <div class="container d-flex justify-content-center mb-5 ">
        <form class="w-40" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Log In:</h2>
            <hr/>
            <?php
            if (isset($errMSG)) {
                echo $errMSG;
            }
            ?>
        
            <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>"  maxlength="40" />
            <span class="text-danger"><?php echo $emailError; ?></span>

            <input type="password" name="pass"  class="form-control" placeholder="Your Password" maxlength="15"  />
            <span class="text-danger"><?php echo $passError; ?></span>
            <hr/>
                
            <p><button class="btn btn-block btn-primary" type="submit" name="btn-login">Sign In</button></p>
            <p><a href="register.php" class="btn btn-block btn-primary">Not registered yet? Click here</a></p>
            
        </form>
    </div>
    <footer>
        <?php include_once 'components/footer.php';?>
    </footer>
</body>
</html>