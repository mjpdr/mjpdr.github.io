<?php
include 'database.php';
session_start();


$person = new Database();


if(isset($_POST['lgn_admin'])){
 
     $person->adminLogin($_POST);
     
}
if(isset($_POST['lgn_student'])){
 
     $person->studentLogin($_POST);
     
}

if(isset($_POST['update'])){
     $person->updateRecord($_POST);
          }

 if(isset($_POST['add'])){
 
      $person->addRecord($_POST);
               
     }
     
if(isset($_GETT['dltid'])){
     $delete=$_GET['dltid'];
      $person->deleteRecord($delete);
                   
     }

       
?>
