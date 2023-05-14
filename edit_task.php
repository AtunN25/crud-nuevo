<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){ //si al menos tengo una tarea con este ID 
            $row = mysqli_fetch_array($result);
            $title = $row['titulo'];
            $description = $row['description'];
        }
       
    }

    if(isset($_POST['update'])){

        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        echo $id;
        echo $title;
        echo $description;

        $query = "UPDATE task set titulo = '$title',description = '$description' WHERE id = $id";
        mysqli_query($conn,$query);

        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';

        header("Location: index.php");
    }

?>


<?php include("include/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="cold-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title;?>" class="form-control" placeholder="update title" >
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="update desription"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        update
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("include/footer.php")?>