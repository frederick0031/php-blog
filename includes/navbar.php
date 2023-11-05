<div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="assets/images/logo.png" class="w-100" alt="Geek Programmer">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none d-md-none" href="">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        $navbar_category = "SELECT * FROM categories WHERE navbar_status='0' AND status='=' ";
        $navbar_category_run = mysqli_query($conn, $navbar_category);

        if (mysqli_num_rows($navbar_category_run) > 0) {
          foreach ($navbar_category_run as $nav_items) {
        ?>
            <li class="nav-item">
              <a class="nav-link text-white"  href="category.php?title=<?=$nav_items['slug'] ?>"><?=$nav_items['name'] ?></a>
            </li>
        <?php
          }
        }

        ?>


        <?php if (isset($_SESSION['auth_user'])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_name']; ?>
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">My Profle</a>

              <li>
                <form action="function/logout.php" method="post">
                  <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>