<?php
session_start();
if(!isset($_SESSION['type'])=='admin')
{
  header('location:../../index.php');
}
require 'class/room.php'; 
$seek = New Room(); 
if(isset($_POST['btnAdd'])) {
	$time = date('Y-m-d_h-i-s');
    $file = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tn = $_FILES['file']['tmp_name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $file_name = $time.'.'. $ext;
    move_uploaded_file($file_tn, 'media/'. $file_name);
	$seek->setValue($_POST['name'], $_POST['price'], $_POST['features'], $_POST['facilities'], $_POST['guest'], $file_name); 
	if($seek->registerRoom())
	 { 
		echo '<script> alert("Registered successfully")</script>';
	 } 
} 
if(isset($_POST['btnUpdate'])) { 
		if($seek->updateRoom($_POST['name'], $_POST['price'], $_POST['features'], $_POST['facilities'], $_POST['guest'], $_GET['eid']))
		 { 
			echo '<script>alert("User updated successfully!")</script>'; 
		} 
	}
require_once 'class/room.php';
$seek = New Room();
if(isset($_GET['did']))
{
	if($seek->deleteRoom($_GET['did']))
	{
		echo '<script>alert("Room Deleted Successfully!")</script>';
	}
}

if(isset($_GET['eid']))
{
	$selected = $seek->selectSingleRoom($_GET['eid']);
}

$jobseekers= $seek->selectRoom();
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
          <form enctype="multipart/form-data" method="post">
					<div class="mb-3">
						<input type="text" class="form-control" name="name" placeholder="Name" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['name'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="number" class="form-control" name="price" placeholder="price" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['price'];}?>" >
					</div>
					<div class="mb-3">
                        <input type="text" class="form-control" name="features" placeholder="features" required
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['features'];}?>" >
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="facilities" placeholder="facilities" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['facilities'];}?>">
					</div> 
                    <div class="mb-3">
						<input type="number" class="form-control" name="guest" placeholder="guest" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['guest'];}?>">
					</div>
					<div class="mb-3">
						<input type="file" class="form-control" name="file" placeholder="images" required 
							value="<?php if(isset($_GET['eid'])) {echo $selected[0]['images'];}?>">
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
                                <th>Price</th>
								<th>Features</th>
								<th>Facilities</th>
                                <th>Guest</th>
								<th>images</th>
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
                                    <td>".$js['price']."</td>
									<td>".$js['features']."</td>
									<td>".$js['facilities']."</td>
                                    <td>".$js['guest']."</td>
									<td><img src='media/".$js['images']."' style='height:100px; width:100px;'></td>
									<td><a href='Room.php?eid=".$js['id']."' class='btn btn-primary'>Edit</a></td>
									<td><a href='Room.php?did=".$js['id']."' class='btn btn-danger' 
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