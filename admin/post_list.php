<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">

    <div class="row mt-5">

        <div class="col-md-12">

            <a href="add_post.php" class="btn btn-primary">
                <i class="fas fa-add"></i>
                Add Post</a>
            <br><br>
            <?php include_once('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Post List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // $posts = "SELECT * FROM posts WHERE status!='2'";
                                $posts = "SELECT p.*, c.name as cname FROM posts p,categories c WHERE c.id = p.category_id ";
                                $posts_run = mysqli_query($conn, $posts);

                                if (mysqli_num_rows($posts_run) > 0) {

                                    foreach ($posts_run as $post) {
                                ?>
                                        <tr>
                                            <td><?=$post['id']?></td>
                                            <td><img src="../uploads/posts/<?=$post['image']?>" alt="Profile" width="70px" height="70px"></td>

                                            <td><?=$post['name']?></td>
                                            <td><?=$post['cname']?></td>
                                            <td><?=$post['status'] == '1' ? 'Hidden':'Visible'?></td>
                                            <td><a href="edit_post.php?id=<?= $post['id']; ?>" class="btn btn-success">Edit</a></td>
                                            <td>
                                                <form action="../function/function.php" method="post">
                                                    <button type="submit" name="delete_post" value="<?= $post['id'] ?>" class="btn btn-danger">Delete</button>
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
</div>


<?php
include_once("includes/footer.php");
include_once("includes/scripts.php");
?>