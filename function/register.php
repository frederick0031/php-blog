<?php
session_start();
include_once("../admin/config/dbcon.php");

if(isset($_POST["register_btn"]))
{
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);

    if($password == $cpassword)
    {
        // check Email
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($conn, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            // Email Already Exist
            $_SESSION['error'] = "Email Already Exist";
            header("Location: ../register.php");
            exit(0);

        }
        else
        {
            $user_query = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname', '$lname', '$email', '$password')";
            $user_query_run = mysqli_query($conn, $user_query);

            if($user_query_run)
            {
                $_SESSION["success"] = "Registered Successfully";
                header("Location: ../login.php");
                exit(0);
            }
            else
            {
                $_SESSION["error"] = "Something Went Wrong";
                header("Location: ../register.php");
                exit(0);
            }
        }
    }
    else
    {
        $_SESSION['error'] = "Password and Confirm Password does not Match";
        header("Location: ../register.php");
        exit(0);
    }
}
else
{
    header("Location: ../register.php");
    exit(0);
}
?>
