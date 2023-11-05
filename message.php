<?php
if (isset($_SESSION['error'])) {
?>

    <div id="hide" class="alert alert-danger alert-dismissible fade show" role="alert"> <?= $_SESSION['error']; ?></div>

<?php
unset($_SESSION['error']);


}
elseif (isset($_SESSION['success'])) 
{
    ?>
    <div id="hide" class="alert alert-success alert-dismissible fade show" role="alert"> <?= $_SESSION['success']; ?></div>

<?php
unset($_SESSION['success']);
}

elseif (isset($_SESSION['warning'])) 
{
    ?>
    <div id="hide" class="alert alert-warning alert-dismissible fade show" role="alert"> <?= $_SESSION['warning']; ?></div>

<?php
unset($_SESSION['warning']);
}
?>

<script src="assets/js/hide.js"></script>