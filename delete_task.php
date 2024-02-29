<?php
session_start();
include("config.php");

if(isset($_POST["deleteButton"])){

  $id = $_POST['id'];

  $delete_query = "DELETE FROM `tasks` WHERE id = '$id'";
  $delete_result = mysqli_query($connection, $delete_query);

  if($delete_result){
      $_SESSION['status'] = "Task deleted successfully!";
      $_SESSION['status_code'] = "success";
      header("Location: index.php");
      exit();
  }else{
      $_SESSION['status'] = "Error: Unable to delete task.";
      $_SESSION['status_code'] = "error";
      header("Location: index.php");
      exit();
  }

}

?>
