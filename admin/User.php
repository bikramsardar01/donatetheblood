<?php
session_start();
if(!isset($_SESSION['type'])=='admin')
{
  header('location:../../index.php');
}
require 'class/User.php'; 
$use = New User(); 
if(isset($_POST['btnAdd'])) {
	$use->setValue($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['password'], $_POST['type']); 
	if($use->registerUser()) { 
		echo '<script> alert("Registered successfully")</script>';
	 } 
	} 
	
	
if(isset($_POST['btnUpdate'])) 
{ 
	$use->updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['password'], $_POST['type'], $_GET['eid']);
	echo '<script>alert("User updated successfully!")</script>';
}
require_once 'class/User.php';
$seek = New User();
if(isset($_GET['did']))
{
	if($seek->deleteUser($_GET['did']))
	{
		echo '<script>alert("User Deleted Successfully!")</script>';
	}
}

if(isset($_GET['eid']))
{
	$selected = $seek->selectSingleUser($_GET['eid']);
}

$jobseekers= $seek->selectUser();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cms_css.css" />
    <title>Dashboard</title>
  </head>
  <body>
  
    <div class="container">
      
    <?php include 'header.php'; ?>

<div class="row">
  <?php include 'nav.php'; ?>
          <div class="col-md-9">
          <form method="post">
					<div class="mb-3">
						<input type="text" class="form-control" name="name" placeholder="Name" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['name'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['email'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="number" class="form-control" name="phone" placeholder="Phone" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['phone'];}?>" >
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="address" placeholder="Address" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['address'];}?>">
					</div> 
                    <div class="mb-3">
						<input type="text" class="form-control" name="password" placeholder="Password" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['password'];}?>">
					</div>
					<div class="mb-3">
					<select name="type" class="form-control">
						<option selected disabled>select</option>
						<option value="user" <?php if(isset($_GET['eid']) && $selected[0]['type'] == 'user'){ echo 'selected'; } ?>>User</option>
						<option value="admin" <?php if(isset($_GET['eid']) && $selected[0]['type'] == 'admin'){ echo 'selected'; } ?>>Admin</option>
						</select>
						</div>
					<div class="mb-3">
						<input type="submit" class="btn btn-primary" name="btnAdd" value="Add">
						<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
					</div>
				</form>

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-dark" id="myTable">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Name</th>
                                <th>Email</th>
								<th>Phone</th>
								<th>Address</th>
                                <th>Password</th>
						        <th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
						foreach($jobseekers as $js)
						{
							echo "<tr>
									<td>".$js['id']."</td>
									<td>".$js['name']."</td>
                                    <td>".$js['email']."</td>
									<td>".$js['phone']."</td>
									<td>".$js['address']."</td>
                                    <td>".$js['password']."</td>
									<td><a href='User.php?eid=".$js['id']."' class='btn btn-primary'>Edit</a></td>
									<td><a href='User.php?did=".$js['id']."' class='btn btn-danger' 
										onclick='return confirm(&quot;Are you sure?&quot;)'>Delete</a></td>
								</tr>";
						}
						?>
						</tbody>
					</table>
				</div>
          </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>

  </body>
</html>