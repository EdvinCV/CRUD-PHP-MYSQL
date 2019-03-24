<?php 
    include('includes/header.php');
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $statement = $conexion->prepare('Select * From Task Where TaskId = :id');
        $statement->execute(array(':id' => $id));
        $resultado = $statement->fetch();
    }
    
    if(isset($_POST['edit_task'])){
        $id = $_GET['id'];
        $consulta = $conexion->prepare('Update Task set Title = :t, Description = :desc Where TaskId = :id');
        $consulta->execute(array(':t' => $_POST['title'], ':desc' => $_POST['description'], ':id' => $id));
        header('Location: index.php');
        $_SESSION['mensaje'] = 'Task Updated';
        $_SESSION['message_type'] = 'warning';
    }
        
?>


<body>
    <h1 align="center">Edit Task</h1>    
    <div class="container">
        <div class="row">
            <div class="col-md"></div>
            <div class="col-md">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="" placeholder="Task Title" value="<?php echo $resultado['Title']?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Task Description"><?php echo $resultado['Description']?></textarea>
                    </div>
                    <input type="submit" value="Save Task" class="btn btn-primary btn-block" name="edit_task">
                </form>
            </div>
            </div>
            <div class="col-md"></div>
        </div>
    </div>
</body>






<?php 
    include('includes/footer.php');
?>