<?php
  session_start();
  $email = "baove.saigon@maihouse.com";
  $pass = "MH@sec";
  $message = "";
  if(isset($_POST["submit"])){
    if($_POST["email"] == $email && $_POST["pswd"] == $pass){
      $message = "OK nha";
      $_SESSION["ok"] = "ok";
      header("Location:index.php");
    }else{
      $message = "Ko OK nha";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ĐĂNG NHẬP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>ĐĂNG NHẬP</h2>
  <form method="POST">
    <?= $message; ?>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
  </form>
</div>

</body>
</html>
