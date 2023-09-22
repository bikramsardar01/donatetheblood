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
	if(isset($_POST['btnUpdate'])) { 
		if($use->updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['password'], $_POST['type'], $_GET['eid']))
		 { 
			echo '<script>alert("User updated successfully!")</script>'; 
		} 
	}
require_once 'class/message.php';
$seek = New Message();
$jobseekers= $seek->selectMessage();
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

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-dark" id="myTable">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Name</th>
                                <th>Email</th>
								<th>Subject</th>
								<th>Message</th>
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
									<td>".$js['subject']."</td>
									<td>".$js['message']."</td>
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