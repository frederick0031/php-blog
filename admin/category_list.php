<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">

    <div class="row mt-5">

        <div class="col-md-12">

            <a href="add_category.php" class="btn btn-primary">
                <i class="fas fa-add"></i>
                Add Category</a>
            <br><br>
            <?php include_once('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Category List</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $category = "SELECT * FROM categories WHERE status!='2' ";
                                $category_run = mysqli_query($conn, $category);

                                if (mysqli_num_rows($category_run) > 0) {
                                    foreach ($category_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['status'] == '1' ? 'Hidden':'Visible' ?> </td>
                                            <td><a href="edit_category.php?id=<?= $item['id']; ?>" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="../function/function.php" method="post">
                                                    <button type="submit" name="delete_category" value="<?= $item['id'] ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
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
</div>


<?php
include_once("includes/footer.php");
include_once("includes/scripts.php");

?>