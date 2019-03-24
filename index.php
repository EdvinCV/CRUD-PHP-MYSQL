<?php
    include("db.php");
    include("includes/header.php");


    $statement = $conexion->prepare('Select * From task');
    $statement->execute();

    $resultados = $statement->fetchAll();
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php
                if(isset($_SESSION['mensaje'])){
            ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </div>
            <?= session_unset();}?>


            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" id="" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" value="Save Task" class="btn btn-primary btn-block" name="save_task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($resultados as $fila){
                        ?>
                        <tr>
                            <th><?php echo $fila['TaskId']; ?></th>
                            <td><?php echo $fila['Title']; ?></td>
                            <td><?php echo $fila['Description']; ?></td>
                            <td><?php echo $fila['Created_At']; ?></td>
                            <td><a href="edit_task.php?id=<?php echo $fila['TaskId'];?>" class="fas fa-marker btn btn-primary"></a><a href="delete_task.php?id=<?php echo $fila['TaskId'];?>" class="far fa-trash-alt btn btn-danger"></a></td>
                        </tr>
                            <?php } ?>
                        
                    </tbody>
                </table>
        </div>
    </div>

</div>


<?php include("includes/footer.php"); ?>




