<?php
session_start();

if (isset($_SESSION["auth"]))
{
    if (!isset($_SESSION["warning"]))
    {
        $_SESSION['warning'] = "You are Already Logged in";
    }
    header("Location: ../index.php");
    exit(0);
}

include_once("includes/header.php");
include_once("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php include_once('message.php'); ?>
                
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <form action="function/login.php" method="post">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
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