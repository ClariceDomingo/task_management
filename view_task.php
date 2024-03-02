<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                <h1 class="card-viewtask">View Task</h1>

        <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM `tasks` WHERE `id` = '$id'";
            $query_run = mysqli_query($connection, $query);
            if(mysqli_num_rows($query_run) > 0) {
                foreach($query_run as $row) {
                    ?>
                <form action="process.php" method="POST">
                
                <input type="hidden" name="id" value="<?=$user['id'];?>">
                    
                <div class="row">
                <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" readonly>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" readonly><?php echo $row['description']; ?></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" name="priority" disabled>
                            <option value="Low" <?php if($row['priority'] == 'Low') echo 'selected'; ?>>Low</option>
                            <option value="Medium" <?php if($row['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
                            <option value="High" <?php if($row['priority'] == 'High') echo 'selected'; ?>>High</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo $row['due_date']; ?>" readonly>
                    </div>

                    <div class="col-md-12 mb-3 text-center">
                        <a href="index.php" class="btn btn-back" name="backButton">Back</a>
                    </div>
                </div>
            </form>
        <?php
                }
            }
            else
            {
                ?>
                <h4>No Tasks Found!</h4>
                <?php
            }
        }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
        });
    </script>
    <?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>
</body>
</html>
