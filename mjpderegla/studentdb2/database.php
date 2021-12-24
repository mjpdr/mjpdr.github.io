<?php
 
class Database {

    private $sname = "localhost";
    private $uname = "root";
    private $pw = "";
    private $db_name = "studentdb";
    public $conn;


    function __construct(){

        $this->conn = new mysqli($this->sname, $this->uname, $this->pw, $this->db_name);
        if($this->conn->connect_error){
            echo "Connection Failed";
        }else{
            return $this->conn;
        }
    } //constructor close



 public function adminLogin($admin){

  function validate($admin){
		$admin = trim($admin);
		$admin = stripslashes($admin);
		$admin = htmlspecialchars($admin);
		return $admin;
	}
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);




  
     if (empty($name)){
		header("Location: ../index.php?error=Name is required");
	}else if(empty($email)){
		header("Location: ../index.php?error=Email is required&");
	}else if(empty($password)){
		header("Location: ../index.php?error=Password is required&");
    
	}else {
        $sql= "SELECT * FROM login WHERE name='$name' AND email='$email' AND password='$password'";
        $result = $this->conn->query($sql);

        if($result->num_rows==1){
            while($row = $result->fetch_assoc()){
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['name'];
                $_SESSION['password'] = $row['name'];


                header("location: adminview.php");


            }
        }else{
            header("location: index.php?error=Login information entered is wrong.");

        }
}
  } //adminLogin close  

  public function studentLogin($student){
    function validate($student){
		$student = trim($student);
		$student = stripslashes($student);
		$student = htmlspecialchars($student);
		return $student;
	}
    
      $name = validate($_POST['name']);
      $email = validate($_POST['email']);
      $password = validate($_POST['password']);
   
  
     
      if (empty($name)){
          header("Location: ../index.php?error=Name is required");
      }else if(empty($email)){
          header("Location: ../index.php?error=Email is required&");
      }else if(empty($password)){
          header("Location: ../index.php?error=Password is required&");
      }else {
          $sql = "SELECT * FROM student WHERE name='$name' AND email='$email' AND password='$password' ";
          $result = $this->conn->query($sql);
  
          if($result->num_rows==1){
              while($row = $result->fetch_assoc()){
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['email'] = $row['name'];
                  $_SESSION['password'] = $row['name'];

  
                  header("location: studentview.php");
  
  
              }
          }else{
            $sql= "SELECT * FROM student WHERE name = '$name' AND email = '$email' AND password = '$password' ";
            $result = $this->conn->query($sql);
            if($result->num_rows>0){
                header("location:../studentview.php");
            }else {
                $sql = "INSERT INTO student(name, email, password)
                    VALUES('$name', '$email', '$password')";
            $result = $this->conn->query($sql);
            if($result){
                header("location:../studentview.php");
    
            }else{
                header("Location: ../index.php?error=Unkown error occured&");
            }
    
                
            }
  
          }
      }
    } //studentLogin close  


  public function addRecord($insert){

    function validate($insert){
		$post = trim($insert);
		$post = stripslashes($insert);
		$post = htmlspecialchars($insert);
		return $insert;
	}
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$age = validate($_POST['age']);
    $gpa = validate($_POST['gpa']);

        $name = $insert['name'];
        $email = $insert['email'];
        $age = $insert['age'];
        $gpa = $insert['gpa'];

        $sql = "INSERT INTO student (name, email, age, gpa)
                VALUES ('$name', '$email', '$age', '$gpa')";
        $result =$this->conn->query($sql);

        if($result){
            header("location: adminview.php?success=Student record added.");
        }else{
            header("location: adminview.php?error=Something went wrong...");
        }
  }

  public function deleteRecord($delete){
      $sql = "DELETE FROM student where id='$delete'";
      $result= $this->conn->query($sql);

      if($result){
        header("location: adminview.php?del=Record Deleted.");
    }else{
        header("location: adminview.php?error");
    }
  }

   

  public function viewRecords(){
    $sql = "SELECT * FROM student";  
    $result = $this->conn->query($sql);

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    } // if close
  } //viewRecords close

  public function viewRecordsById($id){
$sql = "SELECT * FROM student WHERE id='$id'";
$result = $this->conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    return $row;

}//if close

  }// function close


  public function updateRecord($row){


    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];
    $gpa = $row['gpa'];

    if (empty($name)){
		header("Location: ../update.php?id=$id&error=Name is required");
	}else if(empty($email)){
		header("Location: ../update.php?id=$id&error=Email is required");
	}else if(empty($age)){
		header("Location: ../update.php?id=$id&error=Age is required");
	}else if(empty($gpa)){
		header("Location: ../update.php?id=$id&error=GPA is required");
	}else {
		$sql = "UPDATE student
				SET name='$name', email='$email',  age='$age', gpa='$gpa'
				WHERE id='$id'";
		$result = $this->conn->query($sql);
		if($result){
			header("Location:adminview.php?success=Successfully updated");
		}else{
			header("Location:update.php?id=$id&error=Unknown error occured");
		}

	}

  }
} // class close
?>