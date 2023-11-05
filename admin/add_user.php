<?php
include_once("authentication.php");
include_once("includes/header.php");

?>
<div class="container-fluid px-4">
    <?php include_once('../message.php'); ?>

    <div class="row mt-5">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add User</h4>
                </div>
                <div class="card-body">

                    <form action="../function/function.php" method="post">
                        <input type="hidden" name="user_id" id="">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="">First Name:</label>
                                <input type="text" name="fname" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Last Name:</label>
                                <input type="text" name="lname" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Role as:</label>
                                <select name="role_as" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1" >Admin</option>
                                    <option value="0" >User</option>
                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px">
                            </div>

                            <footer>
                                <button type="submit" name="add_user" class="btn btn-success">Submit</button>
                                <a href="register_list.php" class="btn btn-primary">Back</a>
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