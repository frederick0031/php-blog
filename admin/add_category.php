<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">

    <div class="row mt-5">

        <div class="col-md-12">
        <?php include_once('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">

                    <form action="../function/function.php" method="post">
                        <input type="hidden" name="user_id" id="">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Slug (URL):</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="">Description:</label>
                               <textarea name="description" class="form-control" required rows="4"></textarea>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title:</label>
                                <input type="text" name="meta_title" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description:</label>
                               <textarea name="meta_description" class="form-control" required rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword:</label>
                               <textarea name="meta_keyword" class="form-control" required rows="4"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Navbar Status</label>
                                <input type="checkbox" name="navbar_status" width="70px" height="70px">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px">
                            </div>

                            <footer>
                                <button type="submit" name="add_category" class="btn btn-success">Submit</button>
                                <a href="category_list.php" class="btn btn-primary">Back</a>
                            </footer>

                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>


<?php
include_once("includes/footer.php");
include_once("includes/scripts.php");

?>