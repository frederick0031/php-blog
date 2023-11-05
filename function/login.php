<?php
session_start();
include_once("../admin/config/dbcon.php");

// START OF LOGIN PAGE
if(isset($_POST["login_btn"]))
{
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $login__query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login__query_run) > 0)
    {
        foreach($login__query_run as $data){
            $user_id = $data["id"];
            $user_name = $data["fname"].' '.$data['lname'] ;
            $user_email = $data['email'];
            $role_as = $data['role_as'];
        }
        $_SESSION["auth"] = true;
        $_SESSION["auth_role"] = "$role_as"; /* 1=admin , 0=user */
        $_SESSION["auth_user"] = [
            'user_id' => $user_id,
            'user_name'=> $user_name,
            'user_email'=> $user_email,

            ];
            if($_SESSION['auth_role'] == '1')
            {
                $_SESSION["success"] = "Welcome to Admin Dashboard";
                header("Location: ../admin/index.php");
                exit(0);
            }
            else if($_SESSION["auth_role"] == "0")
            {
                $_SESSION["success"] = "You Are Logged in";
                header("Location: ../index.php");
                exit(0);
            }


    }
    else
    {
        $_SESSION["error"] = "Invalid Email or Password";
        header("Location: ../login.php");
        exit(0);
    }

}
else
{
    $_SESSION["error"] = "You are not allowed to access this page";
                header("Location: ../login.php");
                exit(0);
}
// END OF LOGIN PAGE
?>
