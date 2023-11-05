<?php
include_once("includes/header.php");

if (isset($_SESSION["auth"]))
{
    $_SESSION['warning'] = "You are Already Registered";
    header("Location: ../index.php");
    exit(0);
}

include_once("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <?php include_once('message.php'); ?>

                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="function/register.php" method="post">
                            <div class="form-group mb-3">
                                <label>First Name:</label>
                                <input type="text" name="fname" placeholder="Enter First Name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Last Name:</label>
                                <input type="text" name="lname" placeholder="Enter Last Name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Password:</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Confirm Password:</label>
                                <input type="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("includes/footer.php");
?>