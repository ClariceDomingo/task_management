<?php
session_start();    
include("config.php");

if(isset($_POST["createButton"])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $create_query = "INSERT INTO `tasks`(`id`, `title`, `description`, `priority`, `due_date`) VALUES ('$id','$title','$description','$priority','$due_date')";
    $create_result = mysqli_query($connection, $create_query);

    if($create_result){
        $_SESSION['status'] = "Task created successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }else{
        $_SESSION['status'] = "Error: Unable to create task.";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }

}


if(isset($_POST["updateButton"])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $update_query = "UPDATE `tasks` SET `id`='$id', `title`='$title', `description`='$description', `priority`='$priority', `due_date`='$due_date' WHERE id = '$id'";
    $update_result = mysqli_query($connection, $update_query);

    if($update_result){
        $_SESSION['status'] = "Task updated successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }else{
        $_SESSION['status'] = "Error: Unable to update task.";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }
}

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