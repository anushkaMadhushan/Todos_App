<?php

require "conn.php";
$data = $conn->query("SELECT * FROM tasks");
?>

<?php include "header.php"; ?>
<div class="container">
    <form method="POST" action="insert.php" class="form-inline" id="user_form">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">create</label>
            <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Insert" />
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Delete</th>
                <th>Update</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($rows = $data->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <td><?php echo $rows->id; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><a href="delete.php?del_id=<?php echo $rows->id; ?>" class="btn btn-danger">delete</a></td>
                    <td><a href="update.php?upd_id=<?php echo $rows->id; ?>" class="btn btn-warning">update</a></td>

                </tr>
            <?php endwhile; ?>


        </tbody>
    </table>
</div>
<?php include "footer.php"; ?>