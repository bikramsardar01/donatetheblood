<?php
  if(isset($_POST['logout']))
  {
    session_destroy();
    header('location:../index.php');
  }
?>
<header class="row">
        <div class="col-md-6">
          <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        </div>
        <div class="col-md-6">
          <div class="" style="float:right; margin: 10px auto;">
          <form method="post">
            <input type="submit" class="btn btn-danger" name="logout" value="Log Out">
        </form>
          </div>
        </div>
</header>