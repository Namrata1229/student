<?php //echo "<pre>";print_r($this->session->userdata('id'));exit(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>
<body>

<div class="container">

  <a href="schools/create"><button type="button" class="btn btn-success">Add School</button></a>
  <a href="signout"><button style="" type="button" class="btn btn-success">Sign Out</button></a>
  <br><br>
  <table id='employeeList' class='display dataTable'>

  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Location</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
   </thead>
    <tbody>
    <?php
    	$id = $this->session->userdata('id');
    	$this->db->select('*');  
        $this->db->from('school_master');  
        $this->db->where(array('entered_by' => $id));
        $query = $this->db->get()->result_array();
    	//echo "<pre>";print_r($query);exit();
    	foreach ($query as $key => $value) { ?>

         <tr>
         	<td><?=$key+1?></td>
         	<td><?=$value['school_name']?></td>
         	<td><?=$value['location']?></td>
         	<td><a href="schools/edit/<?php echo $value['id'] ?>"><button class="btn btn-default" type="button" >edit</button></a></td>
         	<td><button type="button" data_attr="<?php echo $value['id'] ?>" class="btn btn-warning btn_delete">delete</button></td>
         </tr>
    		
    <?php }?>
    </tbody>
  

</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#employeeList').DataTable({  
           "order": [ [0, 'desc'] ],
        "pageLength": 20,
        "lengthMenu": [[100, 200, 300, 400, 500, -1], [100, 200, 300, 400, 500, "All"]],
        "responsive": true,
      });  

    $('.btn_delete').click(function(){
      if (window.confirm('Are you sure？')) {
        var id = $(this).attr('data_attr');
        //console.log(id);
        $.ajax({
          type: 'POST',
          url: 'schools/delete_details_school',
          data: {id:id},
          success: function(data1) {
            //console.log(data1);
            var obj = JSON.parse(data1);
             //console.log(obj);return;
             if(obj == 'success'){
              window.location.href = "school";
              
             }
          }
        });
      }
    })
});
</script>
</body>
</html>
