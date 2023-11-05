<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">
    <h4 class="mt-4">User's</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User's</li>
    </ol>
    <?php include_once ('../message.php'); ?>

    <div class="row">

        <div class="col-md-12">
        <a href="add_user.php" class="btn btn-primary">Add User</a>
                <br><br>
            <div class="card">
                <div class="card-header">
                    <h4>Registered User's</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <?php
                                            if( $row['role_as'] == '1') {
                                                echo 'Admin';
                                            }elseif( $row['role_as'] == '0') {
                                                echo 'User';
                                            }
                                            ?>
                                        </td>
                                        <td><a href="edit_register.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="../function/function.php" method="post">
                                            <button type="submit" name="delete_user" value="<?=$row['id'];?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php
                                }
                            } else {
                                ?>

                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
include_once("includes/footer.php");
include_once("includes/scripts.php");

?>