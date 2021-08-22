<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <?php include_once 'components/boot.php';?>
    <title>Pet Adoption Agency</title>
</head>
<body>
    <header>
        <?php include_once 'components/navigation1.php';  ?>
    </header>

<main>
	<div class="row d-flex justify-content-center">
   
      <div class="col-md-6 col-md-offset-3">
      <h2>How can we help you ?</h2>
      <h5>Please take contact to us for inquiries, suggestions and other desires at any time.</h5>
          <form class="form-horizontal " action="" method="post">
            <div class="form-group">
              <label class="col-md-3 control-label mt-3" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label mt-3" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label mt-3" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 text-right mt-3 mb-3">
                <button type="submit" class="btn btn-primary ">Submit</button>
              </div>
            </div>
          </form>
  	</div>
  </div>
</main>
    <footer>
        <?php include_once 'components/footer.php';?>
    </footer>  
    </body>
</html>