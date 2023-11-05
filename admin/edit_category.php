<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">

    <h4 class="mt-4">Categorie's</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Categorie's</li>
    </ol>

    <div class="row">

        <div class="col-md-12">
        <?php include_once('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $category_id = $_GET['id'];
                        $categories = "SELECT * FROM categories WHERE id='$category_id' ";
                        $categories_run = mysqli_query($conn, "$categories");

                        if (mysqli_num_rows($categories_run) > 0) {
                            $row = mysqli_fetch_array($categories_run);
                    ?>


                                <form action="../function/function.php" method="post">
                                    <input type="hidden" name="category_id" value="<?= $row['id']?>">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="">Name:</label>
                                            <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug (URL):</label>
                                            <input type="text" name="slug" value="<?= $row['slug'] ?>" class="form-control" required>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label for="">Description:</label>
                                            <textarea name="description" class="form-control" id="summernote" required rows="4"><?= $row['description'] ?></textarea>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title:</label>
                                            <input type="text" name="meta_title" value="<?= $row['meta_title'] ?>" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Description:</label>
                                            <textarea name="meta_description" class="form-control" required rows="4"> <?=$row['meta_description']?> </textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword:</label>
                                            <textarea name="meta_keyword" class="form-control" required rows="4"> <?=$row['meta_keyword']?></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" name="navbar_status" <?= $row['navbar_status'] == '1' ? 'checked':''?> width="70px" height="70px">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $row['status'] == '1' ? 'checked':''?> width="70px" height="70px">
                                        </div>

                                        <footer>
                                            <button type="submit" name="update_category" class="btn btn-success">Update</button>
                                            <a href="category_list.php" class="btn btn-primary">Back</a>
                                        </footer>

                                    </div>
                                </form>

                            <?php
                            
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    }
                    ?>


                </div>
            </div>
        </div>

    </div>
</div>


<?php
include_once("includes/footer.php");
include_once("includes/scripts.php");

?>