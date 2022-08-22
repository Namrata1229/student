<?php //echo "<pre>";print_r($data); ?>
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
  
  <form method="post" id="school_form">
    <div class="form-group">
      <label for="email">School Name:</label>
      <input type="text" class="form-control" id="school_name" placeholder="Enter School Name" name="school_name" value="<?= $data[0]['school_name'] ?>">
    </div>
    <div class="form-group">
      <label for="email">Location:</label>
      <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" value="<?= $data[0]['location'] ?>">
    </div>
    <input type="hidden" name="id" id="id" value="<?= $data[0]['id'] ?>">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id')?>">
    <button type="submit" class="btn btn-default">Register</button>
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
  $("#school_form").validate({
    rules: {
      school_name : {
        required: true,
        minlength: 3
      },
      location: {
        required: true,
        minlength: 3
      }
    },
    messages : {
      school_name: {
        minlength: "Name should be at least 3 characters"
      },
      location: {
        required: "Please enter your Location"
      }
    },
    submitHandler: function(form) {
      var formdata = $(form).serialize();
      //console.log(formdata);return;
      $.ajax({
          type: 'POST',
          url: '../edit_details_school',
          data: formdata,
          success: function(data1) {
             var obj = JSON.parse(data1);
             //console.log(obj);return;
             if(obj == 'success'){
              swal({
                    title: "Success",
                    text: "School Updated Successfully!!!",
                    type: "success"
                  },function() {
                    window.location.href = "../../school";
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
