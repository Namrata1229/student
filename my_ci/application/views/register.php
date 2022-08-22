<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
  <a href="login"><button type="button" class="btn btn-success">Login</button></a>
  <form method="post" id="register_form">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <button type="submit" class="btn btn-default">Register</button>
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
  $("#register_form").validate({
    rules: {
      name : {
        required: true,
        minlength: 3
      },
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
      name: {
        minlength: "Name should be at least 3 characters"
      },
      pwd: {
        required: "Please enter your Password",
        min: "You must be at least 3 characters"
      },
      email: {
        email: "The email should be in the format: abc@domain.tld"
      }
    },
    submitHandler: function(form) {
      var formdata = $(form).serialize();
      //console.log(formdata);
      $.ajax({
          type: 'POST',
          url: 'add_details_register',
          data: formdata,
          success: function(data1) {
             var obj = JSON.parse(data1);
             if(obj == 'success'){
              swal({
                    title: "Success",
                    text: "User Added Successfully!!!",
                    type: "success"
                  },function() {
                    window.location.href = "login";
              });
              
             }
             // console.log(data1);
          }
      });
    }
  });
});
</script>
</body>
</html>
