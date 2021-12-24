<?php include 'database.php';  


$person= new Database();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $row=$person->viewRecordsById($id);
    
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title> Student DB </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>

<body> 

  <div class="container">

  	<div class="box">
  		<button id="log" style="border:none;"><a href="adminview.php"> Student Records </a></button>
    <form action="actions.php"
          method="post">

      <h1 class="display-4 text-center"> Edit Record </h1> <hr><br>
      <?php if(isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $_GET['success'];   ?> 
          </div>
          <?php } ?>
          <?php if(isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error'];   ?> 
          </div>
        <?php } ?>


      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" 
               class="form-control" 
               id="name"
               name="name" 
               value="<?php echo $row['name'];?>"
               > 
      </div>

        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" 
               class="form-control" 
               id="email" 
               name="email"
               value="<?php echo $row['email'];?>"
               >
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" 
               class="form-control" 
               id="age"
               name=age 
               value="<?php echo $row['age'];?>"
              > 
      </div>

      <div class="form-group">
        <label for="gpa">GPA</label>
        <input type="number" 
        		step="0.01"
               class="form-control" 
               id="gpa"
               name="gpa" 
               value="<?php echo $row['gpa'];?>"
               > 
      </div>

      <input type="hidden" 
           id="id"
      		 name="id"
      		 value="<?=$row['id']?>"
      		>

      <div class="btns">
      <button type="submit" 
              class="btn btn-success"
              name="update">Update</button>
     
    </div>
    </form>
</div>


</div>
</body>

 