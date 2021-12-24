<?php 

include "database.php";
$person = new Database();



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
  		 <button id="log" style="border:none"><a href="index.php"> Log Out</a></button>
  		 <button id="log" style="border:none"><a href="add.php">Add record</a></button>

  		  <h1 class="display-4 text-center"> Students' Records </h1> <br> 
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
     		  	

			<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Age</th>
                      <th scope="col">GPA</th>

				    </tr>

                   
				  </thead>
				  <tbody>
                  <?php
                        $data = $person->viewRecords();
                        $a=1;
                        foreach ($data as $value){
                            ?>
                            <tr>
                                <td><?php echo $a++;?></td>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo $value['email'];?></td>
                                <td><?php echo $value['age'];?></td>
                                <td><?php echo $value['gpa'];?></td>
                                
                                
                            </tr>
                        
                            
                            <?php

                        }// foreach close
                        
                        ?>
				    
				  </tbody>
				</table>  
				
				
			
</div>
</div>
</body>