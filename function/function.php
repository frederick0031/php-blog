<?php
include_once("../admin/authentication.php");

// START OF DELETE POST

if (isset($_POST["delete_post"])) {
    $post_id = $_POST['delete_post'];

    $check_img_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $check_img_result = mysqli_query($conn, $check_img_query);
    $res_data = mysqli_fetch_array($check_img_result);
    $image  =$res_data['image'];

    $query = "DELETE FROM posts WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if (file_exists("../uploads/posts/" . $image)) {
            unlink("../uploads/posts/" . $image);
        }

        $_SESSION['success'] = 'Post Deleted Successfully';
        header("Location: ../admin/post_list.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/post_list.php");
        exit(0);
    }
}
// END OF DELETE POST



// START OF UPDATE POST
if (isset($_POST["update_post"])) {
    $post_id = $_POST['post_id'];

    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $description = $_POST["description"];
    $meta_title = $_POST["meta_title"];
    $meta_description = $_POST["meta_description"];
    $meta_keywords = $_POST["meta_keyword"];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if ($image != NULL) {
        // rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;
        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }



    $status = $_POST["status"] == true ? "1" : "0";

    $query = "UPDATE posts SET category_id='$category_id', name='$name', slug='$slug', description='$description', meta_title='$meta_title', 
                meta_description='$meta_description', meta_keyword='$meta_keywords', image='$update_filename', status='$status' WHERE id = '$post_id'  ";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {

        if ($image != NULL) {

            if (file_exists("../uploads/posts/" . $old_filename)) {
                unlink("../uploads/posts/" . $old_filename);
            }

            move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/' . $update_filename);
        }


        $_SESSION['success'] = 'Post Updated Successfully';
        header("Location: ../admin/edit_post.php?id=" . $post_id);
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/edit_post.php?id=" . $post_id);
        exit(0);
    }
}
// END OF UPDATE POST



// START OF ADD POST
if (isset($_POST["add_post"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $description = $_POST["description"];
    $meta_title = $_POST["meta_title"];
    $meta_description = $_POST["meta_description"];
    $meta_keywords = $_POST["meta_keyword"];

    $image = $_FILES['image']['name'];
    // rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_extension;

    $status = $_POST["status"] == true ? "1" : "0";

    $query = "INSERT INTO posts (category_id, name, slug, description, image, meta_title, meta_description, meta_keyword, status) VALUES 
                ('$category_id','$name','$slug','$description', '$filename','$meta_title','$meta_description','$meta_keywords','$status') ";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/' . $filename);
        $_SESSION['success'] = 'Post Added Successfully';
        header("Location: ../admin/add_post.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/add_post.php");
        exit(0);
    }
}
// END OF ADD POST


// START OF DELETE CATEGORY
if (isset($_POST["delete_category"])) {
    $category_id = $_POST['delete_category'];

    // 0=visible, 1=hidden, 2=deleted
    $query = "UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1 ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Category Deleted Successfully';
        header("Location: ../admin/category_list.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/category_list.php");
        exit(0);
    }
}

// END OF DELETE CATEGORY



//START OF UPDATE CATEGORY
if (isset($_POST["update_category"])) {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $description = $_POST["description"];
    $meta_title = $_POST["meta_title"];
    $meta_description = $_POST["meta_description"];
    $meta_keywords = $_POST["meta_keyword"];
    $navbar_status = $_POST["navbar_status"] == true ? "1" : "0";
    $status = $_POST["status"] == true ? "1" : "0";

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword',
    navbar_status='$navbar_status', status='$status' WHERE  id='$category_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Category Updated Successfully';
        header("Location: ../admin/edit_category.php?id=" . $category_id);
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/edit_category.php?id=" . $category_id);
        exit(0);
    }
}
//END OF UPDATE CATEGORY


// START OF ADD CATEGORY
if (isset($_POST["add_category"])) {
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $description = $_POST["description"];
    $meta_title = $_POST["meta_title"];
    $meta_description = $_POST["meta_description"];
    $meta_keywords = $_POST["meta_keyword"];
    $navbar_status = $_POST["navbar_status"] == true ? "1" : "0";
    $status = $_POST["status"] == true ? "1" : "0";

    $query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keyword, navbar_status, status) 
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$navbar_status','$status') ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Category Added Successfully';
        header("Location: ../admin/add_category.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/add_category.php");
        exit(0);
    }
}

// END OF ADD CATEGORY


// START OF DELETE USER
if (isset($_POST["delete_user"])) {
    $user_id = $_POST['delete_user'];

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'User Deleted Successfully';
        header("Location: ../admin/register_list.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/register_list.php");
        exit(0);
    }
}

// END OF DELETE USER


// START OF ADD USER'S
if (isset($_POST["add_user"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'User Added Successfully';
        header("Location: ../admin/register_list.php");
        exit(0);
    } else {
        $_SESSION['error'] = 'Something Went Wrong';
        header("Location: ../admin/register_list.php");
        exit(0);
    }
}


// END OF ADD USER'S


// START OF UPDATE USER'S
if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status= '$status' 
              WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Updated Successfully';
        header("Location: ../admin/register_list.php");
        exit(0);
    }
}
// END OF UPDATE USER'S
