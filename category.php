<?php
include_once("includes/header.php");
include_once("includes/navbar.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <?php
                if (isset($_GET['title'])) {
                    $slug = mysqli_real_escape_string($conn, $_GET['title']);

                    $category = "SELECT id,slug FROM categories WHERE slug='$slug' LIMIT 1";
                    $category_run = mysqli_query($conn, $category);

                    if (mysqli_num_rows($category_run) > 0) {

                        $category_item = mysqli_fetch_array($category_run);
                        $category_id = $category_item["id"];

                        $post = "SELECT category_id,name,slug,created_at FROM posts WHERE category_id='$category_id'";
                        $post_run = mysqli_query($conn, $post);

                        if (mysqli_num_rows($post_run) > 0) {
                            foreach ($post_run as $post_item) {
                ?>
                                <a href="post.php?title=<?=$post_item['slug'];?>" class="text-decoration-none">
                                    <div class="card card-body shadow-sm mb-4">
                                        <h5><?=$post_item['name'];?></h5>
                                        <div>
                                            <label class="text-dark me-2">Posted On: <?=date('D-M-Y', strtotime($post_item['created_at']));?></label>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Post Available</h4>
                        <?php
                        }
                    } else {
                        ?>
                        <h4>No Such Category Found</h4>
                    <?php
                    }
                } else {
                    ?>
                    <h4>No Such URL Found</h4>
                <?php
                }
                ?>

            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("includes/footer.php");
?>