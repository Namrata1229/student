<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>

<div class="container">
  <a href="register"><button type="button" class="btn btn-success">Register</button></a>
  <br><br>
  <form method="post" id="login_form" action="check_login_details">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    
    <button type="submit" class="btn btn-default">Login</button>
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
  $("#login_form").validate({
    rules: {
      pwd: {
        required: true,
        minlength: 3
      },
      email: {
        required: true,
        email: true
      }
    },
    messages : {
      pwd: {
        required: "Please enter your Password",
        min: "You must be at least 3 characters"
      },
      email: {
        email: "The email should be in the format: abc@domain.tld"
      }
    }
  });
});
</script>
</body>
</html>
