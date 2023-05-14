<?php
    include("db.php");
  
    if(isset($_POST['save_task'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query="INSERT INTO task(titulo,description) VALUES ('$title','$description')";


        $result=mysqli_query($conn,$query); //"INSERT,UPDATE,DELETE" devuelve 1 o 0 dependiendo de la ejecucion

        if(!$result){
            die("query failed");
        }

        $_SESSION['message'] = 'task save succesfully';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php"); //redirecciona a la pantalla inicial
    }

?>